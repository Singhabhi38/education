<div ui-view="scheduleListCard">
    <h1>Schedule</h1>

    <div class="mdl-grid demo-content" ng-controller="ScheduleListCardsController">

        {{--This is where the Table is being created.--}}
        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <div id="grid1" ui-grid="gridOptions" ui-grid-selection class="user-grid"></div>
        </div>


        <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
            <div ng-repeat="schedule in schedules"
                 class="demo-updates mdl-card mdl-shadow--2dp mdl-cell mdl-cell--4-col mdl-cell--4-col-tablet mdl-cell--3-col-desktop">


                <div class="md-media-lg card-media">
                    <img src="resources/images/qdi-generic-testimonial-person.png" width="50px" alt="Washed Out">
                </div>

                <md-card-title>
                    <md-card-title-text>
                    <span class="md-headline" layout="start center">
                        <span ui-sref="userProfile({id: user.id})">
                            @{{ schedule.name }}
                        </span>
                    </span>
                    </md-card-title-text>
                </md-card-title>
                <md-card-content>
                    {{--<button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"--}}
                    {{--type="button"--}}
                    {{--ui-sref="userProfile({id: user.id})">--}}
                    {{--<span class="ng-scope">Profile</span>--}}
                    {{--<div class="md-ripple-container"></div>--}}
                    {{--</button>--}}

                    <button id="ctsbtn"  class="md-button md-ink-ripple"
                            type="button"
                            ui-sref="scheduleEdit({id: schedule.id})">
                        <span class="ng-scope">Edit</span>
                        <div class="md-ripple-container"></div>
                    </button>

                    <button class="md-button md-ink-ripple"
                            type="button"
                            ng-click="deleteSchedule(schedule.id)">
                        <span class="ng-scope">Delete</span>
                        <div class="md-ripple-container"></div>
                    </button>
                </md-card-content>
                <hr>
                <md-card-actions layout="row">
                </md-card-actions>



                {{--<div class="mdl-card__actions mdl-card--border">--}}
                {{--<a href="#" class="mdl-button mdl-js-button mdl-js-ripple-effect">Profile</a>--}}
                {{--<a ui-sref="scheduleEdit" class="mdl-button mdl-js-button mdl-js-ripple-effect">Edit</a>--}}
                {{--</div>--}}
            </div>
        </div>
    </div>
</div>