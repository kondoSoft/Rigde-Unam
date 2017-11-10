'use strict';

var appControllers = angular.module('appControllers', []);

/*Controlador base, los de abajo deben de heredar de este*/
appControllers.controller('BaseController', ["$auth", "$location", "$scope", "usersSvc", "$rootScope","$filter",
function ($auth, $location, $scope, usersSvc, $rootScope,$filter) 
{
	var userData = usersSvc.getUserData();
		   
	/*
		Los datos de abajo siempre deben de ser incluídos en todo controller after login
	*/
	$scope.userData = userData;
	$scope.main_title_section = '';
	
	$scope.urlHeaderNoAutenticado = '/js/app/templates/headernoautenticado.html';
	$scope.urlHeaderAutenticado = '/js/app/templates/headerautenticado.html';
	$scope.urlFooter = '/js/app/templates/footer.html';

	$scope.loading_screen = function()
	{

		return pleaseWait({
			  backgroundColor: '#5E5E5F',
			  logo: 'img/escudo1.png',
			  loadingHtml: '<div class="sk-spinner sk-spinner-wave"><div class="sk-rect1"></div><div class="sk-rect2"></div><div class="sk-rect3"></div><div class="sk-rect4"></div><div class="sk-rect5"></div></div><div class="sk-spinner sk-spinner-wave"><div class="sk-rect1"></div><div class="sk-rect2"></div><div class="sk-rect3"></div><div class="sk-rect4"></div><div class="sk-rect5"></div></div>'
		});
	};

	
	
}]);

appControllers.controller('HomeController', ["$controller", "$auth", "$location", "$scope", "usersSvc", "$filter","$rootScope",
function ($controller, $auth, $location, $scope, usersSvc, $filter,$rootScope) 
{
	
	if(!$auth.isAuthenticated()) 
		return $location.path("/login");
 	
 	$rootScope.$broadcast('menu:updated', null);

	$scope.logout = function () 
	{
  		$rootScope.$broadcast('menu:updated', null);
		if(!$auth.isAuthenticated()) 
		{
        	return;
    	}
		$auth.logout().then(
			function()
			{
				usersSvc.destroyUserData();
				noty({text: 'Has salido de la aplicación', type: 'success',  timeout: app.notytimeout});
				
				return $location.path('/login');
			}
		);
    };
    

    
	

 	$controller('BaseController', {$scope: $scope});
	var userData = usersSvc.getUserData();
    $scope.username = userData.clinombre+' '+userData.cliapellidopaterno+' '+userData.cliapellidomaterno;
    $scope.claveplan = userData.cliusername;
    $scope.cliid = userData.cliid;

    /*
    	verificar en que etapa esta Activiti
    	para mostrar las opciones Autoevaluación y seguimiento
    */


}]);

appControllers.controller('FaqsController', ["$controller", "$auth", "$location", "$scope", "usersSvc", "$filter","$rootScope",
function ($controller, $auth, $location, $scope, usersSvc, $filter,$rootScope) 
{
	

	if($auth.isAuthenticated()) 
	{
		var userData = usersSvc.getUserData();
		$controller('BaseController', {$scope: $scope});
	    $scope.username = userData.clinombre+' '+userData.cliapellidopaterno+' '+userData.cliapellidomaterno;
	    $scope.claveplan = userData.cliusername;
	    $scope.cliid = userData.cliid;
	}
   
    
}]);


appControllers.controller('IndicadorController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc","planestudiosSvc" , 
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, planestudiosSvc) 
{
   $scope.formuFormula = false;
   $scope.formIndi = true;
   $scope.inputsformula = [];
   $scope.textinfoform = false;
   $scope.plan = {};
   $scope.plan.gclaveisi = [];

   var userData = usersSvc.getUserData();

    $controller('BaseController', {$scope: $scope}); 
    var loading;
    loading = $scope.loading_screen();
	indicadorSvc.getResponsables()
      .then(function(result) 
    		  {
    	  		
    	  		$scope.respseg = result;
    	  		$scope.respeje = result;
    		  }, 
    		  function(error)
    		  {
			  	
    		  }
    	  );
    indicadorSvc.getDimensiones()
      .then(function(result) 
    		  {
    	  		
    	  		$scope.dimension = result;
    		  }, 
    		  function(error)
    		  {
			  	
    		  }
    	  );
    planestudiosSvc.getPlanes()
    	.then(function(result) 
    		  {
    		  	
    	  		$scope.planes = result;
    		  }, 
    		  function(error)
    		  {
			  	
    		  }
    	  );
    loading.finish();

    $scope.agregarPlan = function (planestudios)
	{
		if(planestudios)
		{
			var string = planestudios.split('-');
			var plan = string[0]+'-'+string[1];
			var flag = $scope.plan.gclaveisi.indexOf(plan) > -1;
			
			if(flag == true){
				alert('Ya existe un planestudios');
				$scope.selectedState = null;
			}
			else{
				$scope.selectedState = null;
				$scope.plan.gclaveisi.push(plan);	
			}


		}
		else
		{
			alert('Ingrese un plan de estudios');
		}
		
			
	};

	$scope.saveIndicador = function ()
	{
		$scope.$broadcast('show-errors-check-validity');
		if($scope.indicadorForm.$valid) 
		{
			$scope.$broadcast('show-errors-reset');
			 $rootScope.$broadcast('ntLoadingStart'); 
			 noty({text: 'Guardando información...', type: 'success',  timeout: app.notytimeout});
			 indicadorSvc.registrarInicador(userData.cliid,$scope.indicadorForm)
			  .then(function(response) {
			  	var d= JSON.parse(response);
		  		noty({text: d.msg, type: 'success',  timeout: app.notytimeout});
		  		console.log(d.idindicador);
		  		console.log(d);
		  		$scope.idindicador = d.idindicador;
		  		$rootScope.$broadcast('ntLoadingEnd');
		  		$scope.formuFormula = true;
  				$scope.formIndi = false;
		  		
	        })
	        .catch(function(response) 
	        {
	          noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          $rootScope.$broadcast('ntLoadingEnd');
	        });
			
	  	}
	  	
	  	
	};

	$scope.addInput = function(nvar){
	  $scope.inputsformula.push({id:nvar,label:nvar});
	};

	$scope.parserFormula = function(){
		var texto = $scope.textFormula;
		//remplazamos operadores por ','
		texto = texto.match(/[a-zA-Z]+/gi,' ');
		$scope.variablesform = texto;
		if($scope.porcentual){
			$scope.inputsformula = [];
			angular.forEach(texto, function(value, key) {
				$scope.addInput(value);	 		
			});
		}
		
	};
	
	$scope.changePorcentual = function()
	{
		if($scope.porcentual && $scope.textFormula != ''){
			var texto = $scope.textFormula;
			//remplazamos operadores por ','
			texto = texto.match(/[a-zA-Z]+/gi,' ');
			$scope.variablesform = texto;
			$scope.inputsformula = [];
			angular.forEach(texto, function(value, key) {
				$scope.addInput(value);	 		
			});
			
		}
		else
		{
			$scope.inputsformula = [];
		}
	};

	$scope.saveFormula = function ()
	{
		$scope.$broadcast('show-errors-check-validity');
		if($scope.formForm.$valid) 
		{
			console.log($scope.formForm);
			console.log($scope.inputsformula);
			$scope.$broadcast('show-errors-reset');
			 $rootScope.$broadcast('ntLoadingStart'); 
			 noty({text: 'Guardando información...', type: 'success',  timeout: app.notytimeout});
			 var loading2 = $scope.loading_screen();
			 indicadorSvc.registrarFormula(userData.cliid,$scope.formForm,$scope.inputsformula)
			  .then(function(response) {
		  		noty({text: response.msg, type: 'success',  timeout: app.notytimeout});
		  		$rootScope.$broadcast('ntLoadingEnd');	
		  		$scope.textFormula = '';
		  		$scope.inputsformula = [];
		  		$scope.porcentual = false;
		  		$scope.textVariables = '';
		  		$scope.variablesform = '';
		  		$scope.formForm.$setPristine();
		  		$scope.textinfoform = 'Se guardo correctamente la fórmula, puede agregar más si lo requiere.';
		  		noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
		  		loading2.finish();
	        })
	        .catch(function(response) 
	        {
	          noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          $rootScope.$broadcast('ntLoadingEnd');
	          loading2.finish();
	        });
			
	  	}
	  	
	};
	
}]);


appControllers.controller('ListIndicadorController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" , "$filter", 
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, $filter) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	var userData = usersSvc.getUserData();
	var loading;

	$scope.misindicadores = [];
	$controller('BaseController', {$scope: $scope}); 
	$rootScope.$broadcast('ntLoadingStart'); 
	noty({text: 'Cargando información...', type: 'success',  timeout: app.notytimeout});
	var userid = $routeParams.userid;
	
	$scope.ifshow= true;    
	$scope.indiseg = {};
	$scope.disabledelete='';
	$scope.deleting=false;
	$scope.deletemsg='';
	$scope.usertodelete={};
	$scope.paginationdata={};
	$scope.orderfield = 'cinclave';
	$scope.orderdesc = 'asc';
	$scope.q="";
	$scope.useraccess = {};
	$scope.allacess = {};

	/*loading = $scope.loading_screen();
	indicadorSvc.listIndicador()
      .then(function(result) 
    		  {
    	  		var p = result.data;
    	  		var parse = JSON.parse(p);
    	  		console.log(parse.data);
    	  		$scope.misindicadores = parse.data;
    	  		$rootScope.$broadcast('ntLoadingEnd');
    	  		loading.finish();
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          	$rootScope.$broadcast('ntLoadingEnd');
	          	loading.finish();
    		  }
    	  );*/

	$scope.getLisIndicador = function(){
	    var q = $scope.q;                                   
	    var nextpage = $scope.paginationdata.current_page;
	    noty({text: 'Recuperando información...', type: 'success',  timeout: app.notytimeout});    
	   	indicadorSvc.listIndicador(q,nextpage,$scope.orderfield,$scope.orderdesc)
	    .then(
	        function(result)
	        {
	        	var jsondata = JSON.parse(result.data);
	            $scope.paginationdata = jsondata;
	            $scope.misindicadores = [];
	            angular.forEach(jsondata.data,function(v,k){                 
	                $scope.misindicadores.push(v);                 
	            });  
	            $rootScope.$broadcast('ntLoadingEnd');
	            
	        },function(error)
	        {
	            $scope.msg = 'Error al recuperar la información';
	            noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
	            return false;
	        }
	    );
	}

	$scope.getSearch = function()
	{
	    /*$scope.total = 0;
	    $scope.currentPage = '';
	    $scope.hasMorePages = false;
	    $scope.perPage = false;*/
	    $scope.orderfield = 'cliapellidopaterno';
	    $scope.orderdesc = 'asc';
	    $scope.paginationdata.current_page=1;
	    

	    $scope.getLisIndicador();
	}



	$scope.cancelDelete=function()
	{
	    $scope.usertodelete={};
	    $scope.deletemsg="";
	    angular.element('#modalconfirmdelete').modal('hide');        
	}

	$scope.changePage = function(page)
	    {
	        $scope.paginationdata.current_page = page;
	        $scope.getLisIndicador();
	    };

	$scope.doOrder = function(orderfield,orderdesc)
	{
	    $scope.orderfield = orderfield;
	    $scope.orderdesc = orderdesc;
	    $scope.paginationdata.current_page=1;
	    $scope.getLisIndicador();
	}


	$scope.getSearch();
		
     
	$scope.changeEstatus = function ( indicador, index)
	{
		noty({text: 'Actualizando...', type: 'success',  timeout: app.notytimeout});
		indicadorSvc.updatedEstatus(1,indicador)
			.then(function(result) 
    		  {
    		  	
    	  		$scope.misindicadores[index].cinactivo = ($scope.misindicadores[index].cinactivo == 1) ? 2:1;
    	  		noty({text: result.data, type: 'success',  timeout: app.notytimeout});
    	  		$rootScope.$broadcast('ntLoadingEnd');
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	         	$rootScope.$broadcast('ntLoadingEnd');
    		  }
    	  );
	}; 


 	 
}]);

appControllers.controller('ListDimensionController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" , 
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	var userData = usersSvc.getUserData();

	$scope.misdimensiones = [];
	$controller('BaseController', {$scope: $scope}); 
	$rootScope.$broadcast('ntLoadingStart'); 
	noty({text: 'Cargando información...', type: 'success',  timeout: app.notytimeout});
	
	 indicadorSvc.getDimensiones()
      .then(function(result) 
    		  {
    	  		
    	  		$scope.misdimensiones = result;
    	  		$rootScope.$broadcast('ntLoadingEnd');
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          	$rootScope.$broadcast('ntLoadingEnd');	
    		  }
    	  );

	$scope.changeEstatus = function ( dimension, index)
	{
		noty({text: 'Actualizando...', type: 'success',  timeout: app.notytimeout});
		indicadorSvc.updatedEstatus(2,dimension)
			.then(function(result) 
    		  {
    		  	
    	  		$scope.misdimensiones[index].dimactiva = ($scope.misdimensiones[index].dimactiva == 1) ? 2:1;
    	  		noty({text: result.data, type: 'success',  timeout: app.notytimeout});
    	  		$rootScope.$broadcast('ntLoadingEnd');
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	         	$rootScope.$broadcast('ntLoadingEnd');
    		  }
    	  );
	};     
}]);


appControllers.controller('AutoevaluacionWorkflowController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" ,"$filter", "Excel", "$timeout",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, $filter,Excel,$timeout) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	

	var userData = usersSvc.getUserData();
	$scope.misdimensiones = [];
	
	$scope.cliid = userData.cliid;
	$controller('BaseController', {$scope: $scope}); 
	
	 indicadorSvc.getDimensiones()
      .then(function(result) 
    		  {
    	  		
    	  		$scope.misdimensiones = result;
    	  		$rootScope.$broadcast('ntLoadingEnd');
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          	$rootScope.$broadcast('ntLoadingEnd');	
    		  }
    	  );
       $scope.exportToExcel=function(tableId){ // ex: '#my-table'
           // $scope.exportHref=Excel.tableToExcel(tableId,'sheet name');
           // $timeout(function(){location.href=$scope.fileData.exportHref;},100); // trigger download
            var exportHref=Excel.tableToExcel(tableId,'sheet name');
            $timeout(function(){location.href=exportHref;},100); // trigger download
        }
}]);

appControllers.controller('SeguimientoDimController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" ,"$filter", "Excel", "$timeout",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, $filter,Excel,$timeout) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	var cliid = $routeParams.cliid;
	var userData = usersSvc.getUserData();
	$scope.misdimensiones = [];
	
	//$scope.cliid = userData.cliid;
	$scope.cliid = cliid;
	$controller('BaseController', {$scope: $scope}); 
	
	 indicadorSvc.getDimensiones()
      .then(function(result) 
    		  {
    	  		
    	  		$scope.misdimensiones = result;
    	  		$rootScope.$broadcast('ntLoadingEnd');
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          	$rootScope.$broadcast('ntLoadingEnd');	
    		  }
    	  );
       
}]);


appControllers.controller('ObservacionesSeguimientoController', ["$timeout", "$controller", "$scope", "$location", "$routeParams", "$auth", "usersSvc","$filter", "indicadorSvc",
function ($timeout, $controller, $scope, $location, $routeParams, $auth, usersSvc,$filter,indicadorSvc) 
{	
    if(!$auth.isAuthenticated())
    	return $location.path("/");   

    /*
    	Los datos de abajo siempre deben de ser incluídos en el controller
    */
    var userData = usersSvc.getUserData();

	var cinid = $routeParams.cinid;
	var iduser = $routeParams.userid;
	$scope.nomindicador = '';
  	$scope.claveindicador = '';
  	$scope.porcentaje = '';
  	$scope.observaciones = '';
    $scope.cumplimiento = '';
    $scope.reestructuracion = '';

    noty({text: 'Recuperando información...', type: 'success',  timeout: app.notytimeout});    
   	indicadorSvc.getDetaiIndilSeg(cinid, iduser)
    .then(
        function(result)
        {
        	var jsondata = JSON.parse(result.data);
          	$scope.nomindicador = jsondata[0].cinnombre;
          	$scope.claveindicador = jsondata[0].cinclave;
          	$scope.porcentaje = jsondata[0].eval_porcentaje;
          	$scope.observaciones = jsondata[0].msegavance;
          	$scope.cumplimiento = jsondata[0].msegcumplimiento;
            $scope.reestructuracion = jsondata[0].msegestrategias;
            
            
        },function(error)
        {
            $scope.msg = 'Error al recuperar la información';
            noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
            return false;
        }
    );
    indicadorSvc.getRetroIndiSeg(cinid, iduser)
    .then(
        function(result)
        {
        	
            
            
        },function(error)
        {
            $scope.msg = 'Error al recuperar la información';
            noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
            return false;
        }
    );
		
     	
     	
}]);


appControllers.controller('SeguimientoIndicadoresController', ["$timeout", "$controller", "$scope", "$location", "$routeParams", "$auth", "usersSvc","$filter", "indicadorSvc",
function ($timeout, $controller, $scope, $location, $routeParams, $auth, usersSvc,$filter,indicadorSvc) 
{	
    if(!$auth.isAuthenticated())
    	return $location.path("/");   


    /*
    	Los datos de abajo siempre deben de ser incluídos en el controller
    */
    var userData = usersSvc.getUserData();
	$scope.cliid = userData.cliid;
	var iddim = $routeParams.iddim;
	var iduser = $routeParams.userid;
    // Heredamos los datos del header y footer y userData  
    $controller('BaseController', {$scope: $scope}); //This works    
	var boton_on = 'btn waves-effect waves-light cyan darken-2';
	var boton_off = 'btn disabled';
	$scope.bclass = boton_on;
	$scope.ifshow= true;    
	$scope.indiseg = {};
	$scope.disabledelete='';
	$scope.deleting=false;
	$scope.deletemsg='';
	$scope.usertodelete={};
	$scope.paginationdata={};
	$scope.orderfield = 'cliusername';
	$scope.orderdesc = 'desc';
	$scope.q="";
	$scope.useraccess = {};
	$scope.allacess = {};



$scope.getIndicadorSeg = function(){
    var q = $scope.q;                                   
    var nextpage = $scope.paginationdata.current_page;
    noty({text: 'Recuperando información...', type: 'success',  timeout: app.notytimeout});    
   	indicadorSvc.getIndicadorSeg(iddim, iduser,q,nextpage,$scope.orderfield,$scope.orderdesc)
    .then(
        function(result)
        {
        	var jsondata = JSON.parse(result.data);
            $scope.paginationdata = jsondata;
            $scope.indiseg = [];
            angular.forEach(jsondata.data,function(v,k){                 
                $scope.indiseg.push(v);                 
            });  
            $scope.iddim = iddim;
            $scope.userid = iduser;
            console.log($scope.paginationdata);
            
        },function(error)
        {
            $scope.msg = 'Error al recuperar la información';
            noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
            return false;
        }
    );
}

$scope.getSearch = function()
{
    /*$scope.total = 0;
    $scope.currentPage = '';
    $scope.hasMorePages = false;
    $scope.perPage = false;*/
    $scope.orderfield = 'cliapellidopaterno';
    $scope.orderdesc = 'asc';
    $scope.paginationdata.current_page=1;
    

    $scope.getIndicadorSeg();
}



$scope.cancelDelete=function()
{
    $scope.usertodelete={};
    $scope.deletemsg="";
    angular.element('#modalconfirmdelete').modal('hide');        
}

$scope.changePage = function(page)
    {
        $scope.paginationdata.current_page = page;
        $scope.getIndicadorSeg();
    };

$scope.doOrder = function(orderfield,orderdesc)
{
    $scope.orderfield = orderfield;
    $scope.orderdesc = orderdesc;
    $scope.paginationdata.current_page=1;
    $scope.getIndicadorSeg();
}


$scope.getSearch();
		
     	
     	
}]);



appControllers.controller('AutoevaluacionDimensionWorkflowController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" ,"$filter", 
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, $filter) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	

	var userData = usersSvc.getUserData();
	$scope.misindicadoresauto = [];
	$scope.cliid = userData.cliid;

	$rootScope.$broadcast('ntLoadingStart'); 
	noty({text: 'Cargando información...', type: 'success',  timeout: app.notytimeout});
	var userid = $routeParams.userid;
	var iddim = $routeParams.iddim;
	$scope.total_indicadores= 0;
	
	$scope.getEvaluados = function()
	{
		var t = 0;
		angular.forEach($scope.misindicadoresauto, function(value, key) {
					console.log(+'-'+key);
					if(value.eval_completo == 2)
						t++;
		});

		return t;
	};
	indicadorSvc.listIndicadorAuto(iddim)
      .then(function(result) 
    		  {
    	  		var p = result.data;
    	  		var parse = JSON.parse(p);
    	  		$scope.total_indicadores= parse.total;
    	  		$scope.misindicadoresauto = parse.data;
    	  		$rootScope.$broadcast('ntLoadingEnd');
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          $rootScope.$broadcast('ntLoadingEnd');
    		  }
    	  );

}]);
appControllers.controller('AutoevaluacionController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" ,"$filter","autoevaluacionSvc", 
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, $filter,autoevaluacionSvc) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	$controller('BaseController', {$scope: $scope}); 
	$scope.periodo = '1';
	var userData = usersSvc.getUserData();
	
	$scope.saveProceso = function ()
	{
		$scope.$broadcast('show-errors-check-validity');
		if($scope.autoevaluacionform.$valid) 
		{
			$scope.$broadcast('show-errors-reset');
			 $rootScope.$broadcast('ntLoadingStart'); 
			 noty({text: 'Guardando información...', type: 'success',  timeout: app.notytimeout});
			 autoevaluacionSvc.registrarProceso(userData.cliid,$scope.autoevaluacionform)
			  .then(function(response) {
			  		noty({text: response.data, type: 'success',  timeout: app.notytimeout});
			  		return $location.path("/panelcontrol");
	        })
	        .catch(function(response) 
	        {
	          noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          $rootScope.$broadcast('ntLoadingEnd');
	        });
			
	  	}
	  	
	  	
	};


}]);

appControllers.controller('AutoevaluacionEvaluarWorkflowController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" ,"$filter","autoevaluacionSvc","$sce","$http","FileUploader","$cookies",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, $filter,autoevaluacionSvc,$sce,$http,FileUploader,$cookies) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	$controller('BaseController', {$scope: $scope}); 
	
	var userData = usersSvc.getUserData();
	var cliid = $routeParams.cliid;
	var cinid = $routeParams.cinid;
	$scope.inputsformula = [];
	$scope.infporcentual = 0;
	$scope.token = app._tk;
	$scope.totalsize = 0;
	//console.log(app._tk);
	$scope.addInput = function(nvar){
	  $scope.inputsformula.push({id:nvar,label:nvar});
	};
	$scope.calcularPorcentaje = function ()
	{
		
		var texto = $scope.textFormula;
		var formula = $scope.textFormula;
		//remplazamos operadores por ','
		texto = texto.match(/[a-zA-Z]+/gi,' ');
		$scope.variablesform = texto;
	
			angular.forEach(texto, function(value, key) {
				//if(key != 0)
					formula = formula.replace(value,jQuery('#text'+value).val());
			});
		var res = eval(formula);
		$scope.porcentaje = res;
		
	}
	$scope.parserFormula = function(string){
		var texto = string;
		//remplazamos operadores por ','
		texto = texto.match(/[a-zA-Z]+/gi,' ');
		$scope.variablesform = texto;
		//if($scope.porcentual){
			$scope.inputsformula = [];
			angular.forEach(texto, function(value, key) {
				//if(key != 0)
					$scope.addInput(value);	 		
			});
		//}
		
	};

	$scope.changeCheck = function(id)
 	{
 		var texto = $scope.textFormula;
		var res = 0;
		var string = $scope.variablevalues;

		var arrvalues = string.split('-');
		//remplazamos operadores por ','
		texto = texto.match(/[a-zA-Z]+/gi,' ');
		$scope.variablesform = texto;
	
			angular.forEach(texto, function(value, key) {
					if(jQuery('#check'+value).is(':checked'))
						res += parseInt(arrvalues[key]);
			});
		
		$scope.porcentaje = res;

 	};
 	$scope.evaluarIndi = function ()
 	{
 		
			var cinid = $routeParams.cinid;

			$scope.$broadcast('show-errors-reset');
			 $rootScope.$broadcast('ntLoadingStart'); 
			 noty({text: 'Guardando información...', type: 'success',  timeout: app.notytimeout});
			 console.log($scope.formFormulaEval.porcentaje);
			 autoevaluacionSvc.registrarEvalIndi(userData.cliid,cinid,$scope.formFormulaEval.porcentaje)
			  .then(function(response) {
			  	//console.log(response);
			  	//var d= JSON.parse(response);
		  		noty({text: response, type: 'success',  timeout: app.notytimeout});
		  		//console.log(d.idindicador);
		  		//console.log(d);
		  		//$scope.idindicador = d.idindicador;
		  		$rootScope.$broadcast('ntLoadingEnd');
		  		$scope.formuFormula = true;
  				$scope.formIndi = false;
  				//$scope.formsegimiento = true;
		  		
	        })
	        .catch(function(response) 
	        {
	          noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          $rootScope.$broadcast('ntLoadingEnd');
	        });
			
	  	
 	};

 	$scope.uploadFile = function (){
 		$rootScope.$broadcast('ntLoadingStart'); 
			 noty({text: 'Guardando documento...', type: 'success',  timeout: app.notytimeout});
			 autoevaluacionSvc.uploadFile(userData.cliid,cinid,$scope.formUpload)
			  .then(function(response) {
			  
		  	$rootScope.$broadcast('ntLoadingEnd');	
	        })
	        .catch(function(response) 
	        {
	          noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          $rootScope.$broadcast('ntLoadingEnd');
	        });
 	}
	autoevaluacionSvc.getInfoIndicador(cliid,cinid)
      .then(function(result) 
    		  {

    		  	var cinid = $routeParams.cinid;
    	  		var p = result.data;
    	  		var parse = JSON.parse(p);
    	  		console.log(parse);
    	  		if(!parse.completo){
    	  			$scope.formsegimiento = false;
    	  			$scope.evaluacionFormIndicador = true;
    	  			$scope.nomindicador = parse[0].cinnombre;
					$scope.claveindicador = parse[0].cinclave;
					$scope.tipoindicador = parse[0].cintipo;
					$scope.origen = parse[0].cinorigen;
					$scope.objetivo = parse[0].cinobjetivo;
					$scope.pertinencia = parse[0].cinpertinencia;
					$scope.periodicidad= parse[0].cinperiodicidad;
					$scope.dimension = parse[0].dimclave;
					$scope.planestudios = parse[0].cinplanestudios;
					$scope.textFormula = parse[0].infformula;
					$scope.textVariables = parse[0].infdefvariables;
					$scope.porcentaje = 0;
					$scope.infporcentual = parse[0].infporcentual;
					$scope.alfticket =$sce.trustAsResourceUrl('api/v1/autoevaluacion/evaluar/'+userData.cliid+'/indicador/'+cinid+'/upload');
					$scope.parserFormula(parse[0].infformula);
					$scope.variablevalues = parse[0].infvarvalue;
					$scope.scopecinid = cinid;

    	  		}
    	  		else{
    	  			$scope.formsegimiento = true;
    	  			$scope.evaluacionFormIndicador = false;
    	  		}
    	  		

    		  }, 
    		  function(error)
    		  {
			  		noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	         		$rootScope.$broadcast('ntLoadingEnd');
    		  }
    	  );

	  	var uploader = $scope.uploader2 = $scope.uploader = new FileUploader({
            url: 'api/v1/autoevaluacion/evaluar/'+userData.cliid+'/indicador/'+cinid+'/upload',
            headers : {
        		'_token':  $scope.token,
        		'X-XSRF-TOKEN': $cookies['XSRF-TOKEN']
    		},
    		removeFromQueue: function(item /*{File|FileLikeObject}*/){
    			
    		 	var index = this.getIndexOfItem(item);
                var item = this.queue[index];
                if (item.isUploading) item.cancel();
                this.queue.splice(index, 1);
                item._destroy();
	            this.progress = this._getTotalProgress();
	            $scope.totalsize -= item.file.size;
    		}
        });
	  
        // FILTERS

       	//uploader.filters.push({
        //    name: 'customFilter',
        //    fn: function(item /*{File|FileLikeObject}*/, options) {
        //        return this.queue.length < 3;
        //    }
        //});

        uploader.filters.push({
            name: 'sizeFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
            	if($scope.totalsize < 7340032)
            		$scope.totalsize += item.size;

                return $scope.totalsize < 7340032;
            }
        });
        uploader.filters.push({
            name: 'typeFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                return '|msword|vnd.openxmlformats-officedocument.wordprocessingml.document|pdf|vnd.ms-excel|vnd.openxmlformats-officedocument.spreadsheetml.sheet|'.indexOf(type) !== -1;
            }
        });

}]);

appControllers.controller('AutoevaluacionResultadoSegController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" ,"$filter","autoevaluacionSvc","$sce","$http","FileUploader","$cookies",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, $filter,autoevaluacionSvc,$sce,$http,FileUploader,$cookies) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	$controller('BaseController', {$scope: $scope}); 
	
	var userData = usersSvc.getUserData();
	var cliid = $routeParams.cliid;
	var cinid = $routeParams.cinid;
	$scope.totalsize = 0;
	$scope.token = app._tk;


	$scope.seguimientoIndi = function ()
 	{
 		
			var cinid = $routeParams.cinid;

			$scope.$broadcast('show-errors-reset');
			 $rootScope.$broadcast('ntLoadingStart'); 
			 noty({text: 'Guardando información...', type: 'success',  timeout: app.notytimeout});
			 
			 autoevaluacionSvc.registrarSeguimientoIndi(userData.cliid,cinid,$scope.indicadorsegForm)
			  .then(function(response) {
			  	//console.log(response);
			  	//var d= JSON.parse(response);
		  		noty({text: response, type: 'success',  timeout: app.notytimeout});
		  		//console.log(d.idindicador);
		  		//console.log(d);
		  		//$scope.idindicador = d.idindicador;
		  		$rootScope.$broadcast('ntLoadingEnd');
		  		$scope.formuFormula = true;
  				$scope.formIndi = false;
  				//$scope.formsegimiento = true;
		  		
	        })
	        .catch(function(response) 
	        {
	          noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          $rootScope.$broadcast('ntLoadingEnd');
	        });
			
	  	
 	};


	autoevaluacionSvc.getInfoIndicador(cliid,cinid)
      .then(function(result) 
    		  {

    		  	var cinid = $routeParams.cinid;
    	  		var p = result.data;
    	  		var parse = JSON.parse(p);
    	  		//console.log(parse);
    	  		if(parse.completo){
    	  			var datos = parse.data[0];
    	  			console.log(datos);
    	  			$scope.formsegimiento = true;
    	  			$scope.evaluacionFormIndicador = false;
    	  			$scope.nomindicador = datos.cinnombre;
					$scope.claveindicador = datos.cinclave;
					$scope.porcentaje = datos.eval_porcentaje;
					$scope.evalinid = datos.eval_id;
					//$scope.alfticket =$sce.trustAsResourceUrl('api/v1/autoevaluacion/evaluar/'+userData.cliid+'/indicador/'+cinid+'/upload');
					$scope.scopecinid = cinid;

    	  		}
    	  		
    	  		

    		  }, 
    		  function(error)
    		  {
			  		noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	         		$rootScope.$broadcast('ntLoadingEnd');
    		  }
    	  );

	  var uploader = $scope.uploader2 = $scope.uploader = new FileUploader({
            url: 'api/v1/seguimiento/'+userData.cliid+'/indicador/'+cinid+'/upload',
            headers : {
        		'_token':  $scope.token,
        		'X-XSRF-TOKEN': $cookies['XSRF-TOKEN']
    		},
    		removeFromQueue: function(item /*{File|FileLikeObject}*/){
    			
    		 	var index = this.getIndexOfItem(item);
                var item = this.queue[index];
                if (item.isUploading) item.cancel();
                this.queue.splice(index, 1);
                item._destroy();
	            this.progress = this._getTotalProgress();
	            $scope.totalsize -= item.file.size;
    		}
        });
	  
        // FILTERS

       	//uploader.filters.push({
        //    name: 'customFilter',
        //    fn: function(item /*{File|FileLikeObject}*/, options) {
        //        return this.queue.length < 3;
        //    }
        //});

        uploader.filters.push({
            name: 'sizeFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
            	if($scope.totalsize < 7340032)
            		$scope.totalsize += item.size;

                return $scope.totalsize < 7340032;
            }
        });
        uploader.filters.push({
            name: 'typeFilter',
            fn: function(item /*{File|FileLikeObject}*/, options) {
                var type = '|' + item.type.slice(item.type.lastIndexOf('/') + 1) + '|';
                return '|msword|vnd.openxmlformats-officedocument.wordprocessingml.document|pdf|vnd.ms-excel|vnd.openxmlformats-officedocument.spreadsheetml.sheet|'.indexOf(type) !== -1;
            }
        });

}]);






appControllers.controller('ListIsiAdminController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" , "autoevaluacionSvc","Excel","$timeout",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, autoevaluacionSvc,Excel,$timeout) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	var userData = usersSvc.getUserData();

	$scope.misisi = [];
	$controller('BaseController', {$scope: $scope}); 
	$rootScope.$broadcast('ntLoadingStart'); 
	noty({text: 'Cargando información...', type: 'success',  timeout: app.notytimeout});
	
	 autoevaluacionSvc.getIsis(userData.cliid)
      .then(function(result) 
    		  {
    	  		var p = result.data;
    	  		var parse = JSON.parse(p);
    	  
    	  		$scope.misisi = parse.data;
    	  		$rootScope.$broadcast('ntLoadingEnd');

    	  		
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          	$rootScope.$broadcast('ntLoadingEnd');	
    		  }
    	  );
      $scope.exportToExcel=function(tableId){ // ex: '#my-table'
              var exportHref=Excel.tableToExcel(tableId,'sheet name');
            $timeout(function(){location.href=exportHref;},100); // trigger download
      }
	
}]);

appControllers.controller('PerfilController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" , "autoevaluacionSvc","Excel","$timeout",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, autoevaluacionSvc,Excel,$timeout) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	var userData = usersSvc.getUserData();
	$controller('BaseController', {$scope: $scope}); 
	$rootScope.$broadcast('ntLoadingStart'); 
	noty({text: 'Cargando información...', type: 'success',  timeout: app.notytimeout});

	/*var loading_screen = pleaseWait({
	  backgroundColor: '#5E5E5F',
	  logo: 'img/escudo1.png',
	  loadingHtml: '<div class="sk-spinner sk-spinner-wave"><div class="sk-rect1"></div><div class="sk-rect2"></div><div class="sk-rect3"></div><div class="sk-rect4"></div><div class="sk-rect5"></div></div><div class="sk-spinner sk-spinner-wave"><div class="sk-rect1"></div><div class="sk-rect2"></div><div class="sk-rect3"></div><div class="sk-rect4"></div><div class="sk-rect5"></div></div>'
	});*/
	
	var loading;
	var cliisi = userData.cliid;
	$scope.plantel = {};
	$scope.nomuser = userData.clinombre + ' '+userData.cliapellidomaterno+ ' '+ userData.cliapellidopaterno;
	 autoevaluacionSvc.getIsiInfo(cliisi)
      .then(function(result) 
    		  {
    		  	loading = $scope.loading_screen();
    	  		var p = result[0];
    	  		$scope.plantel.nombre = p.ptl_nombre;
    	  		$scope.plantel.calle = p.ptl_calle;
    	  		$scope.plantel.ciudad = p.ptl_ciudad;
    	  		$scope.plantel.colonia = p.ptl_colonia;
    	  		$scope.plantel.cpostal = p.ptl_cpostal;
    	  		$scope.plantel.mail = p.ptl_email;
    	  		$scope.plantel.cvptl = p.ptl_ptl;
    	  		$scope.plantel.fax = p.ptl_fax;
    	  		$scope.plantel.nivel = p.ptl_nivel;
    	  		$scope.plantel.telefono = p.ptl_telefono;
    	  		$scope.plantel.dirgral = p.ptl_dirgral;
    	  		$scope.plantel.delegacion = p.ptl_delegacion;
    	  		
    	  		console.log($scope.plantel);
    	  		console.log(p);

    	  		$rootScope.$broadcast('ntLoadingEnd');
    	  		loading.finish();

    	  		
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          	$rootScope.$broadcast('ntLoadingEnd');	
	          	loading.finish();
    		  }
    	  );
     
	
}]);


appControllers.controller('GrupoController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" , "autoevaluacionSvc","Excel","$timeout","planestudiosSvc",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, autoevaluacionSvc,Excel,$timeout,planestudiosSvc) 
{
   
	if(!$auth.isAuthenticated()) 
		return $location.path("/");
	
	var userData = usersSvc.getUserData();
	$controller('BaseController', {$scope: $scope}); 
	$scope.planisi = [];
	$scope.group = {};
	$scope.group.gnombre = '';
	$scope.group.gdescripcion = '';
	$scope.group.gclaveisi = [];
	var arr= [];
	$rootScope.$broadcast('ntLoadingStart'); 
	noty({text: 'Cargando información...', type: 'success',  timeout: app.notytimeout});
	$rootScope.$broadcast('ntLoadingEnd');
	planestudiosSvc.getPlanes()
        .then(function(result) 
              {

                angular.forEach(result,function(v){                 
                    this.push(v.descplanestudio); 
                },arr);  
             
                $scope.planisi = arr;
                $rootScope.$broadcast('ntLoadingEnd');
              }, 
              function(error)
              {
                noty({text: "Ha ocurrido un error al cargar los datos", type: 'error',  timeout: app.notytimeout});            
              }
          );
	$scope.agregarIsiPlan = function (planestudios)
	{
		var string = planestudios.split('-');
		var plan = string[0]+'-'+string[1];
		var flag = $scope.group.gclaveisi.indexOf(plan) > -1;
		console.log(flag);
		if(flag == true)
			alert('Ya existe un planestudios');
		else
			$scope.group.gclaveisi.push(plan);
			
	};

	$scope.savegroup = function(groupnewForm){      
		//if($scope.group.gclaveisi.length == 0){
		//	alert('Se necesita agregar una clave.');
		//}
		//else{
			noty({text: "Guardando información del usuario!....", type: 'success',  timeout: app.notytimeout});            
	        usersSvc.savenewgroup($scope.group)
	        .then(function(result)
	            {                
	                noty({text: result.data, type: 'success',  timeout: app.notytimeout});            
					$scope.group = {};
					$scope.group.gnombre = '';
					$scope.group.gdescripcion = '';
					$scope.group.gclaveisi = [];
	            },
	            function(error)
	            {               
	                if(error.data.msg)                    
	                    noty({text: error.msg, type: 'error',  timeout: app.notytimeout});            
	                else
	                    noty({text: "Ha ocurrido un error al guardar la información del usuario", type: 'error',  timeout: app.notytimeout});            
	            }); 	
		//}
        
    }
}]);


appControllers.controller('GruposController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" , "autoevaluacionSvc","Excel","$timeout",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, autoevaluacionSvc,Excel,$timeout) 
{
   
	if(!$auth.isAuthenticated())
    	return $location.path("/");   
    /*
    	Los datos de abajo siempre deben de ser incluídos en el controller
    */
    // Heredamos los datos del header y footer y userData  
    $controller('BaseController', {$scope: $scope}); //This works    
	var boton_on = 'btn waves-effect waves-light cyan darken-2';
	var boton_off = 'btn disabled';
	$scope.bclass = boton_on;
	$scope.ifshow= true;    
	$scope.users = {};
	$scope.disabledelete='';
	$scope.deleting=false;
	$scope.deletemsg='';
	$scope.grouptodelete={};
	$scope.paginationdata={};
	$scope.orderfield = 'gid';
	$scope.orderdesc = 'asc';
	$scope.q="";


	$scope.getGroups=function(){
	    var q = $scope.q;                                   
	    var nextpage = $scope.paginationdata.current_page;
	    var loading = $scope.loading_screen();
	    noty({text: 'Recuperando información...', type: 'success',  timeout: app.notytimeout});    
	    usersSvc.searchGroups(q,nextpage,$scope.orderfield,$scope.orderdesc)
	    .then(
	        function(result)
	        {
	            $scope.paginationdata = result.data;
	            $scope.groups = [];
	            angular.forEach(result.data.data,function(v,k){                 
	                $scope.groups.push(v);                 
	            });  
	            loading.finish();
	            
	        },function(error)
	        {
	            $scope.msg = 'Error al recuperar la información';
	            noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
	            return false;
	        }
	    );
	}

	$scope.getSearch = function()
	{
	    $scope.orderfield = 'gid';
	    $scope.orderdesc = 'asc';
	    $scope.paginationdata.current_page=1;
	    $scope.getGroups();

	}

	$scope.deleteuserWait=function(group)
	{
	    var nombre="";
	    
	    nombre = group.gnombre;
	    
	    $scope.deletemsg="¿Deseas eliminar a el usuario: "+nombre+' ?';
	    $scope.grouptodelete= group;
	    angular.element('#modalconfirmdelete').modal();     
	}

	$scope.deleteuser=function()
	{
	    angular.element('#modalconfirmdelete').modal('hide');
	    var group = $scope.grouptodelete;    
	    noty({text: 'Eliminando usuario...', type: 'success',  timeout: app.notytimeout});    
	    usersSvc.deleteGroup(group.gid)
	    .then(function(result)
	        {            
	            noty({text: 'Usuario eliminado', type: 'success',  timeout: app.notytimeout});    
	            $scope.users.splice($scope.users.indexOf(group),1);
	            $scope.grouptodelete={};
	            $scope.deletemsg="";
	        },
	        function(error)
	        {               
	            if(error.data.msg)
	                noty({text: error.data.msg, type: 'success',  timeout: app.notytimeout});                    
	            else
	                noty({text: "Ha ocurrido un error al eliminar a el usuario", type: 'success',  timeout: app.notytimeout});                    

	            $scope.grouptodelete={};
	            $scope.deletemsg="";
	        });
	}

	$scope.cancelDelete=function()
	{
	    $scope.grouptodelete={};
	    $scope.deletemsg="";
	    angular.element('#modalconfirmdelete').modal('hide');        
	}

	$scope.changePage = function(page)
	    {
	        $scope.paginationdata.current_page = page;
	        $scope.getGroups();
	    };

	$scope.doOrder = function(orderfield,orderdesc)
	{
	    $scope.orderfield = orderfield;
	    $scope.orderdesc = orderdesc;
	    $scope.paginationdata.current_page=1;
	    $scope.getGroups();
	}


	$scope.getSearch();
		
     	
     	
	 
	
}]);

appControllers.controller('InfoIsiController', ["$routeParams", "$auth", "$controller", 
                                              "$rootScope", "$scope", "$location", "$window", "$sanitize", "usersSvc", "indicadorSvc" , "autoevaluacionSvc","Excel","$timeout",
function ($routeParams, $auth, $controller, $rootScope, $scope, $location, $window, $sanitize, usersSvc, indicadorSvc, autoevaluacionSvc,Excel,$timeout) 
{
   
	 if(!$auth.isAuthenticated())
    	return $location.path("/");   
    /*
    	Los datos de abajo siempre deben de ser incluídos en el controller
    */
    // Heredamos los datos del header y footer y userData  
    $controller('BaseController', {$scope: $scope}); //This works    
    var userData = usersSvc.getUserData();

	var boton_on = 'btn waves-effect waves-light cyan darken-2';
	var boton_off = 'btn disabled';
	$scope.bclass = boton_on;
	$scope.ifshow= true;    
	$scope.users = {};
	$scope.disabledelete='';
	$scope.deleting=false;
	$scope.deletemsg='';
	$scope.usertodelete={};
	$scope.paginationdata={};
	$scope.orderfield = 'cliusername';
	$scope.orderdesc = 'desc';
	$scope.q="";
	$scope.useraccess = {};
	$scope.allacess = {};


	$scope.getUsers=function(){
	    var q = $scope.q;                                   
	    var nextpage = $scope.paginationdata.current_page;
	    noty({text: 'Recuperando información...', type: 'success',  timeout: app.notytimeout});    
	    autoevaluacionSvc.getIsis(userData.cliid)
      	.then(function(result) 
    		  {
    	  		var p = result.data;
    	  		var parse = JSON.parse(p);
    	  
    	  		//$scope.misisi = parse.data;
    	  		$scope.paginationdata = parse;
	            $scope.users = [];
	            angular.forEach(parse.data,function(v,k){                 
	            	var clave = v.cliusername.split("-");
	            	v.clave = clave[0];
	                $scope.users.push(v);                 
	            });
    	  		$rootScope.$broadcast('ntLoadingEnd');
				console.log($scope.paginationdata);
    	  		
    		  }, 
    		  function(error)
    		  {
			  	noty({text: response.data.msg, type: 'error',  timeout: app.notytimeout});
	          	$rootScope.$broadcast('ntLoadingEnd');	
    		  }
    	 );
	   /* usersSvc.searchUsers(q,nextpage,$scope.orderfield,$scope.orderdesc)
	    .then(
	        function(result)
	        {
	            $scope.paginationdata = result.data;
	            $scope.users = [];
	            angular.forEach(result.data.data,function(v,k){                 
	                $scope.users.push(v);                 
	            });  
	            console.log($scope.paginationdata);
	            
	        },function(error)
	        {
	            $scope.msg = 'Error al recuperar la información';
	            noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
	            return false;
	        }
	    );*/
	}

	$scope.getSearch = function()
	{
	    /*$scope.total = 0;
	    $scope.currentPage = '';
	    $scope.hasMorePages = false;
	    $scope.perPage = false;*/
	    $scope.orderfield = 'cliusername';
	    $scope.orderdesc = 'asc';
	    $scope.paginationdata.current_page=1;
	    

	    $scope.getUsers();
	}

	
	$scope.changePage = function(page)
	    {
	        $scope.paginationdata.current_page = page;
	        $scope.getUsers();
	    };

	$scope.doOrder = function(orderfield,orderdesc)
	{
	    $scope.orderfield = orderfield;
	    $scope.orderdesc = orderdesc;
	    $scope.paginationdata.current_page=1;
	    $scope.getUsers();
	}

	$scope.getSearch();
			
     	

}]);


appControllers.controller('MenuController', ["$controller", "$scope", "$rootScope", "$location", "$window", "$auth", "usersSvc","$filter", 
 function ( $controller, $scope, $rootScope, $location, $window, $auth, usersSvc,$filter) 
 {	
 	
 	var userData = usersSvc.getUserData();
 	$scope.username = '';
 	if(userData)
 		$scope.username = userData.clinombre+' '+userData.cliapellidopaterno+' '+userData.cliapellidomaterno;
 	
 	// Heredamos los datos del header y footer y userData  
 	$controller('BaseController', {$scope: $scope}); //This works
 	
 	/*
 		Termina include
 	*/
 	
  	$scope.$auth = $auth;
 	

 	$scope.hasAccess = function(access)
 	{
 		
 		var perm = $filter('filter')(userData.accesos,{accid:access},true);
        
        return perm.length?true:false;
    	
 	};

 	$scope.isAuthenticated = function ()
 	{
 		return $auth.isAuthenticated();
 	}; 	

 	$scope.$on('menu:updated', function(event,data) 
    {
		console.log('setmenuoptions');
    	setMenuOptions();
    });

 	

 	var setMenuOptions = function()
 	{
 		$scope.isadmin = false;
 		
 		if($auth.isAuthenticated())
 		{
 			userData = usersSvc.getUserData();
 			
 		}
 		
 	}


 
 	
}]);