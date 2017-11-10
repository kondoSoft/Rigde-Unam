'use strict';

var appSecControllers = angular.module('appSecControllers', []);

appSecControllers.controller('LoginController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc",  
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc) 
{
    if($auth.isAuthenticated()) 
    	return $location.path("/panelcontrol");

    
	$scope.login = function() 
	{
		$scope.$broadcast('show-errors-check-validity');
		if($scope.loginForm.$valid) 
		{
		  $scope.$broadcast('show-errors-reset');
		  $rootScope.$broadcast('ntLoadingStart'); 
		  $auth.login({ email: $sanitize($scope.userName), password: $sanitize($scope.userPassword) })
		  .then(function(response) {
	  		noty({text: 'Cargando información...', type: 'success',  timeout: app.notytimeout});
	  		usersSvc.setUserData(response.data.userdata);
	  		//$scope.userIsSuperAdmin = response.data.isSuperAdmin;
	  		$rootScope.$broadcast('ntLoadingEnd');
	  		$rootScope.authenticated = true;
	  		
	  		$location.path('/panelcontrol');
        })
        .catch(function(response) 
        {
          noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
          $rootScope.$broadcast('ntLoadingEnd');
        });
	  }
    };

    $controller('BaseController', {$scope: $scope}); 
	//$scope.userInfo = null;
	
}]);
