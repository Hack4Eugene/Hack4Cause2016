angular.module('fifteenApp').controller('LogoutController', ['$rootScope', 'DataManager', 'LoopBackAuth', '$state', function($rootScope, DataManager, LoopBackAuth, $state) {
	DataManager.modelMethod('Profile', 'logout', { access_token: LoopBackAuth.accessTokenId })
		.finally(function() {
			delete $rootScope.currentUser;
			$state.go('login');
		});
}]);
