<product-partial-view  ng-controller="RoleProfileController" ui-view="roleDetail">

    <h1>Profile</h1>
    <h2 class="mdl-card__title-text">ROLE NAME: @{{ role.name }}</h2>
    <h2 class="mdl-card__title-text">Display Name : @{{ role.displayName }}</h2>
    <h2 class="mdl-card__title-text">DESCRIPTION: @{{ role.description }}</h2>
    <md-progress-linear md-mode="indeterminate" ng-show="showFormProgressSpinner"></md-progress-linear>
    <md-tabs md-dynamic-height md-border-bottom>
        <md-tab label="Users">
            <md-content class="md-padding">
                <md-button ng-repeat="user in role.users"
                           class="md-raised"
                           type="button"
                           ui-sref="userProfile({id: user.id})">
                    <span class="ng-scope">@{{user.email}}</span>
                </md-button>
            </md-content>
        </md-tab>
    </md-tabs>
</product-partial-view>