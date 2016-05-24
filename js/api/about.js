myApp.controller('fupController', function ($scope, $http) {
    //display all career
    api_about($scope, $http);

});

function api_about($scope = null, $http = null) {
    
    $http({method:'GET', url:base_url+'api_about'}).success(function(response){
        $scope.about = response;
    }).error(function (error) {
        alert(error);
    });
}
