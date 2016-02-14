//"use strict";

var UserApp = window.UserApp || {};

// Backward compatibility support
// Provide a console log/error method if not available
if(!window.console){
    window.console = {};
    if(!window.console.log){
        window.console.log = function(){};
        window.console.error = function(){};
    }
}

// Global settings
UserApp.global = {
    baseAddress: null,
    appId:null,
    token:null,
    debug: false,
    secure: false
};

/// Transport

// Utilities

// Base64
// Copyright (c) 2010 Nick Galbreath
// https://code.google.com/p/stringencoders/

Base64 = {};
Base64.PADCHAR = '=';
Base64.ALPHA = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/';

Base64.getbyte = function(s,i) {
    var x = s.charCodeAt(i);
    if (x > 255) {
        throw "INVALID_CHARACTER_ERR: DOM Exception 5";
    }
    return x;
};

Base64.encode = function(s) {
    if (arguments.length != 1) {
        throw "SyntaxError: Not enough arguments";
    }

    var padchar = Base64.PADCHAR;
    var alpha   = Base64.ALPHA;
    var getbyte = Base64.getbyte;

    var i, b10;
    var x = [];

    // convert to string
    s = "" + s;

    var imax = s.length - s.length % 3;

    if (s.length == 0) {
        return s;
    }

    for (i = 0; i < imax; i += 3) {
        b10 = (getbyte(s,i) << 16) | (getbyte(s,i+1) << 8) | getbyte(s,i+2);
        x.push(alpha.charAt(b10 >> 18));
        x.push(alpha.charAt((b10 >> 12) & 0x3F));
        x.push(alpha.charAt((b10 >> 6) & 0x3f));
        x.push(alpha.charAt(b10 & 0x3f));
    }

    switch (s.length - imax) {
        case 1:
            b10 = getbyte(s,i) << 16;
            x.push(alpha.charAt(b10 >> 18) + alpha.charAt((b10 >> 12) & 0x3F) +
                   padchar + padchar);
            break;
        case 2:
            b10 = (getbyte(s,i) << 16) | (getbyte(s,i+1) << 8);
            x.push(alpha.charAt(b10 >> 18) + alpha.charAt((b10 >> 12) & 0x3F) +
                   alpha.charAt((b10 >> 6) & 0x3f) + padchar);
            break;
    }

    return x.join('');
};

var parseResponseHeaders = function (rawValue) {
    var headers = {};

    if (!rawValue) {
        return headers;
    }

    var items = rawValue.split('\u000d\u000a');
    for (var i = 0; i < items.length; ++i) {
        var item = items[i];
        var index = item.indexOf('\u003a\u0020');
        if (index > 0) {
            var key = item.substring(0, index);
            var val = item.substring(index + 2);
            headers[key] = val;
        }
    }

    return headers;
};

var encodeArguments = function(source, prefix, skipIndex){
    var result = [];
    
    for(var index in source){
        if(typeof source == 'object' && !source.hasOwnProperty(index)){
            continue;
        }
        
        var value = source[index];
        var key = prefix ? prefix + "[" + index + "]" : index;

        // Skip Angular.js hashkeys
        if(key == '$$hashKey' || index == '$$hashKey'){
            continue;
        }

        // Skip null values
        if(value === undefined || value === null){
            // Except if they are 'special' ($ initial)
            if(key && key.length > 0 && key[0] == '$'){
                result.push(key);
            }
            continue;
        }

        result.push(typeof value == "object" ?
            encodeArguments(value, key, value instanceof Array) :
            key + "=" + encodeURIComponent(value)
        );
    }

    return result.join("&");
};

var getHeaders = function (xhr) {
    if ("getAllResponseHeaders" in xhr) {
        return parseResponseHeaders(xhr.getAllResponseHeaders());
    }

    return {};
};

// For JSONP support

var JsonpContext = {
    callbacks: {},
    call_offset: 0
};

var JsonpHttpRequest = function () {
    this.url = null;
    this.offset = 0;
    this.callback = null;
    this.msTimeout = 1000 * 20;
    this.credentials = {username: null, password: null};
};

JsonpHttpRequest.prototype.open = function (method, url) {
    this.url = url;
};

JsonpHttpRequest.prototype.onload = function (callback) {
    this.callback = callback;
};

JsonpHttpRequest.prototype.onerror = function (callback) {
    this.callback = callback;
};

JsonpHttpRequest.prototype.setCredentials = function (username, password) {
    this.credentials.username = username || null;
    this.credentials.password = password || null;
};

JsonpHttpRequest.prototype.send = function (body) {
    var outerScope = this;
    body = body || {};

    var cleanupRequest = null;
    var timeoutCallback = null;

    var timestamp = Math.floor((new Date().getTime() / 1000) - 1373133713);
    var callbackId = 'call_' + (++JsonpContext.call_offset) + '_' + timestamp;
    body["js_callback"] = callbackId;

    if(this.credentials.username){
        body['app_id'] = this.credentials.username;
    }

    if(this.credentials.password){
        body['token'] = this.credentials.password;
    }

    var script = document.createElement('script');
    script.setAttribute('async', true);
    script.setAttribute('src', this.url + (this.url.indexOf("?") == -1 ? '?' : '&') + encodeArguments(body));
    script.setAttribute('type', 'text/javascript');

    if (this.callback) {
        JsonpContext.callbacks[callbackId] = this.callback;

        cleanupRequest = function () {
            delete window[callbackId];
            delete JsonpContext.callbacks[callbackId];
        };

        timeoutCallback = setTimeout(function () {
            JsonpContext.callbacks[callbackId]({
                code: 'CONNECTION_ERROR',
                message: 'Request timed out.'
            });

            cleanupRequest();
        }, this.msTimeout);
    }

    window[callbackId] = function (result) {
        if (callbackId in JsonpContext.callbacks) {
            if (timeoutCallback) {
                clearTimeout(timeoutCallback);
            }

            JsonpContext.callbacks[callbackId](null, {
                status: 200,
                response: result,
                headers: {}
            });

            if (cleanupRequest) {
                cleanupRequest();
            }
        }
    };

    document.getElementsByTagName('head')[0]
        .appendChild(script);
};

JsonpHttpRequest.prototype.setRequestHeader = function(){
    // Dummy
};

var HttpRequest = function (options) {
    this.jsonp = options.jsonp === false ? false : true;
    this.base_url = options.base_url || null;
    this.headers = options.headers || {};
    this.credentials = {username: null, password: null};
};

HttpRequest.prototype.setCredentials = function (username, password) {
    this.credentials.username = username || null;
    this.credentials.password = password || null;
};

HttpRequest.prototype.create = function (method, path, body, callback) {
    var outer_scope = this;
    callback = callback || function(){}; 

    var passRawCallback = false;
    var url = this.base_url + path;
    var xhr = new XMLHttpRequest();

    if(!("withCredentials" in xhr)){
        if ((typeof XDomainRequest != "undefined")) {
            xhr = new XDomainRequest(); // IE
        } else if (this.jsonp) {
            passRawCallback = true;
            xhr = new JsonpHttpRequest(); // Failover to JSONP
        } else {
            return callback({
                code: 'MISSING_HTTP_PROVIDER',
                message:'Unable to make HTTP requests. No provider supported.'}
            );
        }
    }
    
    if(xhr.setCredentials){
        xhr.setCredentials(this.credentials.username, this.credentials.password);
    }else{
        this.headers["Authorization"] = "Basic " + Base64.encode((this.credentials.username || "")
            + ':' + (this.credentials.password||""));
    }

    xhr.open(method, url, true);

    if (xhr) {
        if (passRawCallback) {
            xhr.callback = callback;
        }

        xhr.onload = function (event) {
            var headers = getHeaders(event.target);

            callback(null, {
                status: event.target.status,
                response: JSON.parse(event.target.responseText),
                headers: headers
            });
        };

        xhr.onerror = function (event) {
            callback({
                code: 'CONNECTION_ERROR',
                message: "Unable to load '" + url + "'."
            });
        };

        for (var key in outer_scope.headers) {
            xhr.setRequestHeader(key, outer_scope.headers[key]);
        }

        try {
            if(!passRawCallback){
                body=JSON.stringify(body);
            }
            xhr.send(body);
        } catch (error) {
            callback(error);
        }
    }
};

var Transport = function(){};

Transport.prototype.call = function(sender, version, method, arguments, callback, visit){
    callback = callback || function(){};

    var isDebugMode = sender.debug || UserApp.global.debug;
    var protocol = (sender.secure || UserApp.global.secure) ? 'https' : 'http';
    var baseAddress = protocol + "://" + (sender.baseAddress || UserApp.global.baseAddress);
    var targetPath = '/v' + version + '/' + method;

    if(visit){
        arguments = arguments || {};
        arguments["app_id"] = sender.appId || UserApp.global.appId;
        arguments["token"] = sender.token || UserApp.global.token;
        arguments["js_callback"] = "ua_"+new Date().getTime();
        document.location = baseAddress + targetPath + '?' + encodeArguments(arguments);
        return;
    }

    var httpRequest = new HttpRequest({
        base_url: baseAddress,
        headers: {
            'Content-Type':'application/json'
        }
    });

    httpRequest.setCredentials(
        sender.appId || UserApp.global.appId,
        sender.token || UserApp.global.token
    );

    if(isDebugMode){
        targetPath += '?$debug&$beautify';

        console.log("Calling method " + method + " with arguments " + JSON.stringify(arguments));
        var shadowedCallback = callback;

        callback = function(error, result){
            if(error){
                console.error("UserApp error: " + error.name + ": " + error.message);
            }

            console.log(result);

            if(shadowedCallback){
                shadowedCallback(error, result);
            }
        }
    }

    httpRequest.create('POST', targetPath, arguments, function(error, result){
        var logs = null;

        if(error){
            return callback(error);
        }

        var innerResult = result.response;

        if(innerResult.__logs){
            logs = innerResult.__logs;
            delete innerResult["__logs"];
        }

        if (innerResult instanceof Array) {
            if(innerResult.length > 0){
                var lastChild = innerResult[innerResult.length-1];
                if(lastChild && lastChild.__logs){
                    logs = innerResult.pop().__logs;
                }
            }
        }

        if(logs && isDebugMode){
            for(var i=0;i<logs.length;++i){
                var log = logs[i];
                var message = typeof log.message == 'object' ? JSON.stringify(log.message) : log.message;
                console.log("UserApp " + log.type + ": " + message);
            }
            logs = null;
        }

        if(innerResult.error_code){
            callback({name: innerResult.error_code, message: innerResult.message});
        }else{
            callback(null, innerResult);
        }
    });
};

UserApp.Transport = {};
UserApp.Transport.Current = new Transport();

// Helper function used to initialize the library.
UserApp.initialize = function(settings){
    this.setAppId(settings.appId);
    this.setToken(settings.token);
    this.setBaseAddress(settings.baseAddress);
    this.setDebug(settings.debug);
    this.setSecure(settings.secure);
    return this;
};

// Set which base address to call. E.g. 'api.userapp.io'.
UserApp.setBaseAddress = function(address){
    this.global.baseAddress = address || 'api.userapp.io';
    return this;
}

// Set which application to authenticate under.
UserApp.setAppId = function(appId){
    this.global.appId = appId;
    return this;
};

// Set which token to work against
UserApp.setToken = function(token){
    this.global.token = token;
    return this;
};

// Activate debugging. Enables user to receive errors/logs/results in console.
UserApp.setDebug = function(debug){
    this.global.debug = debug || false;
};

// Whether or not to use SSL. Default = true
UserApp.setSecure = function(secure){
    this.global.secure = secure == null || secure == undefined ? true : secure;
};

// User

UserApp.User = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Search for users

UserApp.User.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.search', arguments, callback);
};

UserApp.User.prototype.search = function(arguments, callback){
    UserApp.User.search.call(this, arguments, callback);
};

// Save a user

UserApp.User.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.save', arguments, callback);
};

UserApp.User.prototype.save = function(arguments, callback){
    UserApp.User.save.call(this, arguments, callback);
};

// Get a specific user

UserApp.User.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.get', arguments, callback);
};

UserApp.User.prototype.get = function(arguments, callback){
    UserApp.User.get.call(this, arguments, callback);
};

// Count number of users

UserApp.User.count = function(arguments, callback){
    if(typeof arguments == 'function'){
        callback = arguments;
        arguments = null;
    }
    
    UserApp.Transport.Current.call(this, 1, 'user.count', arguments, callback);
};

UserApp.User.prototype.count = function(arguments, callback){
    UserApp.User.count.call(this, arguments, callback);
};

// Remove

UserApp.User.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.remove', arguments, callback);
};

UserApp.User.prototype.remove = function(arguments, callback){
    UserApp.User.remove.call(this, arguments, callback);
};

// Change password

UserApp.User.resetPassword = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.resetPassword', arguments, callback);
};

UserApp.User.prototype.resetPassword = function(arguments, callback){
    UserApp.User.resetPassword.call(this, arguments, callback);
};

// Change password

UserApp.User.changePassword = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.changePassword', arguments, callback);
};

UserApp.User.prototype.changePassword = function(arguments, callback){
    UserApp.User.changePassword.call(this, arguments, callback);
};

// Verify Email

UserApp.User.verifyEmail = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.verifyEmail', arguments, callback);
};

UserApp.User.prototype.verifyEmail = function(arguments, callback){
    UserApp.User.verifyEmail.call(this, arguments, callback);
};

// Request Email Verification

UserApp.User.requestEmailVerification = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.requestEmailVerification', arguments, callback);
};

UserApp.User.prototype.requestEmailVerification = function(arguments, callback){
    UserApp.User.requestEmailVerification.call(this, arguments, callback);
};

// Plan

UserApp.User.setPlan = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.setPlan', arguments, callback);
};

UserApp.User.prototype.setPlan = function(arguments, callback){
    UserApp.User.setPlan.call(this, arguments, callback);
};

// Get subscription details

UserApp.User.getSubscriptionDetails = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.getSubscriptionDetails', arguments, callback);
};

UserApp.User.prototype.getSubscriptionDetails = function(arguments, callback){
    UserApp.User.getSubscriptionDetails.call(this, arguments, callback);
};

// Lock

UserApp.User.lock = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.lock', arguments, callback);
};

UserApp.User.prototype.lock = function(arguments, callback){
    UserApp.User.setLock.call(this, arguments, callback);
};

// Unlock

UserApp.User.unlock = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.unlock', arguments, callback);
};

UserApp.User.prototype.unlock = function(arguments, callback){
    UserApp.User.unlock.call(this, arguments, callback);
};

// Has Permission

UserApp.User.hasPermission = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.hasPermission', arguments, callback);
};

UserApp.User.prototype.hasPermission = function(arguments, callback){
    UserApp.User.hasPermission.call(this, arguments, callback);
};

// Has Feature

UserApp.User.hasFeature = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.hasFeature', arguments, callback);
};

UserApp.User.prototype.hasFeature = function(arguments, callback){
    UserApp.User.hasFeature.call(this, arguments, callback);
};

// Login

UserApp.User.login = function(arguments, callback){
    var outerScope = this;
    UserApp.Transport.Current.call(this, 1, 'user.login', arguments, function(error, result){
        if(!error){
            var token = result.token;
            if(typeof outerScope === 'object'){
                outerScope.token = token;
            }else{
                UserApp.setToken(token);
            }
        }

        callback && callback(error, result);
    });
};

UserApp.User.prototype.login = function(arguments, callback){
    UserApp.User.login.call(this, arguments, callback);
};

// Logout

UserApp.User.logout = function(callback){
    UserApp.Transport.Current.call(this, 1, 'user.logout', null, function(error, result){
        UserApp.setToken(null);
        callback && callback(error, result);
    });
};

UserApp.User.prototype.logout = function(callback){
    UserApp.User.logout.call(this, callback);
};

// Token

UserApp.Token = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get token

UserApp.Token.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'token.get', arguments, callback);
};

UserApp.Token.prototype.get = function(arguments, callback){
    UserApp.Token.get.call(this, arguments, callback);
};

// Search token

UserApp.Token.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'token.search', arguments, callback);
};

UserApp.Token.prototype.search = function(arguments, callback){
    UserApp.Token.search.call(this, arguments, callback);
};

// Save token

UserApp.Token.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'token.save', arguments, callback);
};

UserApp.Token.prototype.save = function(arguments, callback){
    UserApp.Token.save.call(this, arguments, callback);
};

// Remove token

UserApp.Token.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'token.remove', arguments, callback);
};

UserApp.Token.prototype.remove = function(arguments, callback){
    UserApp.Token.remove.call(this, arguments, callback);
};

// Heartbeat
// Keep a session token alive

UserApp.Token.heartbeat = function(callback){
    UserApp.Transport.Current.call(this, 1, 'token.heartbeat', null, callback);
};

UserApp.Token.prototype.heartbeat = function(callback){
    UserApp.Token.heartbeat.call(this, callback);
};

// Permission

UserApp.Permission = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get a permission

UserApp.Permission.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'permission.get', arguments, callback);
};

UserApp.Permission.prototype.get = function(arguments, callback){
    UserApp.Permission.get.call(this, arguments, callback);
};

// Search permission

UserApp.Permission.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'permission.search', arguments, callback);
};

UserApp.Permission.prototype.search = function(arguments, callback){
    UserApp.Permission.search.call(this, arguments, callback);
};

// Save a permission

UserApp.Permission.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'permission.save', arguments, callback);
};

UserApp.Permission.prototype.save = function(arguments, callback){
    UserApp.Permission.save.call(this, arguments, callback);
};

// Count number of permissions

UserApp.Permission.count = function(callback){
    UserApp.Transport.Current.call(this, 1, 'permission.count', null, callback);
};

UserApp.Permission.prototype.count = function(callback){
    UserApp.Permission.count.call(this, callback);
};

// Remove a specific permission

UserApp.Permission.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'permission.remove', arguments, callback);
};

UserApp.Permission.prototype.remove = function(arguments, callback){
    UserApp.Permission.remove.call(this, arguments, callback);
};

// Feature

UserApp.Feature = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get a feature

UserApp.Feature.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'feature.get', arguments, callback);
};

UserApp.Feature.prototype.get = function(arguments, callback){
    UserApp.Feature.get.call(this, arguments, callback);
};

// Search feature

UserApp.Feature.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'feature.search', arguments, callback);
};

UserApp.Feature.prototype.search = function(arguments, callback){
    UserApp.Feature.search.call(this, arguments, callback);
};

// Save a feature

UserApp.Feature.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'feature.save', arguments, callback);
};

UserApp.Feature.prototype.save = function(arguments, callback){
    UserApp.Feature.save.call(this, arguments, callback);
};

// Count number of features

UserApp.Feature.count = function(callback){
    UserApp.Transport.Current.call(this, 1, 'feature.count', null, callback);
};

UserApp.Feature.prototype.count = function(callback){
    UserApp.Feature.count.call(this, callback);
};

// Remove a specific feature

UserApp.Feature.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'feature.remove', arguments, callback);
};

UserApp.Feature.prototype.remove = function(callback){
    UserApp.Feature.remove.call(this, arguments, callback);
};

// Property

UserApp.Property = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get a property

UserApp.Property.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'property.get', arguments, callback);
};

UserApp.Property.prototype.get = function(arguments, callback){
    UserApp.Property.get.call(this, arguments, callback);
};

// Search property

UserApp.Property.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'property.search', arguments, callback);
};

UserApp.Property.prototype.search = function(arguments, callback){
    UserApp.Property.search.call(this, arguments, callback);
};

// Save a property

UserApp.Property.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'property.save', arguments, callback);
};

UserApp.Property.prototype.save = function(arguments, callback){
    UserApp.Property.save.call(this, arguments, callback);
};

// Count number of propertys

UserApp.Property.count = function(callback){
    UserApp.Transport.Current.call(this, 1, 'property.count', null, callback);
};

UserApp.Property.prototype.count = function(callback){
    UserApp.Property.count.call(this, arguments, callback);
};

// Remove a specific property

UserApp.Property.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'property.remove', arguments, callback);
};

UserApp.Property.prototype.remove = function(arguments, callback){
    UserApp.Property.remove.call(this, arguments, callback);
};

// PriceList

UserApp.PriceList = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get a price list

UserApp.PriceList.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'priceList.get', arguments, callback);
};

UserApp.PriceList.prototype.get = function(arguments, callback){
    UserApp.PriceList.get.call(this, arguments, callback);
};

// Search price list

UserApp.PriceList.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'priceList.search', arguments, callback);
};

UserApp.PriceList.prototype.search = function(arguments, callback){
    UserApp.PriceList.search.call(this, arguments, callback);
};

// Update a specific price list

UserApp.PriceList.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'priceList.save', arguments, callback);
};

UserApp.PriceList.prototype.save = function(arguments, callback){
    UserApp.PriceList.save.call(this, arguments, callback);
};

// Count number of price lists

UserApp.PriceList.count = function(callback){
    UserApp.Transport.Current.call(this, 1, 'priceList.count', null, callback);
};

UserApp.PriceList.prototype.count = function(callback){
    UserApp.PriceList.count.call(this, callback);
};

// Remove a specific price list

UserApp.PriceList.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'priceList.remove', arguments, callback);
};

UserApp.PriceList.prototype.remove = function(arguments, callback){
    UserApp.PriceList.remove.call(this, arguments, callback);
};

// Invoice

UserApp.Invoice = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get invoices

UserApp.Invoice.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'invoice.get', arguments, callback);
};

UserApp.Invoice.prototype.get = function(arguments, callback){
    UserApp.Invoice.get.call(this, arguments, callback);
};

// Search for invoices

UserApp.Invoice.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'invoice.search', arguments, callback);
};

UserApp.Invoice.prototype.search = function(arguments, callback){
    UserApp.Invoice.search.call(this, arguments, callback);
};

// Save a invoice

UserApp.Invoice.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'invoice.save', arguments, callback);
};

UserApp.Invoice.prototype.save = function(arguments, callback){
    UserApp.Invoice.save.call(this, arguments, callback);
};

// Remove invoices

UserApp.Invoice.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'invoice.remove', arguments, callback);
};

UserApp.Invoice.prototype.remove = function(arguments, callback){
    UserApp.Invoice.remove.call(this, arguments, callback);
};

// Charge

UserApp.Charge = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get charges

UserApp.Charge.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'charge.get', arguments, callback);
};

UserApp.Charge.prototype.get = function(arguments, callback){
    UserApp.Charge.get.call(this, arguments, callback);
};

// Search for charges

UserApp.Charge.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'charge.search', arguments, callback);
};

UserApp.Charge.prototype.search = function(arguments, callback){
    UserApp.Charge.search.call(this, arguments, callback);
};

// Save a charge

UserApp.Charge.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'charge.save', arguments, callback);
};

UserApp.Charge.prototype.save = function(arguments, callback){
    UserApp.Charge.save.call(this, arguments, callback);
};

// Remove a charge

UserApp.Charge.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'charge.remove', arguments, callback);
};

UserApp.Charge.prototype.remove = function(arguments, callback){
    UserApp.Charge.remove.call(this, arguments, callback);
};

// Plan

UserApp.Plan = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get a plan

UserApp.Plan.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'plan.get', arguments, callback);
};

UserApp.Plan.prototype.get = function(arguments, callback){
    UserApp.Plan.get.call(this, arguments, callback);
};

// Search for plans

UserApp.Plan.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'plan.search', arguments, callback);
};

UserApp.Plan.prototype.search = function(arguments, callback){
    UserApp.Plan.search.call(this, arguments, callback);
};

// Save a plan

UserApp.Plan.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'plan.save', arguments, callback);
};

UserApp.Plan.prototype.save = function(arguments, callback){
    UserApp.Plan.save.call(this, arguments, callback);
};

// Count number of plans

UserApp.Plan.count = function(callback){
    UserApp.Transport.Current.call(this, 1, 'plan.count', null, callback);
};

UserApp.Plan.prototype.count = function(callback){
    UserApp.Plan.count.call(this, arguments, callback);
};

// Remove a specific plan

UserApp.Plan.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'plan.remove', arguments, callback);
};

UserApp.Plan.prototype.remove = function(arguments, callback){
    UserApp.Plan.remove.call(this, arguments, callback);
};

// User Payment Method

UserApp.User.PaymentMethod = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get payment methods

UserApp.User.PaymentMethod.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.paymentMethod.get', arguments, callback);
};

UserApp.User.PaymentMethod.prototype.get = function(arguments, callback){
    UserApp.Plan.get.call(this, arguments, callback);
};

// Search for payment methods

UserApp.User.PaymentMethod.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.paymentMethod.search', arguments, callback);
};

UserApp.User.PaymentMethod.prototype.search = function(arguments, callback){
    UserApp.Plan.search.call(this, arguments, callback);
};

// Save a payment method

UserApp.User.PaymentMethod.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.paymentMethod.save', arguments, callback);
};

UserApp.User.PaymentMethod.prototype.save = function(arguments, callback){
    UserApp.Plan.save.call(this, arguments, callback);
};

// Remove payment methods

UserApp.User.PaymentMethod.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'user.paymentMethod.remove', arguments, callback);
};

UserApp.User.PaymentMethod.prototype.remove = function(arguments, callback){
    UserApp.Plan.remove.call(this, arguments, callback);
};

// Export

UserApp.Export = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get payment methods

UserApp.Export.stream = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'export.stream', arguments, callback, true);
};

UserApp.Export.prototype.stream = function(arguments, callback){
    UserApp.Export.stream.call(this, arguments, callback);
};

// OAuth

UserApp.OAuth = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Consume an oauth callback token

UserApp.OAuth.getAuthorizationUrl = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.getAuthorizationUrl', arguments, callback);
};

UserApp.OAuth.prototype.getAuthorizationUrl = function(arguments, callback){
    UserApp.OAuth.getAuthorizationUrl.call(this, arguments, callback);
};

// Consume an oauth callback token

UserApp.OAuth.consume = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.consume', arguments, callback);
};

UserApp.OAuth.prototype.consume = function(arguments, callback){
    UserApp.OAuth.consume.call(this, arguments, callback);
};

// Request an oauth resource

UserApp.OAuth.request = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.request', arguments, callback);
};

UserApp.OAuth.prototype.request = function(arguments, callback){
    UserApp.OAuth.request.call(this, arguments, callback);
};

// OAuth Connection

UserApp.OAuth.Connection = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Find OAuth connections

UserApp.OAuth.Connection.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.connection.search', arguments, callback);
};

UserApp.OAuth.Connection.prototype.search = function(arguments, callback){
    UserApp.OAuth.Connection.search.call(this, arguments, callback);
};

// Get OAuth connections

UserApp.OAuth.Connection.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.connection.get', arguments, callback);
};

UserApp.OAuth.Connection.prototype.get = function(arguments, callback){
    UserApp.OAuth.Connection.get.call(this, arguments, callback);
};

// Remove OAuth connections

UserApp.OAuth.Connection.remove = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.connection.remove', arguments, callback);
};

UserApp.OAuth.Connection.prototype.remove = function(arguments, callback){
    UserApp.OAuth.Connection.remove.call(this, arguments, callback);
};

// OAuth Provider

UserApp.OAuth.Provider = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Get

UserApp.OAuth.Provider.get = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.provider.get', arguments, callback);
};

UserApp.OAuth.Provider.prototype.get = function(arguments, callback){
    UserApp.OAuth.Provider.get.call(this, arguments, callback);
};

// Search

UserApp.OAuth.Provider.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.provider.search', arguments, callback);
};

UserApp.OAuth.Provider.prototype.search = function(arguments, callback){
    UserApp.OAuth.Provider.search.call(this, arguments, callback);
};

// Save

UserApp.OAuth.Provider.save = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'oauth.provider.save', arguments, callback);
};

UserApp.OAuth.Provider.prototype.save = function(arguments, callback){
    UserApp.OAuth.Provider.save.call(this, arguments, callback);
};

// Stat

UserApp.Stat = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// API call statistics

UserApp.Stat.Apicall = function(options){
    options = options || {};
    if(options.appId){
        this.appId = options.appId;
    }
    if(options.token){
        this.token = options.token;
    }
};

// Search

UserApp.Stat.Apicall.search = function(arguments, callback){
    UserApp.Transport.Current.call(this, 1, 'stat.apicall.search', arguments, callback);
};

UserApp.Stat.Apicall.prototype.search = function(arguments, callback){
    UserApp.Stat.Apicall.search.call(this, arguments, callback);
};