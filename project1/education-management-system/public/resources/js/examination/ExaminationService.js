var ExaminationService = app.service('ExaminationService', function (ExaminationRESTClient) {
	return {
		get: function(id) {
			return ExaminationRESTClient.get({id:id.id}).$promise;
		},

		getEdit:function(id){
			return ExaminationRESTClient.getEdit({id:id.id})
		},

		post: function(examination){
			return ExaminationRESTClient.save(examination).$promise;
		},

		delete: function(id){
			return ExaminationRESTClient.delete({id:id}).$promise;
		},

		all: function(){
			return ExaminationRESTClient.query().$promise;
		},

		update: function(examination){
			return ExaminationRESTClient.update(examination).$promise;
		}
	}
});