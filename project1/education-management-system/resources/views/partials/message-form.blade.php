<div ui-view="messageForm"
     ng-controller="MessageFormController" layout="column" layout-padding ng-cloak>
    <br/>
    <h3>@{{stateParams.stateTitle}}</h3>
    <md-progress-linear ng-show="showFormProgressSpinner" md-mode="indeterminate"></md-progress-linear>


    <input type="hidden" name="id" class=""
           placeholder="" ng-model="message.id" >



    <md-content class="md-no-momentum">

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Subject</label>
            <input ng-model="message.subject" type="text" ng-required="true">
        </md-input-container>

        <md-input-container class="md-icon-float md-block">
            <!-- Use floating label instead of placeholder -->
            <label>Message</label>
            <textarea ng-model="message.message" ng-required="true"></textarea>
        </md-input-container>

        <label>Recipients</label>
        <md-select ng-model="message.recipients">
            <md-option ng-repeat="user in users" ng-value="user.id" >
                @{{user.email}}
            </md-option>
        </md-select>
        <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                type="button"
                ng-click="createMessage()">
            <span class="ng-scope">CreateMsg</span>

            <div class="md-ripple-container"></div>
        </button>



    </md-content>
</div>