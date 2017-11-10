appControllers.controller('SeguimientoController', ["$timeout", "$controller", "$scope", "$location", "$routeParams", "$auth", "usersSvc","$filter", "seguimientoSvc",
function ($timeout, $controller, $scope, $location, $routeParams, $auth, usersSvc,$filter,seguimientoSvc) 
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

    $scope.nivelOptions = [
    {id:'',name:'Selecciona un nivel'},
    {id:'L',name:'Licenciatura'},
    {id:'P',name:'Preparatoria'},
    {id:'C',name:'CCH'}
    ];

    $scope.autoevaluacionOptions = [
    {id:0,name:'Selecciona una autoevaluación'},
    {id:1,name:'2015 - 2016'},
    {id:2,name:'2016 - 2017'},
    {id:3,name:'2017 - 2018'},
    {id:4,name:'2018 - 2019'}
    ];

    $scope.bclass = boton_on;
    $scope.ifshow= true;    
    $scope.users = {};
    $scope.paginationdata={};
    $scope.orderfield = 'cliusername';
    $scope.orderdesc = 'desc';
    $scope.q="";
    $scope.nivel='';
    $scope.autoevaluacion=0;

//console.log(usersinfo);


    $scope.getSeguimiento=function(){
        var q = $scope.q;         
        var nivel = $scope.nivel;
        var clave = $scope.clave;
        var autoevaluacion = $scope.autoevaluacion;

        var nextpage = $scope.paginationdata.current_page;
        noty({text: 'Recuperando información...', type: 'success',  timeout: app.notytimeout});    
        seguimientoSvc.getListSeguimiento(clave,nivel,autoevaluacion,nextpage,$scope.orderfield,$scope.orderdesc)
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
        );
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
        

        $scope.getSeguimiento();
    }

    $scope.changePage = function(page)
    {
        $scope.paginationdata.current_page = page;
        $scope.getSeguimiento();
    };

    $scope.getSearch();
            
            
        
}]);