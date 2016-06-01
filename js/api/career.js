myApp.controller('fupController', function ($scope, $http) {
    //display all career
   $http({method:'GET', url:base_url+'/all-career'})
        .success(function(response){
            $scope.careers = response;
        }).error(function (error) {
            alert(error);
        });
        
   
});
