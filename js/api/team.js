myApp.controller('fupController', function ($scope, $http) {
    //display all career
    api_team($scope, $http);
});

function api_team($scope = null, $http = null) {
    
    $http({method:'GET', url:base_url+'api_allTeam'}).success(function(response){
        $scope.teams = response;
    }).error(function (error) {
        alert(error);
    });
}
