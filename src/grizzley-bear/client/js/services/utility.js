angular.module('fifteenApp')
	.factory('Utility', [function() {
		var Utility = {};

		Utility.formatMessage = function(call) {
			var message = call.message;
			if (!message) {
				return '';
			}
			var reply = call.reply;
			return _(['15thNight:', message, (reply ? 'reply' : void(0)), reply]).compact().join(' ');
		};

		var recipientIds = Utility.recipientIds = function(categories, providers) {
			return _(categories).chain()
				.map(function(category) {
					return _(providers).chain()
						.filter(function(provider) {
							return _(provider.category.split(',')).contains(category)
						})
						.pluck('id')
						.value();
				})
				.flatten()
				.uniq()
				.value();
		};

		Utility.recipientNames = function(categories, providers) {
			return _(recipientIds(categories)).chain()
				.map(function(id) {
					return _(providers).findWhere({ id: id });
				})
				.pluck('name')
				.value()
				.sort()
				.join(', ');
		};

		return Utility;
	}]);
