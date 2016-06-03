
var base_url = "http://comweb.dev/api";
var myApp = angular.module('fupApp',['ngSanitize','jkuri.gallery']);
//var myApp = angular.module('fupApp',[]);

myApp.directive('attachment', ['$parse', function ($parse) {
    return {
        restrict: 'A',
        link: function(scope, element, attrs) {
            var model = $parse(attrs.attachment);
            var modelSetter = model.assign;
            
            element.bind('change', function(){
                scope.$apply(function(){
                    modelSetter(scope, element[0].files[0]);
                });
            });
        }
    };
}]);

myApp.controller('fupController', function ($scope, $http) {
    $scope.msgContact = '';
    $scope.IsVisible = false;
    $scope.albumContainer = true;
    var self = this;
    
    all_benefit($scope, $http);
    all_team($scope, $http);
    all_value($scope, $http);
    
    company_detail($scope, $http);
    company_mission($scope, $http);
    company_vision($scope, $http);
    all_career($scope, $http);
    
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
                       thumb: 'images/galleries/thumb/'+album.images[x].image_name,
                       img: 'images/galleries/'+album.images[x].image_name
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
    
    // career option
    $scope.careerClickName = 'INQUIRY';
    $scope.quickApply = function() {
        //$scope.careerClickName = $scope.careername;
        $("select#subject").val($scope.careername);
    }
    
    $scope.removeCareerDescription = function() {
        $scope.careerVisibleContainer = false;
        //$scope.careerClickName = 'INQUIRY';
        $("select#subject").val('INQUIRY'); 
    }
    // for career single show details
    $scope.showCareerDetail = function(id) {
        var y = $(window).scrollTop();  //your current y position on the page
        $(window).scrollTop(y+450);

        $scope.careerVisibleContainer = true;
        angular.forEach($scope.careers, function(career) {
            if (career.id == id) {
                $scope.careerDetailContainer = career.career_detail;
                $scope.careername = career.career_title;
                $scope.careerID = career.id;
            }
        })
    }

    //sendMail
    $scope.sendMail = function() {
        var _data = {};
        _data.Post = $scope.add;
        var bl = new FormData();

        bl.append('attachment', $scope.attachment);
        bl.append('name', $scope.name);
        bl.append('email', $scope.email);
        bl.append('phone', $scope.phone);
        bl.append('subject', $scope.subject);
        bl.append('message', $scope.message);               

        $http
            .post('http://fdc-inc.com/new-design/contact-us/processMail', bl,{
                transformRequest: angular.identity,
                headers: {'Content-Type': undefined}
            })
            .success(function(response) {
                $scope.msgContact = "Email Sent.";
                $('#contactform').find('input[type=text], input[type=file], input[type=password], input[type=number], input[type=email], textarea').val('');
            }).error(function(data, status, headers, config) {
                $scope.msgContact = "Error in Sending Email.";
                $('Error in Sending Email.').appendTo('#msgContact');
        });
    }

    
});

function all_benefit($scope, $http) {

    $http({method:'GET', url:base_url+'/all-benefit'}).success(function(response){
        $scope.benefits = response;
    });
}

function all_team($scope, $http) {
    $http({method:'GET', url:base_url+'/all-team'}).success(function(response){
        $scope.teams = response;
    });
}

function all_value($scope, $http) {  
    $http({method:'GET', url:base_url+'/all-value'}).success(function(response){
        $scope.values = response;
    });
}

function company_detail($scope, $http) {
    $http.get(base_url+'/company-detail').success(function(data){
        $scope.detail = data[0].description;
    });   
}

function company_mission($scope, $http) {   
    $http.get(base_url+'/company-mission').success(function(data){
        $scope.company_mission = data[0].description;
    });
}

function company_vision($scope, $http) {  
     $http.get(base_url+'/company-vision').success(function(data){
        $scope.company_vision = data[0].description;
    });
}

function all_career($scope, $http) {
    $http({method:'GET', url:base_url+'/all-career'}).success(function(response){
        $scope.careers = response;
    });
}

