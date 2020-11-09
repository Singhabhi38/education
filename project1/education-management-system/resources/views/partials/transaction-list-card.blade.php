<div ui-view="transactionListCard">
    <h1>Transactions</h1>
    <div class="" ng-controller="TransactionListCardsController">

        {{--This is where the Table is being created.--}}
        <div id="grid1" ui-grid="gridOptions" ui-grid-selection class="transaction-grid"></div>

        <md-content class="md-padding" layout-xs="column" layout="row">
            <div flex-xs flex-gt-xs="50" layout="column">
                <md-card ng-repeat="transaction in transactions">
                    <md-card-title>
                        <md-card-title-text>
                            <span class="md-headline"> @{{ transaction.name }}</span>
                        </md-card-title-text>
                    </md-card-title>
                    <md-card-actions layout="row" layout-align="end center">

                        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                                type="button"
                                ui-sref="transactionDetail({id: transaction.id})">
                            <span class="ng-scope">Transaction Detail</span>
                            <div class="md-ripple-container"></div>
                        </button>


                        <button  class=" md-raised md-primary md-button md-ink-ripple"
                                type="button"
                                ui-sref="transactionEdit({id: transaction.id})">
                            <span class="ng-scope">Edit</span>
                            <div class="md-ripple-container"></div>
                        </button>

                        <button  class=" md-raised md-warn md-button md-ink-ripple"
                                type="button"
                                ng-click="deleteTransaction(transaction.id)">
                            <span class="ng-scope">Delete</span>
                            <div class="md-ripple-container"></div>
                        </button>

                    </md-card-actions>
                </md-card>
            </div>
        </md-content>

    </div>
</div>