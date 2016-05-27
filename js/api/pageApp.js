
var base_url = "http://comweb.dev/api";
var myApp = angular.module('fupApp',['ngSanitize', 'jkuri.gallery']);

myApp.controller('fupController', function ($scope, $http) {
    
    $scope.IsVisible = false;
    $scope.albumContainer = true;
    var self = this;
    
    all_benefit($scope, $http);
    all_team($scope, $http);
    all_value($scope, $http);
    
    $http.get(base_url+'/all-album').success(function(data){
        $scope.albums = data;
    })
    $scope.viewByAlbum = function(id) {
        $scope.albumContainer = false;
        $scope.IsVisible = true;
        angular.forEach($scope.albums, function(album) {
            if (album.album_id == id) {
                $scope.albumName = album.album_name;
                var arr = [];
                for(var x in album.images) {
                    arr.push({
                       thumb: 'image/galleries/'+album.images[x].image_name,
                       img: 'image/galleries/'+album.images[x].image_name
                    });
                } 
                self.images = arr;
            }
        })
    }
    $scope.closeImages = function() {
        $scope.albumContainer = true;
        $scope.IsVisible = false;
    }
    
});

function all_benefit($scope, $http) {
    
    $http({method:'GET', url:base_url+'/all-benefit'}).success(function(response){
        $scope.benefits = response;
    }).error(function (error) {
        alert(error);
    });
}

function all_team($scope, $http) {
    
    $http({method:'GET', url:base_url+'/all-team'}).success(function(response){
        $scope.teams = response;
    }).error(function (error) {
        alert(error);
    });
}

function all_value($scope, $http) {
    
    $http({method:'GET', url:base_url+'/all-value'}).success(function(response){
        $scope.values = response;
    }).error(function (error) {
        alert(error);
    });
}
