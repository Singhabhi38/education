<div ui-view="roomForm"
     ng-controller="RoomFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>

    <input type="hidden" name="id" class=""
           placeholder="" ng-model="room.id" >

    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Name *</label>
            <input ng-model="room.name" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Building *</label>
            <input ng-model="room.building" type="text" ng-required="true">
        </md-input-container>

       

       <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Room *</label>
            <input ng-model="room.room" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Floor *</label>
            <input ng-model="room.floor" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-block" ng-show="!editState">
        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                type="button"
                ng-click="createRoom()">
            <span class="ng-scope"><?php echo trans('save'); ?></span>
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











