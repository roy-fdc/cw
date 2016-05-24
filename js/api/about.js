

myApp.controller('fupController', function ($scope, $http, $sce) {
    
    $http.get(base_url+'/company-detail').success(function(data){
        $scope.deliberatelyTrustDangerousSnippet = data[0].description;
    })
    
    $http.get(base_url+'/company-vision').success(function(data){
        $scope.company_vision = data;
    })
    
    $http.get(base_url+'/company-mission').success(function(data){
        $scope.company_mission = data;
    })
});


