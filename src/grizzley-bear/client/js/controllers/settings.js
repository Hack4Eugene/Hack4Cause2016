angular.module('fifteenApp').controller('SettingsController', ['$scope', '$rootScope', 'DataManager', '$state', function($scope, $rootScope, DataManager, $state) {
	DataManager.modelMethod('Profile', 'getCurrent')
		.then(function(profile) {
			$scope.profile = profile;
		});
	$scope.save = function() {
		var profile = $scope.profile;
		DataManager.updateOne('Profile', $rootScope.currentUser.id, { phone: profile.phone })
			.then(_($state.go).partial('dashboard'));
	};
}]);
