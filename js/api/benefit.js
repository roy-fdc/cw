myApp.controller('fupController', function ($scope, $http) {
    //display all career
    all_benefit($scope, $http);

});

function all_benefit($scope = null, $http = null) {
    
    $http({method:'GET', url:base_url+'/all-benefit'}).success(function(response){
        $scope.benefits = response;
    }).error(function (error) {
        alert(error);
    });
}
