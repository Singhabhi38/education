<product-partial-view  ng-controller="MessageProfileController" ui-view="messageDetail">

    <h1>Profile</h1>
    <h2 class="mdl-card__title-text">Subject: @{{ message.thread.subject }}</h2>
    <h2 class="mdl-card__title-text">Creator: @{{ message.creator }}</h2>

</product-partial-view>