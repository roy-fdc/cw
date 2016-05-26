var base_url = "http://comweb.dev/api";
var myApp = angular.module('fupApp',['ngSanitize']);

myApp.controller('fupController', function ($scope, $http) {
    all_benefit($scope, $http);
    all_team($scope, $http);
    all_value($scope, $http);
    company_detail($scope, $http);
    company_mission($scope, $http);
    company_vision($scope, $http);
    all_career($scope, $http);

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

function company_detail($scope, $http) {
    $http.get(base_url+'/company-detail').success(function(data){
        $scope.detail = data[0].description;
    });   
}

function company_mission($scope, $http) {   
    $http.get(base_url+'/company-mission').success(function(data){
        $scope.company_mission = data;
    });
}

function company_vision($scope, $http) {  
     $http.get(base_url+'/company-vision').success(function(data){
        $scope.company_vision = data;
    });
}

function all_career($scope = null, $http = null) {
    $http({method:'GET', url:base_url+'/all-career'}).success(function(response){
        $scope.careers = response;
    }).error(function (error) {
        alert(error);
    });
}

