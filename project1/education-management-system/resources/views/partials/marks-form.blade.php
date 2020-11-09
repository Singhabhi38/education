<div ui-view="marksForm"
     ng-controller="MarksFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>

    <input type="hidden" name="id" class=""
           placeholder="" ng-model="mark.id" >

    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Name</label>
            <input ng-model="mark.name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Exam Id</label>
            <input ng-model="mark.exam_id" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating placeholder instead of label -->
            <label>User Id</label>
            <input ng-model="mark.user_id" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating placeholder instead of label -->
            <label>Remarks</label>
            <input ng-model="mark.remarks" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-block" ng-show="!editState">
            <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                    type="button"
                    ng-click="createMarks()">
                <span class="ng-scope">Create Marks</span>
                <div class="md-ripple-container"></div>
            </button>
        </md-input-container>

    </md-content>
</div>