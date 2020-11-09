<div ui-view="assignCourseToUser"
     ng-controller="CourseUserFormController" layout="column" layout-padding ng-cloak>
    <md-content class="md-padding" layout-xs="column" layout="row">
        <div flex-xs flex-gt-xs="50" layout="column">
            <br/>
            <h3>@{{stateParams.stateTitle}}</h3>
            <md-card>
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline"><a ui-sref="userProfile({id: user.id})">@{{user.userDetail.firstName}}</a></span>
                        <span class="md-subhead">
                    <md-select ng-model="courseUser.courseId">
                    <md-option ng-repeat="course in courses" ng-value="course.id" >
                        @{{course.name}}
                    </md-option>
                </md-select>
                <label>Course</label>
                </span>
                    </md-card-title-text>
                    {{--<md-card-title-media>--}}

                    {{--</md-card-title-media>--}}
                    <md-card-actions layout="row" layout-align="end center">
                        <button class="md-raised md-primary md-button md-ink-ripple"
                                type="button"
                                ng-click="assignCourseToUser()">
                            <span class="ng-scope">Submit</span>
                            <div class="md-ripple-container"></div>
                        </button>
                    </md-card-actions>
                </md-card-title>
            </md-card>
        </div>
    </md-content>
</div>