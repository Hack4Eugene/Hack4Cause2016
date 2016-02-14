module.exports = function(Provider) {
	var http = require('http');
	// Untracked tokens file
	var tokens = require('../../server/tokens');

	Provider.prototype.sendMessage = function(call) {
		var number = this.phone;
		if (!number) {
			return;
		}
		var voice = !!this.voice;
		var tropo = http.request({
			hostname: 'api.tropo.com',
			port: 80,
			method: 'GET',
			path: '/1.0/sessions?action=create&token=' + tokens.tropo[voice ? 'voice' : 'messaging'] + '&msg=' + encodeURI(voice ? call.message : call.formatted_message) + '&number=' + number + '&reply=' + call.reply
		}, function(response) {
			response.setEncoding('utf8');
			response.on('data', function (chunk) {
				console.log('Sent message. Tropo response code:' + response.statusCode + '. Body: ' + chunk);
			});
		});
		tropo.end();
	};

	/*
	Provider.remoteMethod('sendMessage', {
		isStatic: false,
		http: {
			verb: 'post'
		},
		accepts: [
			{
				arg: 'call',
				type: 'object',
				required: true
			},
			{
				arg: 'reply',
				type: 'number',
				required: true
			}
		]
	});*/
};
