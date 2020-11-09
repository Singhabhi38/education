<div ng-controller="ScheduleFormController" layout="column" layout-padding ng-cloak>
    <br/>
    {{--<h3>@{{stateParams.stateTitle}}</h3>--}}

    <input type="hidden" name="id" class=""
           placeholder="" ng-model="schedule.id">

    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Name</label>
            <input ng-model="schedule.name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>From</label>
            <input ng-model="schedule.from" type="date" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>To</label>
            <input ng-model="schedule.to" type="date" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Except Date Time</label>
            <input ng-model="schedule.except_date_time_csv" type="text" ng-required="true">
        </md-input-container>
        <md-input-container class="md-icon-float md-block">
            <h3>Select Days</h3>
        </md-input-container>

        <md-input-container class="md-icon-float md-block">

            <md-checkbox md-no-ink ng-model="schedule.sun" aria-label="Sunday" ng-true-value="1" ng-false-value="0">
                Sun
            </md-checkbox>

            <md-checkbox md-no-ink ng-model="schedule.mon" aria-label="Sunday" ng-true-value="1" ng-false-value="0">
                Mon
            </md-checkbox>

            <md-checkbox md-no-ink ng-model="schedule.tue" aria-label="Sunday" ng-true-value="1" ng-false-value="0">
                Tue
            </md-checkbox>

            <md-checkbox md-no-ink ng-model="schedule.wed" aria-label="Sunday" ng-true-value="1" ng-false-value="0">
                Wed
            </md-checkbox>

            <md-checkbox md-no-ink ng-model="schedule.thu" aria-label="Sunday" ng-true-value="1" ng-false-value="0">
                Thu
            </md-checkbox>


            <md-checkbox md-no-ink ng-model="schedule.fri" aria-label="Sunday" ng-true-value="1" ng-false-value="0">
                Fri
            </md-checkbox>

            <md-checkbox md-no-ink ng-model="schedule.sat" aria-label="Sunday" ng-true-value="1" ng-false-value="0">
                Sat
            </md-checkbox>
        </md-input-container>


        <md-input-container class="md-block" ng-show="!editState">
            <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="createSchedule()">
                <span class="ng-scope">Create Schedule</span>
                <div class="md-ripple-container"></div>
            </button>
        </md-input-container>

        <md-input-container class="md-block" ng-show="editState">
            <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="edits()">
                <span class="ng-scope">Edit</span>
                <div class="md-ripple-container"></div>
            </button>
        </md-input-container>
    </md-content>
</div>