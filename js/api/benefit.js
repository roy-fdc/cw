myApp.controller('fupController', function ($scope, $http) {
    //display all career
    api_benefit($scope, $http);

});

function api_benefit($scope = null, $http = null) {
    
    $http({method:'GET', url:base_url+'api_allBenefit'}).success(function(response){
        $scope.benefits = response;
    }).error(function (error) {
        alert(error);
    });
}
