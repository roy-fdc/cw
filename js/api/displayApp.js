var base_url = "http://comweb.dev/api/ApisController/";
var myApp = angular.module('fupApp', []);

myApp.controller('fupController', function ($scope, $http) {
    all_album($scope, $http);
    page_introduction($scope, $http);
});

function all_album($scope, $http) {
    $http({method:'GET', url:base_url+'all_album'}).success(function(response){
        $scope.galleries = response;
    }).error(function (error) {
        alert(error);
    });
}

function page_introduction($scope, $http) {
    $http({method:'GET', url:base_url+'page_introduction'}).success(function(response){
        $scope.intro = response;
    }).error(function (error) {
        alert(error);
    });
}