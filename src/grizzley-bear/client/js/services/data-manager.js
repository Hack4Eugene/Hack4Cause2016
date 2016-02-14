angular.module('fifteenApp')
	.factory('DataManager', ['Profile', 'Provider', 'Call', function(Profile, Provider, Call) {
		var models = _(arguments).chain()
			.filter(function(arg) {
				return !!arg.modelName;
			})
			.map(function(model) {
				return [model.modelName, model];
			})
			.object()
			.value();
		var DataManager = {};

		var methodCall = function(obj, methodName) {
			return obj[methodName].apply(null, _(arguments).rest(2)).$promise;
		};

		var modelCall = function(modelName, methodName) {
			return methodCall.apply(null, [models[modelName], methodName].concat(_(arguments).rest(2)));
		};

		var idObj = function(id, fk) {
			return {
				id: id,
				fk: fk
			};
		};

		var relatedModel = function(modelName, relatedName) {
			return models[modelName][relatedName];
		};

		DataManager.fetchAll = function(modelName) {
			return modelCall(modelName, 'find');
		};

		DataManager.fetchOne = function(modelName, id) {
			return modelCall(modelName, 'findById', idObj(id));
		};

		DataManager.fetchWhere = function(modelName, where) {
			return modelCall(modelName, 'find', { filter: where });
		};

		DataManager.create = function(modelName, props) {
			return modelCall(modelName, _(props).isArray() ? 'createMany' : 'create', props);
		};

		DataManager.updateOne = function(modelName, id, props) {
			return modelCall(modelName, 'prototype$updateAttributes', idObj(id), props);
		};

		DataManager.destroyOne = function(modelName, id) {
			return modelCall(modelName, 'destroyById', idObj(id));
		};

		DataManager.fetchAllRelated = function(modelName, relatedName, id, where) {
			return modelCall(modelName, relatedName, _(idObj(id)).extend({ filter: where }));
		};

		DataManager.fetchOneRelated = function(modelName, relatedName, id, fk) {
			return methodCall(relatedModel(modelName, relatedName), 'findById', idObj(id, fk));
		};

		DataManager.createRelated = function(modelName, relatedName, id, props) {
			return methodCall(relatedModel(modelName, relatedName), _(props).isArray() ? 'createMany' : 'create', idObj(id), props);
		};

		DataManager.updateRelated = function(modelName, relatedName, id, fk, props) {
			return methodCall(relatedModel(modelName, relatedName), 'updateById', idObj(id, fk), props);
		};

		DataManager.destroyRelated = function(modelName, relatedName, id, fk) {
			return methodCall(relatedModel(modelName, relatedName), 'destroyById', idObj(id, fk));
		};

		DataManager.destroyAllRelated = function(modelName, relatedName, modelId, id) {
			var where = {};
			where[modelId] = id;
			return methodCall(relatedModel(modelName, relatedName), 'destroyAll', where);
		};

		DataManager.modelMethod = modelCall;

		DataManager.relatedModelMethod = function(modelName, relatedName, methodName) {
			return methodCall.apply(null, [relatedModel(modelName, relatedName), methodName].concat(_(arguments).rest(3)));
		};

		return DataManager;
	}]);
