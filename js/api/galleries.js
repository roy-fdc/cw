myApp.controller('fupController', function ($scope, $http) {
    //display all career
    api_galleries($scope, $http);
    
});

function api_galleries($scope = null, $http = null) {
    $http({method:'GET', url:base_url+'api_galleries'}).success(function(response){
        $scope.galleries = response;
    }).error(function (error) {
        alert(error);
    });
}
