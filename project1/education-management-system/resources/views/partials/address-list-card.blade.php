<div ui-view="addressListCard">
    <h1>Addresses</h1>

    <div class="" ng-controller="AddressListCardsController">
        {{--This is where the Table is being created.--}}
        <div id="grid1" ui-grid="gridOptions" ui-grid-selection class="user-grid"></div>

        <md-content class="md-padding" layout-xs="column" layout="row">
            {{--layout-xs="column"--}}
            <div flex-xs flex-gt-xs="50" layout="column">

                <md-card ng-repeat="address in addresses">
                    {{--<img ng-src="{{imagePath}}" class="md-card-image" alt="Washed Out">--}}
                    <md-card-title>
                        <md-card-title-text>
                    <span class="md-headline">
                         <i class="fa fa-check-square-o" aria-hidden="true"></i>
                        @{{ address.address }}
                    </span>
                        </md-card-title-text>
                    </md-card-title>
                    <md-card-actions layout="row" layout-align="end center">

                        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                                type="button"
                                ui-sref="addressDetail({id: address.id})">
                            <span class="ng-scope">Profile</span>
                            <div class="md-ripple-container"></div>
                        </button>

                        <button class="md-button md-ink-ripple"
                                type="button"
                                ui-sref="addressEdit({id: address.id})">
                            <span class="ng-scope">Edit</span>
                            <div class="md-ripple-container"></div>
                        </button>

                        <button class="md-button md-ink-ripple"
                                type="button"
                                ng-click="deleteAddress(address.id)">
                            <span class="ng-scope">Delete</span>
                            <div class="md-ripple-container"></div>
                        </button>

                    </md-card-actions>
                </md-card>
            </div>
        </md-content>
    </div>

</div>
</div>

