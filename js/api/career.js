myApp.controller('fupController', function ($scope, $http) {
    //display all career
    all_career($scope, $http);

    //display career details
    /*$scope.careerDetails = function(id) {
            angular.forEach($scope.careers, function(value) {
              if(value.id == id){
              	$scope.careerVDetails = value.career_detail;
              }
            });
        };*/
});

function all_career($scope, $http) {
    
    $http({method:'GET', url:base_url+'/all-career'}).success(function(response){
        $scope.careers = response;
    }).error(function (error) {
        alert(error);
    });
}
