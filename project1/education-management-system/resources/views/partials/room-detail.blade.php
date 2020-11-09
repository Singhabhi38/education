<product-partial-view  ng-controller="RoomProfileController" ui-view="roomDetail">

    <h1>Profile</h1>
    <h2 class="mdl-card__title-text">Room NAME: @{{ room.name }}</h2>
    <h2 class="mdl-card__title-text">Building ID: @{{ room.building }}</h2>
    <h2 class="mdl-card__title-text">Room ID: @{{ room.room }}</h2>
    <h2 class="mdl-card__title-text">Floor ID: @{{ room.floor }}</h2>


</product-partial-view>