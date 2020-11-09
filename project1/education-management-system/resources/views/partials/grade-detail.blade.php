<product-partial-view  ng-controller="GradeProfileController" ui-view="gradeDetail">

    <h1>Profile</h1>
    <h2 class="mdl-card__title-text">CLASS: @{{ grade.name }} "@{{ grade.section }}" </h2>
    <md-progress-linear md-mode="indeterminate" ng-show="showFormProgressSpinner"></md-progress-linear>
    <md-tabs md-dynamic-height md-border-bottom>
        <md-tab label="Users" >
            {{--<md-content class="md-padding">--}}

                <md-card ng-repeat="user in grade.users">
                    <div class="md-media-lg card-media">
                        {{--<img src="resources/images/qdi-generic-testimonial-person.png" width="50px" alt="Washed Out">--}}
                    </div>

                    <md-card-title>
                        <md-card-title-text>
                    <span class="md-headline" layout="start center">
                        <a ui-sref="userProfile({id: user.id})">
                             <span class="ng-scope">@{{user.email}}</span>
                        </a>
                    </span>
                        </md-card-title-text>
                    </md-card-title>
                    <md-card-content>

                    </md-card-content>
                    <md-card-actions layout="row">
                    </md-card-actions>
                </md-card>

            {{--</md-content>--}}
        </md-tab>
        <md-tab label="Courses/Subjects">
            <md-content class="md-padding">


                <md-card ng-repeat="course in grade.courses" layout="row">
                    <div class="md-media-lg card-media">
                        {{--<img src="resources/images/qdi-generic-testimonial-person.png" width="50px" alt="Washed Out">--}}
                    </div>

                    <md-card-title>
                        <md-card-title-text>
                    <span class="md-headline" layout="start center">
                        <a ui-sref="courseDetail({id: course.id})">
                             <span class="ng-scope">@{{course.name}}</span>
                        </a>
                    </span>
                        </md-card-title-text>
                    </md-card-title>
                    <md-card-content>

                    </md-card-content>
                    <md-card-actions layout="row">
                    </md-card-actions>
                </md-card>

            </md-content>
        </md-tab>

</product-partial-view>