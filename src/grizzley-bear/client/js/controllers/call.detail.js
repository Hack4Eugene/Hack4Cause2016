angular.module('fifteenApp').controller('CallDetailController', ['$scope', 'DataManager', '$stateParams', function($scope, DataManager, $stateParams) {
	DataManager.fetchOne('Call', $stateParams.id)
		.then(function(call) {
			$scope.call = call;
		});
}]);
