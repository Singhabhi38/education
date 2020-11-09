<div ui-view="marksListCard">
    <h1>My Marks</h1>

    <div class="" ng-controller="MarksListCardsController">
        {{--This is where the Table is being created.--}}
        <div id="grid1" ui-grid="gridOptions" ui-grid-selection class="user-grid"></div>

        <md-content class="md-padding" layout-xs="column" layout="row">
            {{--layout-xs="column"--}}
            <div flex-xs flex-gt-xs="50" layout="column">

                <md-card ng-repeat="mark in marks">
                    {{--<img ng-src="{{imagePath}}" class="md-card-image" alt="Washed Out">--}}
                    <md-card-title>
                        <md-card-title-text>
                    <span class="md-headline">
                        @{{ mark.name }} @{{ mark.remarks }}
                    </span>
                        </md-card-title-text>
                    </md-card-title>
                    <md-card-actions layout="row" layout-align="end center">

                        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                                type="button"
                                ui-sref="markDetail({id: mark.id})">
                            <span class="ng-scope">Profile</span>
                            <div class="md-ripple-container"></div>
                        </button>

                        <button class="md-button md-ink-ripple"
                                type="button">
                            <span class="ng-scope">Edit</span>
                            <div class="md-ripple-container"></div>
                        </button>

                        <button class="md-button md-ink-ripple"
                                type="button"
                                ng-click="deleteMarks(mark.id)">
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

