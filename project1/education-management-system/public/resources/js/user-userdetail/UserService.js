var UserService = app.service('UserService', function (UserRESTClient) {
	return {
		get: function(id) {
			return UserRESTClient.get({id:id.id}).$promise;
		},

		post: function(user){
			return UserRESTClient.save(user).$promise;
		},

		delete: function(id){
			return UserRESTClient.delete({id:id}).$promise;
		},

		all: function(){
			return UserRESTClient.query().$promise;
		},

		update: function(user){
			return UserRESTClient.update(user).$promise;
		}
	}
});