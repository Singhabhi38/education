<div ui-view="examinationForm"
     ng-controller="ExaminationFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>
    <md-progress-linear ng-show="showFormProgressSpinner" md-mode="indeterminate"></md-progress-linear>


    <input type="hidden" name="id" class=""
           placeholder="" ng-model="user.id" >



    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Name</label>
            <input ng-model="examination.name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Grade ID</label>
            <input ng-model="examination.grade_id" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Course ID</label>
            <input ng-model="examination.course_id" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Room ID</label>
            <input ng-model="examination.room_id" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-__block" ng-show="!editState">
            <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="createExamination()">
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