<div ui-view="transactionCreate" ng-controller="TransactionFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>

    <input type="hidden" name="id" class=""
           placeholder="" ng-model="transaction.id" >

    <input type="hidden" name="userId" class=""
           placeholder="" ng-model="transaction.userId" >

    <input type="hidden" name="createdBy" class=""
           placeholder="" ng-model="transaction.createdBy" >

    <input type="hidden" name="updatedBy" class=""
           placeholder="" ng-model="transaction.updatedBy" >

    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Name *</label>
            <input ng-model="transaction.name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Transaction Type *</label>
            <input ng-model="transaction.type" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Bill No *</label>
            <input ng-model="transaction.billNo" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Amount *</label>
            <input ng-model="transaction.amount" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Remarks *</label>
            <input ng-model="transaction.remarks" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-block" ng-show="!editState">
            <button id="ctsbtn" md-raised md-primary class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="save()">
                <span class="ng-scope">Create Transaction</span>
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