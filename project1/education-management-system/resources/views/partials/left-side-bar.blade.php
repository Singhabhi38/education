<div ng-controller="UserController">

    <div layout="column" id="main-view-left-side-nav-user-detail">
        <div flex>
            {{--<img ng-src="resources/images/generic-user-blue-profile-pic.png"--}}
            {{--height="64"--}}
            {{--width="64"--}}
            {{-->--}}

        </div>
        <div flex class="md-title">
            <i class="fa fa-user" aria-hidden="true"></i>
            @{{ user.userDetail.fullName}}
        </div>
    </div>

    <md-divider class="md-whiteframe-1dp"></md-divider>

    <div class="main-view-left-side-nav-menu">
        <i class="fa fa-users" aria-hidden="true"></i>
        <a flex class="md-primary" ui-sref="userListCard" >People</a>
    </div>

    <md-divider></md-divider>

    <div class="main-view-left-side-nav-menu">
        <i class="fa fa-sitemap" aria-hidden="true"></i>
        <a flex class="md-primary" layout-align="start center" ui-sref="gradeListCard">Classes</a>
    </div>

    <md-divider></md-divider>

    <div class="main-view-left-side-nav-menu">
        <i class="fa fa-book" aria-hidden="true"></i>
        <a flex class="md-primary" ui-sref="courseListCard">Subjects</a>
    </div>

    <md-divider></md-divider>

    <div class="main-view-left-side-nav-menu">
        <i class="fa fa-newspaper-o" aria-hidden="true"></i>
        <a flex class="md-primary" ui-sref="examinationListCard">Examinations</a>
    </div>

    <md-divider></md-divider>

    <div class="main-view-left-side-nav-menu">
        <i class="fa fa-server" aria-hidden="true"></i>
        <a flex class="md-primary" ui-sref="marksListCard">My Marks</a>
    </div>

    <md-divider></md-divider>

    <div class="main-view-left-side-nav-menu">
        <i class="fa fa-check-square-o" aria-hidden="true"></i>
        <a flex class="md-primary" ui-sref="attendanceListCard">Attendance</a>
    </div>

    <md-divider class="md-whiteframe-1dp"></md-divider>

    <div class="main-view-left-side-nav-menu md-title">
        <i class="fa fa-cogs" aria-hidden="true"></i>
        <a flex class="md-primary" ui-sref="#">Administration</a>
    </div>

    <md-divider></md-divider>

    <div class="main-view-left-side-nav-menu">
        <a flex class="md-primary" ui-sref="roleListCard">Roles</a>
    </div>

</div>
