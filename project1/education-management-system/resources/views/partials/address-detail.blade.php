<product-partial-view  ng-controller="AddressProfileController" ui-view="addressDetail">

    <h1>Profile</h1>
    <h2 class="mdl-card__title-text">Address : @{{ address.address }}</h2>
    <h2 class="mdl-card__title-text">Zone: @{{ address.zone }}</h2>
    <h2 class="mdl-card__title-text">District: @{{ address.district }}</h2>



</product-partial-view>