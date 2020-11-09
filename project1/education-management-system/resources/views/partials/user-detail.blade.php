<md-content  ng-controller="UserProfileController" ui-view="userProfile">
    <md-progress-linear md-mode="indeterminate" ng-show="showFormProgressSpinner"></md-progress-linear>

    <md-card class="md-whiteframe-5dp">
        {{--<img ng-src="@{{imagePath}}" class="md-card-image" alt="Washed Out">--}}
        <md-card-title>
            <md-card-title-text>
                {{--<md-subheader class="md-primary">Student</md-subheader>--}}
                <span class="md-headline">
                    <i class="fa fa-user" ></i>
                    @{{ user.userDetail.fullName }}
                </span>

                <md-divider></md-divider>
                {{--<span class="md-headline">--}}
                {{--</span>--}}
            </md-card-title-text>
        </md-card-title>
        <md-card-content>
            <p>
                <i class="fa fa-envelope" aria-hidden="true"></i>
                Email : @{{user.email}}
            </p>
            <p>
                <i class="fa fa-calendar" aria-hidden="true"></i>
                Date of Birth : @{{user.userDetail.dob}}
            </p>
        </md-card-content>

        <md-card-actions layout="row" layout-align="end center">
            <button class=" md-button md-ink-ripple" ng-class="presentOrAbsentStyle"
                    type="button"
                    ng-click="present()">
                <i class="fa fa-hand-paper-o" aria-hidden="true"></i>
                <span class="ng-scope">Present
                </span>
                <div class="md-ripple-container"></div>
            </button>

            <button class=" md-button md-ink-ripple" ng-class="presentOrAbsentStyle"
                    type="button"
                    ng-click="absent()">

                <i class="fa fa-square" aria-hidden="true"></i>
                <span class="ng-scope">Absent
                </span>
                <div class="md-ripple-container"></div>
            </button>
        </md-card-actions>
    </md-card>

    <md-tabs md-dynamic-height md-border-bottom class="product-detail-page-tab">

    <md-tab label="Subjects">
        <md-content class="md-padding">
            <md-list>
                <md-list-item class="md-3-line" ng-repeat="course in user.courses | orderBy:'name'">
                    {{--<img ng-src="@{{item.face}}?@{{$index}}" class="md-avatar" alt="@{{item.who}}">--}}
                    <div class="md-list-item-text">
                        <h3>
                            <i class="fa fa-book" aria-hidden="true"></i>
                            <a ui-sref="courseDetail({id: course.id})">
                                <span class="ng-scope">@{{course.name}}</span>
                                <span class="ng-scope">@{{course.grade}}</span>
                            </a>
                        </h3>
                    </div>
                    {{--<md-button class="md-secondary">Respond</md-button>--}}
                    <md-divider ></md-divider>
                    {{--ng-if="!$last"--}}
                </md-list-item>
            </md-list>


        </md-content>
    </md-tab>
        <md-tab label="Attendance">
            <md-content class="md-padding" layout="column" style="height:400px">
                <md-list>
                    <md-list-item class="md-3-line" ng-repeat="attendance in user.attendanceRecords">
                        <img ng-src="@{{item.face}}?@{{$index}}" class="md-avatar" alt="@{{item.who}}">
                        <div class="md-list-item-text">
                            <h3>@{{attendance.nepaliDate}}
                                @{{attendance.in_or_out}}</h3>
                            <p>@{{attendance.updatedAtHuman}}</p>
                        </div>
                        {{--<md-button class="md-secondary">Respond</md-button>--}}
                        <md-divider ></md-divider>
                        {{--ng-if="!$last"--}}
                    </md-list-item>
                </md-list>

            </md-content>
        </md-tab>

    <md-tab label="Administration">

        {{--<div class="md-whiteframe-5dp">--}}
            {{--<md-button class="md-primary"--}}
                       {{--type="button"--}}
                       {{--ui-sref="assignGradeToUser({id: user.id})">--}}
                {{--<span class="ng-scope">--}}

                    {{--Change Class</span>--}}
            {{--</md-button>--}}
            {{--<md-button class="md-primary"--}}
                       {{--type="button"--}}
                       {{--ui-sref="assignRoleToUser({id: user.id})">--}}
                {{--<span class="ng-scope">--}}
                    {{--Change Role</span>--}}
            {{--</md-button>--}}
            {{--<md-button class="md-primary"--}}
                       {{--type="button"--}}
                       {{--ui-sref="assignCourseToUser({id: user.id})">--}}
                {{--<span class="ng-scope">--}}
                    {{--<i class="fa fa-book" aria-hidden="true"></i>--}}
                    {{--Assign Course(s)</span>--}}
            {{--</md-button>--}}




        {{--</div>--}}


        <md-whiteframe class="md-whiteframe-10dp" style="margin:10px;"
                       flex-sm="45"
                       flex-gt-sm="35"
                       flex-gt-md="25"
                       layout
                       {{--layout-align="center center"--}}
        >
            <md-button class="md-primary"
                       type="button"
                       ui-sref="assignCourseToUser({id: user.id})">
                <span class="ng-scope">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    Assign Course(s)</span>
            </md-button>
        </md-whiteframe>

        <md-whiteframe class="md-whiteframe-10dp" style="margin:20px;"
                       flex-sm="45"
                       flex-gt-sm="35"
                       flex-gt-md="25"
                       layout
                       layout-align="center center">
            <md-button class="md-primary"
                       type="button"
                       ui-sref="assignCourseToUser({id: user.id})">
                <span class="ng-scope">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    Assign Course(s)</span>
            </md-button>
        </md-whiteframe>


    </md-tab>

    <md-tab label="All Threads">
        <h1>All Threads are to be displayed here...</h1>

    </md-tab>

</md-tabs>
</md-content>