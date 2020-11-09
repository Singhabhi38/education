<div ui-view="messageListCard">
    <h1>Messages</h1>

    <div class="" ng-controller="MessageListCardsController">
        {{--This is where the Table is being created.--}}
        <md-content class="md-padding" layout-xs="column" layout="row">
            {{--layout-xs="column"--}}
            <div flex-xs flex-gt-xs="50" layout="column">

                <md-card ng-repeat="message in messages">
                     <md-button class="md-primary md-hue-1"
                               type="button"
                               ui-sref="messageDetail({id: message.id})">
                        <span class="ng-scope">@{{ message.subject }}</span>
                       </md-button>
                 </md-card>
            </div>
        </md-content>
    </div>

</div>
</div>

