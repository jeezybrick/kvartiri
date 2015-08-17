@extends('app')

@section('content')



  <div ng-app="countryApp" ng-controller="CountryCtrl">
  <form class="form-inline">
    <div class="form-group">
      <label for="exampleInputName2">Поиск</label>
      <input ng-model="query" type="text" class="form-control" id="exampleInputName2" placeholder="Введите для поиска..">
    </div>
  </form>
   <hr>

   <div ng-if="query" class="table-responsive" id="sortProductAngular">
        <table class="table table-response table-bordered table-striped">
          <tr>
            <th><a href="" ng-click="sortField ='id'; reverse = !reverse">ID</a></th>
            <th><a href="" ng-click="sortField = 'price'; reverse = !reverse">Цена</a></th>
            <th><a href="" ng-click="sortField = 'street'; reverse = !reverse">Улица</a></th>
            <th><a href="" ng-click="sortField = 'created_at'; reverse = !reverse">Создан</a></th>
          </tr>
          <tr ng-repeat="announcement in announcements | filter:query | orderBy:sortField:reverse">
            <td>@{{announcement.id}}</td>
            <td>@{{announcement.price}}</td>
            <td>@{{announcement.street}}</td>
            <td>@{{announcement.created_at}}</td>
          </tr>
        </table>
   </div>
   </div>
   <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.3/angular.min.js"></script>
     <script>
         var countryApp = angular.module('countryApp', []);
         countryApp.controller('CountryCtrl', function ($scope, $http){
           $http.get('test/get').success(function(data) {
             $scope.announcements = data;
           });

           $scope.sortField = 'created_at';
           $scope.reverse = true;
         });
       </script>

@stop