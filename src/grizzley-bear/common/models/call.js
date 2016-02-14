module.exports = function(Call) {
	var app = require('../../server/server');

	Call.observe('before save', function(context, next) {
		if (!context.isNewInstance) {
			// Only create new instances
			return next('cannot update existing instance');
		}
		var call = context.instance;
		var recipients = call.recipients;
		recipients.forEach(function(recipientId) {
			app.models.Provider.findById(recipientId, function(err, provider) {
				provider.sendMessage(call);
			});
		});
		next();
	});
};
