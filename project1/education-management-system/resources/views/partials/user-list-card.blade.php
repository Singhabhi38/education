<md-content  ui-view="userListCard">
<h1>Users</h1>
<div ng-controller="FilterDBStoreController">
<div filter-user-by-course></div>
<div filter-user-by-status filter-success="filterSuccess(data)"></div>
<div filter-user-by-grade></div>
<div filter-user-by-role></div>

    <div class="" ng-controller="UserListCardsController">
        {{--This is where the Table is being created.--}}
        <div id="grid1" ui-grid="gridOptions" ui-grid-selection class="user-grid"></div>

        <md-card ng-repeat="user in users | orderBy:'userDetail.fullName'" layout="row">
            <div class="md-media-lg card-media">
                <img src="resources/images/qdi-generic-testimonial-person.png" width="50px" alt="Washed Out">
            </div>

            <md-card-title>
                <md-card-title-text>
                    <span class="md-headline" layout="start center">
                        <span ui-sref="userProfile({id: user.id})">
                            @{{ user.userDetail.firstName }} @{{ user.userDetail.lastName }}
                        </span>
                    </span>
                </md-card-title-text>
            </md-card-title>
            <md-card-content>
                <button id="ctsbtn" class="md-raised md-primary md-button md-ink-ripple"
                        type="button"
                        ui-sref="userProfile({id: user.id})">
                    <span class="ng-scope">Profile</span>
                    <div class="md-ripple-container"></div>
                </button>

                <button class="md-button md-ink-ripple"
                        type="button"
                        ui-sref="userEdit({id: user.id})">
                    <span class="ng-scope">Edit</span>
                    <div class="md-ripple-container"></div>
                </button>

                <button class="md-button md-ink-ripple"
                        type="button"
                        ng-click="deleteUser(user.id)">
                    <span class="ng-scope">Delete</span>
                    <div class="md-ripple-container"></div>
                </button>
            </md-card-content>
            <md-card-actions layout="row">
            </md-card-actions>
        </md-card>

    </div>
</div>
</div>
</md-content>


