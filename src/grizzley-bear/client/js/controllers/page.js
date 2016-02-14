angular.module('fifteenApp').controller('PageController', ['$scope', '$state', function($scope, $state) {
	$scope.isState = $state.is;
}]);
