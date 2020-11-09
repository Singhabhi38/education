<div ui-view="roleForm"
     ng-controller="RoleFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>

    <input type="hidden" name="id" class=""
           placeholder="" ng-model="role.id" >

    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Name *</label>
            <input ng-model="role.name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Display Name *</label>
            <input ng-model="role.displayName" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Description *</label>
            <input ng-model="role.description" type="text" ng-required="true">
        </md-input-container>

        

        <md-input-container class="md-block" ng-show="!editState">
        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                type="button"
                ng-click="createRole()">
            <span class="ng-scope">Create Role</span>
            <div class="md-ripple-container"></div>
        </button>
        </md-input-container>

        <md-input-container class="md-block" ng-show="editState">
            <button class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="edit()">
                <span class="ng-scope">Edit</span>
                <div class="md-ripple-container"></div>
            </button>
        </md-input-container>
    </md-content>
</div>










