var base_url = "http://comweb.dev/api/ApiController/";
var myApp = angular.module('fupApp', ['angularUtils.directives.dirPagination']);

myApp.controller('fupController', function ($scope, $http) {

    //display data
    api_benefit($scope, $http);
    api_career($scope, $http);
    api_team($scope, $http);

});

function api_benefit($scope = null, $http = null) {
    $http({method:'GET', url:base_url+'api_benefit'}).success(function(response){
        $scope.benefit = response;
    }).error(function (error) {
        alert(error);
    });
}

function api_career($scope = null, $http = null) {
    $http({method:'GET', url:base_url+'api_career'}).success(function(response){
        alert(JSON.stringify(response));
        $scope.career = response;
    }).error(function (error) {
        alert(error);
    });
}

function api_team($scope = null, $http = null) {
    $http({method:'GET', url:base_url+'api_team'}).success(function(response){
        $scope.team = response;
    }).error(function (error) {
        alert(error);
    });
}