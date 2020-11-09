<div class="mdl-grid demo-content" ng-controller="LoginController">
    <div class="demo-charts mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid">
        <form>
            <div class="form-group label-static is-empty">
                <h3>Login</h3>
                <div class="form-group label-static is-empty">
                    <input type="email" name="name" class="form-control"
                           id="i2" placeholder="Email" ng-model="name">
                </div>
                <div class="form-group label-static is-empty ripple-container">
                    <input type="button" value="Login" class="btn btn-raised btn-primary fa fa-sign-in" ng-click="login()">
                </div>
            </div>
        </form>
    </div>
</div>