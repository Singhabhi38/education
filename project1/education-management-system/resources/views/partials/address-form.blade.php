<div ui-view="addressForm"
     ng-controller="AddressFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>
    <md-progress-linear ng-show="showFormProgressSpinner" md-mode="indeterminate"></md-progress-linear>


    <input type="hidden" name="id" class=""
           placeholder="" ng-model="address.id" >



    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Address</label>
            <input ng-model="address.address" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Zone</label>
            <input ng-model="address.zone" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>District</label>
            <input ng-model="address.district" type="text" ng-required="true">
        </md-input-container>



        <md-input-container class="md-__block" ng-show="!editState">
            <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="createAddress()">
                <span class="ng-scope">Create</span>

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