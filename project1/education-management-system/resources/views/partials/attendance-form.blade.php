<div ng-controller="AttendanceController" layout="column" layout-padding ng-cloak>
<h1>tests</h1>
    <md-content class="md-padding" layout-xs="column" layout="row">
    <div flex-xs flex-gt-xs="50" layout="row">
        <md-card ng-repeat="user in users">
            <md-card-title>
                <md-card-title-text>
                    <span class="md-headline">Card with image</span>
                    <span class="md-subhead">  @{{user.user_id}}</span>
                </md-card-title-text>
                <md-card-title-media>
                    <div class="md-media-md card-media"></div>
                </md-card-title-media>
            </md-card-title>
            <md-card-actions layout="row" layout-align="end center">
                <md-button>Present</md-button>
                <md-button>Absent</md-button>
            </md-card-actions>
        </md-card>
    </div>
    </md-content>
</div>