<div ui-view="assignRoleToUser"
     ng-controller="RoleUserFormController" layout="column" layout-padding ng-cloak>
    <md-content class="md-padding" layout-xs="column" layout="row">
        <div flex-xs flex-gt-xs="50" layout="column">
            <br/>
            <h3>@{{stateParams.stateTitle}}</h3>
            <md-card>
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline"><a ui-sref="userProfile({id: user.id})">@{{user.userDetail.firstName}}</a></span>
                        <span class="md-subhead">
                <md-select ng-model="roleUser.roleId">
                    <md-option ng-repeat="role in roles" ng-value="role.id" >
                        @{{role.name}}
                    </md-option>
                </md-select>
                <label>Role</label>
                            {{--@{{user.email}}--}}
                </span>
                    </md-card-title-text>
                    {{--<md-card-title-media>--}}

                    {{--</md-card-title-media>--}}
                    <md-card-actions layout="row" layout-align="end center">
                        <button class="md-raised md-primary md-button md-ink-ripple"
                                type="button"
                                ng-click="assignRoleToUser()">
                            <span class="ng-scope">Submit</span>
                            <div class="md-ripple-container"></div>
                        </button>
                    </md-card-actions>
                </md-card-title>
            </md-card>
        </div>
    </md-content>
</div>