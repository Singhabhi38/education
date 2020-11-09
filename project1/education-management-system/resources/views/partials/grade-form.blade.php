<div ui-view="gradeForm"
     ng-controller="GradeFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>

    <input type="hidden" name="id" class=""
           placeholder="" ng-model="grade.id" >

    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Name *</label>
            <input ng-model="grade.name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Short Name *</label>
            <input ng-model="grade.short_name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Section *</label>
            <input ng-model="grade.section" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Year *</label>
            <input ng-model="grade.year" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Semester *</label>
            <input ng-model="grade.semester" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>trimester *</label>
            <input ng-model="grade.trimester" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>month *</label>
            <input ng-model="grade.month" type="text" ng-required="true">
        </md-input-container>
        
        <md-input-container class="md-block" ng-show="!editState">
        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                type="button"
                ng-click="createGrade()">
            <span class="ng-scope">Create</span>
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










