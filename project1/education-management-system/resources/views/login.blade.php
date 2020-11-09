<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="resources/css/login.css" rel="stylesheet">
</head>

<body ng-app="app">

<div class="container" ng-controller="LoginController">

    <form class="form-signin" action="login" method="post">
        <h2 class="form-signin-heading">Login</h2>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail"
               class="form-control" placeholder="Email address" required autofocus
               ng-model="email" name="email">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword"
               class="form-control" placeholder="Password" required
               ng-model="password" name="password">
        {{--<div class="checkbox">--}}
            {{--<label>--}}
                {{--<input type="checkbox" value="remember-me"> Remember me--}}
            {{--</label>--}}
        {{--</div>--}}

        {{--<button class="btn btn-lg btn-primary btn-block" ng-click="login()">Log in</button>--}}

        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
    </form>

</div>


<script src="vendor/angular/angular.min.js"></script>
<script src="resources/js/auth.js"></script>
<script src="resources/js/Authentication/Auth.js"></script>

</body>
</html>
