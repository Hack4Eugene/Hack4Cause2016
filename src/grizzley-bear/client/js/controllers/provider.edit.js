angular.module('fifteenApp').controller('ProviderEditController', ['$scope', 'DataManager', '$state', '$stateParams', '$uibModal', function($scope, DataManager, $state, $stateParams, $uibModal) {
	var providerId = $stateParams.id;

	$scope.categories = [];

	$scope.save = function() {
		var provider = $scope.provider;
		provider.category = $scope.categories.join(',');
		if (!providerId) {
			return DataManager.create('Provider', provider)
				.then(function(provider) {
					$state.go('providers.edit', {
						id: provider.id
					})
				});
		}
		return DataManager.updateOne('Provider', providerId, provider)
			.then($scope.$parent.fetchProviders)
			.then(_($state.go).partial('providers'));
	};

	$scope.addCategory = function() {
		var modal = $uibModal.open({
			animation: true,
			template: '<div class="modal-header"><h4 class="modal-title">Add Category</h4></div><form ng-submit="save()"><div class="modal-body"><div class="form-group"><label class="col-sm-2 control-label">Name</label><div class="col-sm-10"><input class="form-control" ng-model="category.name" /></div></div></div><div class="modal-footer"><button type="submit" class="btn btn-default">Save</a></div></form>',
			controller: ['$scope', '$uibModalInstance', function($scope, $uibModalInstance) {
				$scope.category = {};
				$scope.cancel = _($uibModalInstance.dismiss).partial('cancel');
				$scope.save = function() {
					$uibModalInstance.close($scope.category.name);
				};
			}]
		});
		modal.result.then(function(category) {
			$scope.categories.push(category);
		});
	};

	$scope.removeCategory = function(category) {
		$scope.categories = _($scope.categories).without(category);
	};

	if (providerId) {
		DataManager.fetchOne('Provider', providerId)
			.then(function(provider) {
				$scope.provider = provider;
				$scope.categories = provider.category.split(',');
			});
	}

}]);
