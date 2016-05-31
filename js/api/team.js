myApp.controller('fupController', function ($scope, $http) {
    //display all career
    all_team($scope, $http);
});

function all_team($scope, $http) {
    
    $http({method:'GET', url:base_url+'/all-team'}).success(function(response){
        $scope.teams = response;
    }).error(function (error) {
        alert(error);
    });
}
