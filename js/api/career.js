myApp.controller('fupController', function ($scope, $http) {
    //display all career
    api_career($scope, $http);

    //display career details
    $scope.careerDetails = function(id) {
            angular.forEach($scope.careers, function(value) {
              if(value.id == id){
              	$scope.careerVDetails = value.career_detail;
              }
            });
        };
});

function api_career($scope = null, $http = null) {
    
    $http({method:'GET', url:'http://comweb.dev/api/ApiController/api_allCareer'}).success(function(response){
        $scope.careers = response;
    }).error(function (error) {
        alert(error);
    });
}
