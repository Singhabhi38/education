<div ui-view="assignGradeToUser"
     ng-controller="GradeUserFormController" layout="column" layout-padding ng-cloak>
    <md-content class="md-padding" layout-xs="column" layout="row">
        <div flex-xs flex-gt-xs="50" layout="column">
            <br/>
            <h3>@{{stateParams.stateTitle}}</h3>
            <md-card>
                <md-card-title>
                    <md-card-title-text>
                        <span class="md-headline"><a ui-sref="userProfile({id: user.id})">@{{user.userDetail.firstName}}</a></span>
                        <span class="md-subhead">
                <md-select ng-model="gradeUser.gradeId">
                    <md-option ng-repeat="grade in grades" ng-value="grade.id" >
                        @{{grade.name}}- @{{grade.shortName}} Section: @{{grade.section}}
                    </md-option>
                </md-select>
                <label>Level / Class /Grade</label>
                            {{--@{{user.email}}--}}
                </span>
                    </md-card-title-text>
                    {{--<md-card-title-media>--}}

                    {{--</md-card-title-media>--}}
                    <md-card-actions layout="row" layout-align="end center">
                        <button class="md-raised md-primary md-button md-ink-ripple"
                                type="button"
                                ng-click="assignGradeToUser()">
                            <span class="ng-scope">Submit</span>
                            <div class="md-ripple-container"></div>
                        </button>
                    </md-card-actions>
                </md-card-title>
            </md-card>
        </div>
        <div>
            <p ng-repeat="course in courses">
                @{{course}}
            </p>
        </div>
    </md-content>
</div>