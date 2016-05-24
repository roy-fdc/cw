var base_url = "http://comweb.dev/api/ApiController/";
var myApp = angular.module('fupApp', ['angularUtils.directives.dirPagination']);

myApp.controller('fupController', function ($scope, $http) {

    //display data
    //api_slider($scope, $http);
    api_galleries($scope, $http);

});

function api_slider($scope = null, $http = null) {
    $http({method:'GET', url:base_url+'api_imageSlider'}).success(function(response){
        $scope.slider = response;
    }).error(function (error) {
        alert(error);
    });
}

function api_galleries($scope = null, $http = null) {
    $http({method:'GET', url:base_url+'api_galleries'}).success(function(response){
        $scope.galleries = response;
    }).error(function (error) {
        alert(error);
    });
}