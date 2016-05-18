myApp.controller('fupController', function ($scope, $http) {
    //display data
    api_career($scope, $http);

});

function api_career($scope = null, $http = null) {
    
    $http({method:'GET', url:'http://comweb.dev/api/ApiController/api_allCareer'}).success(function(response){
        
         $scope.career = response;
        alert(JSON.stringify($scope.career));
    }).error(function (error) {
        alert(error);
    });
}
