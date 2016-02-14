angular.module('fifteenApp').controller('DashboardController', ['$scope', 'DataManager', '$rootScope', 'Utility', '$state', function($scope, DataManager, $rootScope, Utility, $state) {

	var resetCall = $scope.resetCall = function() {
		$scope.call = {
			reply: $scope.profile ? $scope.profile.phone : void(0)
		};
	};

	resetCall();

	var formatMessage = $scope.formatMessage = Utility.formatMessage;

	$scope.charactersLeft = function() {
		return 160 - formatMessage($scope.call).length;
	};

	$scope.recipientNames = _(Utility.recipientNames).partial($scope.call.categories, $scope.providers);

	$scope.createCall = function() {
		var call = $scope.call;
		DataManager.create('Call', {
			date: moment().format(),
			formatted_message: formatMessage(call),
			message: call.message,
			location: call.location,
			reply: call.reply,
			recipients: Utility.recipientIds(call.categories, $scope.providers)
		}).then(function(call) {
			$state.go('calls.detail', {
				id: call.id
			});
		});
	};

	DataManager.modelMethod('Profile', 'getCurrent', { include: 'phone' })
		.then(function(profile) {
			$scope.profile = profile;
		})
		.then(resetCall);

	DataManager.fetchAll('Provider')
		.then(function(providers) {
			$scope.providers = providers;
			$scope.providerCategories = _(providers).chain()
				.pluck('category')
				.compact()
				.map(function(categories) {
					return categories.split(',');
				})
				.flatten()
				.uniq()
				.value()
				.sort();
		});
}]);
