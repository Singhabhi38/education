<product-partial-view ng-controller="CourseDetailController as courseDetailCtrl">
    <h1>Subject: @{{ course.name }} Class ID: @{{ course.gradeId }} </h1>
    <h4 class="mdl-card__title-text">Theory Marks: @{{ course.theory_marks }} <br> Practical Marks: @{{ course.practical_marks }} <br> Theory: @{{ course.theory }} <br> Practical: @{{ course.practical }} </h4>
    <md-tabs md-dynamic-height md-border-bottom style="product-detail-page-tab">
        <md-tab label="Users">
            <md-content class="md-padding">
            	<md-button ng-repeat="user in course.users"
                           class="md-raised"
                           type="button"
                           ui-sref="userProfile({id: user.id})">
                    <span class="ng-scope">@{{user.email}}</span>
                </md-button>
            </md-content>
        </md-tab>
        <md-tab label="Rooms">
            <md-content class="md-padding">
            	<md-chips>
                    <md-chip >
                       Room no: @{{course.roomId}}
                    </md-chip>
                </md-chips>
            </md-content>
        </md-tab>
        <md-tab label="Attendance">
            <md-content class="md-padding">
              <div ui-view="attendanceForm"></div>
            </md-content>
        </md-tab>
        <md-tab label="Schedule">
            <md-content class="md-padding">
                <div ui-view="scheduleForm"></div>
            </md-content>
        </md-tab>
</product-partial-view>