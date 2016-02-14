'use strict';

// Node Dependencies
var express = require('express');
var exphbs = require('express-handlebars');
var path = require('path');
var bodyParser = require('body-parser');

// Nodemailer and SMTP Dependencies
var nodemailer = require('nodemailer');
var Slack = require('slack-api');

var transporter = nodemailer.createTransport('smtps://nwpointer%40gmail.com:RNs1120!!@smtp.gmail.com'); 
// TODO: LAUGH AT NATHAN FOR PUTTING HIS CREDENTIALS ON GITHUB


// Slack Dependencies
var Slack = require('slack-node');
var SlackAPIToken = "xoxp-21255113202-21255543414-21308331154-232305f633"; // TODO: REPLACE. IT HAS SEEN A PUBLIC REPO.
var SlackAPI = new Slack(SlackAPIToken);
var MY_SLACK_WEBHOOK_URL = 'https://hooks.slack.com/services/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';
var SlackWebhook = require('slack-notify')(MY_SLACK_WEBHOOK_URL);

// UserApp Dependencies
var UserApp = require('userapp');
var UserAppToken = "x-WrIq6UQC20sI2a-a8bMg"; // TODO: REPLACE. IT HAS SEEN A PUBLIC REPO.
UserApp.initialize({
	appId: "56bf8c06a0f39"
});

// Initialization
var app = express();
app.use(bodyParser.urlencoded({extended: true})); // to support URL-encoded bodies
app.engine('.hbs', exphbs({extname: '.hbs', defaultLayout: 'main'}));
app.set('view engine', '.hbs');

// Routes
app.use(express.static(path.join(__dirname, 'public')));

var setCharAt = function(str,index,chr) {
    if(index > str.length-1) return str;
    return str.substr(0,index) + chr + str.substr(index+1);
}

app.get('/help/:id', function(req, res) {
	var userEmail, userPhone, requestText;
	var requestID = req.params.id;
	var dashIndex = requestID.lastIndexOf('-');
	var newString = setCharAt(requestID, dashIndex, ' ');
	console.log(newString[dashIndex]);
	var requestArray = newString.split(' ');

	UserApp.setToken(UserAppToken);
	UserApp.User.get({"user_id": requestArray[0]}, function(error, result){
		if (!error) {
			// Lots of nested JSON in the response. 
			// Console log it to relearn structure if UserApp ever changes.
			var userEmail = result[0]['email'];
			var userPhone = result[0]['properties']['phone']['value'];
			var userRequests = JSON.parse(result[0]['properties']['requests']['value']);
			var theRequest = userRequests.map(function(item){
				if (item['id'] == requestArray[1]) {
					res.render('help', {phone: userPhone, email: userEmail, info: item['text']});
				} else { return item; }
			})
		} else {
			console.log(error);
			console.log("Uh oh, this doesn't work! /help/:id");
			res.redirect('/404/Request has already been satisfied. Thank you for helping!')
		}
	});
});

app.get('/msg', function(req,res){
	return res.render('msg', {});
})

// app.get('/oath', function(req,res){
// 	Slack.oauth.getUrl({
// 		client_id: 21255113202.21323804660,
// 		scope: "user:read",
// 	},function(error, result){
// 		console.log(error, result);

// 	})
// })

// app.get('/catch', function(req,res){
// 	console.log("code:", req.params);
// 	if(req.params){
// 		res.redirect("https://slack.com/api/oauth.access?client_id=21255113202.21323804660&client_secret=51d2acbcbe270f4f5ecde319b0154c0b&code="+req.params.code+"&redirect_uri=localhost:3000/catcher")
// 	}
// 	// 21255113202.21323804660
// 	// 51d2acbcbe270f4f5ecde319b0154c0b
// 	// res.redirect("https://slack.com/api/oauth.access?client_id=21255113202.21323804660&client_secret=51d2acbcbe270f4f5ecde319b0154c0b&code="+req.params.code+"&redirect_uri=http://localhost:3000/catcher")
// })

app.get('/catcher', function(){
	res.send('thanks');
})

app.post('/msg', function(req,res){
	var p = req.body;
	


	if(p.addendum){
		p.message += "<br/><br/><br/>" + p.addendum +
		"<br>" + "username: " + p.email +
		"<br><br>" + "click here to login " + 
		req.protocol + '://' + req.get('host') + "/login" 
	}
    // setup e-mail data with unicode symbols
    var mailOptions = {
        from: '15th night provider', // sender address
        to: p.email, // list of receivers
        subject: p.subject, // Subject line
        html: p.message, // plaintext body
        
    };

    // send mail with defined transport object
    transporter.sendMail(mailOptions, function(error, info){
        if(error){
            return console.log(error);
        }
        console.log('Message sent: ' + info.response);
    });
	return res.redirect(p.location+"/"+"sent")
})

// Helper function to remove undefined items from an array.
// Used to close help requests.
function cleanArray(actual) {
  var newArray = new Array();
  for (var i = 0; i < actual.length; i++) {
    if (actual[i]) {
      newArray.push(actual[i]);
    }
  }
  return newArray;
}

app.post('/help/close/:id', function(req, res) {
	var userEmail, userPhone, requestText;
	var requestID = req.params.id;
	var dashIndex = requestID.lastIndexOf('-');
	var newString = setCharAt(requestID, dashIndex, ' ');
	console.log(newString[dashIndex]);
	var requestArray = newString.split(' ');

	UserApp.setToken(UserAppToken);
	UserApp.User.get({"user_id": requestArray[0]}, function(error, result){
		if(!error) {
			console.log(result[0]['properties'])
			userEmail = result[0]['email']
			userPhone = result[0]['properties']['phone']['value'];
			var userRequests = JSON.parse(result[0]['properties']['requests']['value']);

			var removeRequests = userRequests.map(function(item){
				if (item['id'] == requestArray[1]){
					requestText = item['text'];	
					// Don't return anything. This makes it undefined for cleanArray() to remove.
				} else { return item; }
			});
			var updatedRequests = cleanArray(removeRequests);
			result[0].properties.requests.value = JSON.stringify(updatedRequests);
			UserApp.User.save(result[0], function(error, result){

				// BRING BACK TIMEOUT FOR PRODUCTION. NO THERAC-25 BUGS!!
				// MAYBE REMOVE FOR DEMO.
				setTimeout(function() {
					SlackAPI.api('search.messages', { 
						query: requestID
					}, function(err, resp){
						var match = resp['messages']['matches'][0];
						SlackAPI.api('chat.delete', {
							ts: match['ts'],
							channel: match['channel']['id']
						}, function(err, response){
							var messageText = "Recent request #" + requestArray[1] + " has been fulfilled. Thank you!";
							var fancyMessage = {
				  				channel: '#shelter',
							  	icon_emoji: ':house:',
							  	username: "Request Accepted!",
								attachments: [{
									fallback: messageText,
									title: "Request Accepted!",
									text: messageText,
									color: "#7CD197"
								}]
							}

							var errorHandler = function(err){
								if (err) {
									console.log('API error:', err);
								} else {
									console.log('Message received!');
								}
							};
							SlackWebhook.send(fancyMessage, errorHandler);
						});
					});
				}, 14000);
				res.redirect("/confirm/" + encodeURIComponent(userEmail) + "/" + encodeURIComponent(userPhone)
					+ "/" + encodeURIComponent(requestText));
			});
		} else {
			console.log(error);
			console.log("ERROR IN ROUTE /help/close/:id");
			res.redirect("/help/" + requestID);
		}
	});
});

app.get("/confirm/:mail/:phone/:info/:message?", function(req, res) {
	var encodedEmail = req.params.mail;
	var encodedPhone = req.params.phone;
	var encodedInfo = req.params.info;
	var message    = req.params.message || {};
	var email = decodeURIComponent(encodedEmail);
	var phone = decodeURIComponent(encodedPhone);
	var info = decodeURIComponent(encodedInfo);
	res.render('helpConfirm', {email: email, phone: phone, info: info, message:message})
});

app.post('/postToSlack/:key?', function(req, res) {
	var userID;
	UserApp.setToken(req.params.key);
	console.log(req.params.key);
    UserApp.User.get({}, function(error, result){
		if(error){
			res.redirect('/404/User authentication failed. Log out, log back in, and try again.');
		} else {
			userID = result[0]['user_id'];

			var rand = parseInt(Math.random() * 10000);
			var requestID = userID + "-" + rand;

			var service = req.body.service;
			var gender = req.body.gender;
			var age = req.body.age;
			var push = "<!channel> -- ";
			var fallbackText = push + "Service: ";
			var basicText = service + ". " + gender + ", age " + age + ".";


			var request = {id:rand, text: basicText};
			var requests =JSON.parse(result[0].properties.requests.value);
			requests.push(request);
			
			result[0].properties.requests.value = JSON.stringify(requests);

			console.log(result[0].properties.requests.value);
		
			UserApp.User.save(result[0], function(error, result){
				if (error) {
					res.redirect('/request/' + req.params.key + '/ERROR: Failed to send message. You may try again immediately.');
				} else {
					var requestURL = "http://localhost:3000/help/" + requestID;
					var extras = "\nFollow the link to accept the request: " + requestURL;
					basicText += extras;

					var fancyMessage = {
					  	channel: '#shelter',
					  	icon_emoji: ':house:',
					  	username: "HELP REQUEST",
						attachments: [{
							fallback: fallbackText + basicText,
							title: "<!channel>: New request for " + service + ".",
							title_link: requestURL,
							text: basicText,
							color: "#38B0DE"
						}]
					}

					var errorHandler = function(err){
						if (err) {
							console.log('API error:', err);
						} else {
							console.log('Message received!');
							res.redirect('/request/'+req.params.key+"/"+"Message has been sent to the 15th Night network.");
						}
					};
					SlackWebhook.send(fancyMessage, errorHandler);
				}
			})
		}
    });
});

app.get('/resetPassword', function(req,res) {
	res.render('resetPassword');
});

app.post('/passwordReset', function(req, res){
	console.log("Before Reset");
	var email = req.body.email;
	console.log(email);
	UserApp.setToken(UserAppToken);
	UserApp.User.resetPassword({
		"login": email
	}, function(error, result) {
		if (error) {
			console.log(error);
			res.redirect("/404/The submitted login information was invalid.");
		} else {
			console.log(result); // expecting a password token

			var message1 = "Hi, you have initiated a password change or password recovery.<br>";
			var message2 = "Your password token is: " +  result['password_token'] + "<br>";
			var message3 = "For your security, complete the password change as soon as possible. Thank you!<br>";
			var finalMessage = message1 + message2 + message3;
			var mailOptions = {
		        from: '15th Night Network', // sender address
		        to: email, // list of receivers
		        subject: "15th Night: Temporary Password", // Subject line
		        html: finalMessage // plaintext body
		    };
		    transporter.sendMail(mailOptions, function(error, info){
		        if (error) {
		            return console.log(error);
		        }
		    	console.log('Message sent: ' + info.response);
		    });	
		    res.redirect('/changePassword');
		}
	});
});

app.get('/changePassword', function(req, res){
	res.render('changePassword');
});

app.post('/changePassword', function(req, res){
	var token = req.body.token;
	var password = req.body.password;
	console.log(password);
	UserApp.User.changePassword({
		"new_password": password,
		"password_token": token
	}, function(error, result) {
		if (error) {
			console.log(error);
			res.redirect('/404/Password change failed. Please try again.');
		} else {
			console.log(result);
			res.redirect('/success/Password successfully changed!');
		}
	})
})

app.get('/login', function(req, res){
	res.render('login');
});

app.get('/request/:key?/:message?', function(req,res){
	UserApp.setToken(req.params.key);
    UserApp.User.get({}, function(error, result){
		if (!error) {
			res.render('request', {message: req.params.message});
		} else {
			res.redirect('/404/User authentication failed. Log out, log back in, and try again.')
		}
    });
});

app.get('/404/:message?', function(req, res){
	var message;
	if (req.params.message) {
		message = req.params.message;
	}
	res.render('404', {message: message});
});

app.get('/success/:message?', function(req, res){
	var message;
	if (req.params.message) {
		message = req.params.message;
	}
	res.render('success', {message: message});
});

app.get('/', function(req,res){
	res.render('index');
});

app.get('/invite/:key/:message?', function(req, res){
	UserApp.setToken(req.params.key);
	UserApp.User.get({},function(error,result){
		if(result && result[0] && result[0].permissions.admin.value){
			if(req.params.message){
				res.render('invite', {message: req.params.message});
			}else{
				res.render('invite');
			}
			
		}else{
			res.redirect('/');
		}
	});
});

app.get('*', function(req, res) {
	res.render('index');
});


// Start Server - "node app.js"
var server = app.listen(3000, function(){
	var host = server.address().address;
	var port = server.address().port;
	console.log('Example app listening at http://%s:%s', host, port);
});
