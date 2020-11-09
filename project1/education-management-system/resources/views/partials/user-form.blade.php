<div ui-view="userForm"
     ng-controller="UserFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>

    <input type="hidden" name="id" class=""
           placeholder="" ng-model="user.id" >

    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>First Name *</label>
            <input ng-model="user.firstName" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Last Name *</label>
            <input ng-model="user.lastName" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-block">
            <!-- Use floating placeholder instead of label -->
            <input ng-model="user.email" type="email" placeholder="Email *" ng-required="true">
        </md-input-container>

        <md-input-container class="md-block">
            <!-- Use floating placeholder instead of label -->
            <input ng-model="user.password" type="password" placeholder="Password *" ng-required="true">
        </md-input-container>

        <md-input-container class="md-block">
            <!-- Use floating placeholder instead of label -->
            <input ng-model="user.confirmPassword" type="password" placeholder="Confirm Password *" ng-required="true">
        </md-input-container>


        <md-input-container class="md-block">
            <!-- Use floating placeholder instead of label -->
            <input ng-model="user.dob" type="text" placeholder="Date of Birth (AD) *" ng-required="true">
        </md-input-container>

        <md-radio-group ng-model="user.gender">Gender
            <md-radio-button value="M">Male</md-radio-button>
            <md-radio-button value="F"> Female </md-radio-button>
        </md-radio-group>

        <md-progress-linear md-mode="indeterminate" ng-show="showFormProgressSpinner"></md-progress-linear>

        <md-input-container class="md-block" ng-show="!editState">
        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                type="button"
                ng-click="signUp()">
            <span class="ng-scope">Register</span>
            <div class="md-ripple-container"></div>
        </button>
        </md-input-container>

        <md-input-container class="md-block" ng-show="editState">
            <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="edit()">
                <span class="ng-scope">Edit</span>
                <div class="md-ripple-container"></div>
            </button>
        </md-input-container>
    </md-content>
</div>










