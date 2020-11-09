<div ui-view="courseForm"
     ng-controller="CourseFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>

    <input type="hidden" name="id" class=""
           placeholder="" ng-model="course.id" >

    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Name *</label>
            <input ng-model="course.name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Room ID *</label>
            <input ng-model="course.room_id" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
                {{--<select name="gradeOption">--}}
                    {{--<option ng-repeat="">--}}
                    {{--</option>--}}
                {{--</select>--}}
            <label>@{{ tess }}</label>
            <md-select ng-model="tess">
                <md-option><em>None</em></md-option>
                <md-option ng-repeat="grade in grades" ng-value="grade.id">
                    @{{grade.shortName}} @{{grade.section}}
                </md-option>
            </md-select>


        </md-input-container>



         <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Therory Marks *</label>
            <input ng-model="course.theory_marks" type="text" ng-required="true">
        </md-input-container>

         <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Practical marks *</label>
            <input ng-model="course.practical_marks" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Theory *</label>
            <input ng-model="course.theory" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Practical  *</label>
            <input ng-model="course.practical" type="text" ng-required="true">
        </md-input-container>

        

        <md-input-container class="md-block" ng-show="!editState">
        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                type="button"
                ng-click="createCourse()">
            <span class="ng-scope">Create Course</span>
            <div class="md-ripple-container"></div>
        </button>
        </md-input-container>

        <md-input-container class="md-block" ng-show="editState">
            <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="edit()">
                <span class="ng-scope">Edit</span>
                <div class="md-ripple-container"></div>
            </button>
        </md-input-container>
    </md-content>
</div>










