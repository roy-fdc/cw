var base_url = "http://comweb.dev/api";
var myApp = angular.module('fupApp',['ngSanitize']);

myApp.controller('fupController', function ($scope, $http) {
    all_benefit($scope, $http);
    all_team($scope, $http);
    all_value($scope, $http);
});

function all_benefit($scope = null, $http = null) {
    
    $http({method:'GET', url:base_url+'/all-benefit'}).success(function(response){
        $scope.benefits = response;
    }).error(function (error) {
        alert(error);
    });
}

function all_team($scope = null, $http = null) {
    
    $http({method:'GET', url:base_url+'/all-team'}).success(function(response){
        $scope.teams = response;
    }).error(function (error) {
        alert(error);
    });
}

function all_value($scope, $http) {
    
    $http({method:'GET', url:base_url+'/all-value'}).success(function(response){
        $scope.values = response;
    }).error(function (error) {
        alert(error);
    });
}
