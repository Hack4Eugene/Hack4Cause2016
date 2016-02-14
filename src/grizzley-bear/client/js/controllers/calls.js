angular.module('fifteenApp').controller('CallsController', ['$scope', 'DataManager', function($scope, DataManager) {
	DataManager.fetchAll('Call')
		.then(function(calls) {
			$scope.calls = calls;
		});
}]);
