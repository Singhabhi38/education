/**
 * Created by sadhikari on 8/19/2016.
 */
var RoleService = app.service('RoleService', function (RoleRESTClient) {
    var customParameters = {'ASSIGN_ROLE_TO_USER' : {'action' : 'assignRoleToUser'},
                            'REMOVE_ALL_ROLES_ASSIGNED_TO_USER' : {'action' : 'removeAllRoleUserData'},
                            };

    return {
        get: function(id) {
            return RoleRESTClient.get({id:id.id}).$promise;
        },

        post: function(role){
            return RoleRESTClient.save(role).$promise;
        },

        assignRoleToUser: function(roleUser){

            roleUser.customParameters = customParameters['ASSIGN_ROLE_TO_USER'];
            return RoleRESTClient.save(roleUser).$promise;
        },

        delete: function(id){
            return RoleRESTClient.delete({id:id}).$promise;
        },

        all: function(){
            return RoleRESTClient.query().$promise;
        },

        update: function(role){
            return RoleRESTClient.update(role).$promise;
        }
    }
});