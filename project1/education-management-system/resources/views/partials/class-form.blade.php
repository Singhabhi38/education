<div ng-controller="MyController" ng-cloak="" > 
  <md-content layout-padding>  
    <md-select ng-model="usersModel">
    <md-option ng-value="user" ng-repeat="user in users">@{{ user.name }}</md-option>
  </md-select>
  </md-content>
  </div>