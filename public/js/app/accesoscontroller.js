appControllers.controller('AccesosController', ["$upload", "$timeout", "notify", "$controller", "$scope", "$location", "$routeParams", "$auth", "accesosSvc","$filter", 
function ($upload, $timeout, notify, $controller, $scope, $location, $routeParams, $auth, accesosSvc,$filter) 
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
$scope.disabledelete='';
$scope.deleting=false;
$scope.deletemsg='';
$scope.accesstodelete={};
$scope.accesstoedit={};
$scope.paginationdata={};
$scope.orderfield = 'accnombre';
$scope.orderdesc = 'asc';
$scope.q="";
$scope.newaccesid = "";
$scope.accesos = {};
//console.log(usersinfo);


$scope.getAccesos=function(){
    var q = $scope.q;                                   
    var nextpage = $scope.paginationdata.current_page;
    notify({ message: 'Recuperando información...', templateUrl: app.notifyTemplateUrl, duration: app.notytimeout});
    accesosSvc.searchAccesos(q,nextpage,$scope.orderfield,$scope.orderdesc)
    .then(
        function(result)
        {
            $scope.paginationdata = result.data;
            $scope.accesos = [];
            angular.forEach(result.data.data,function(v,k){                 
                $scope.accesos.push(v);                 
            });              
            
        },function(error)
        {
            $scope.msg = 'Error al recuperar la información (' + error + ')';
            notify({ message: 'Error el recuperar la información', templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
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
    $scope.orderfield = 'accnombre';
    $scope.orderdesc = 'asc';
    $scope.paginationdata.current_page=1;
    

    $scope.getAccesos();
}

$scope.addAccess = function()
{
    $scope.newaccesid = "";
    angular.element('#modaladd').openModal();     
}

$scope.submitFormaccess = function(form)
{
    angular.element('#'+form).submit();
}

$scope.saveaccess = function(accessForm)
{
    notify({ message: "Guardando acceso!....", templateUrl: app.notifyTemplateUrl, duration: app.notytimeout,className:'error'});       
    accesosSvc.saveacceso($scope.newaccesid)
    .then(function(result)
        {
            notify({ message: "Acceso guardado con exito!", templateUrl: app.notifyTemplateUrl, duration: app.notytimeout,className:'error'});                            
            $scope.newaccesid="";   
            $scope.getSearch(); 
            angular.element('#modaladd').closeModal();               
        },
        function(error)
        {     
            $scope.newaccesid="";
            if(error.msg)
                notify({ message: error.msg, templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
            else
                notify({ message: "Ha ocurrido un error al guardar el acceso", templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
        });     
}

$scope.updateaccess = function(accessForm)
{
    notify({ message: "Actualizando acceso!....", templateUrl: app.notifyTemplateUrl, duration: app.notytimeout,className:'error'});       
    accesosSvc.updateacceso($scope.accesstoedit)
    .then(function(result)
        {
            notify({ message: "Acceso actualizado con exito!", templateUrl: app.notifyTemplateUrl, duration: app.notytimeout,className:'error'});                            
            $scope.accesstoedit="";   
            $scope.getSearch(); 
            angular.element('#modalaedit').closeModal();               
        },
        function(error)
        {   
            if(error.msg)
                notify({ message: error.msg, templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
            else
                notify({ message: "Ha ocurrido un error al guardar el acceso", templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
        });     
}

$scope.updateaccessWait=function(access)
{   
    $scope.accesstoedit= access;
    
    angular.element('#modalaedit').openModal();     
}

$scope.deleteaccessWait=function(access)
{
    var nombrecli="";
    
    nombrecli = access.accnombre;
    
    $scope.deletemsg="¿Deseas eliminar este acceso: "+nombrecli+' ?';
    $scope.accesstodelete= access;
    angular.element('#modalconfirmdelete').openModal();     
}

$scope.deleteaccess=function()
{
    angular.element('#modalconfirmdelete').closeModal();
    var access = $scope.accesstodelete;
    notify({ message: "Eliminando acceso...", templateUrl: app.notifyTemplateUrl, duration: app.notytimeout});
    accesosSvc.deleteAccesso(access.accid)
    .then(function(result)
        {
            notify({ message: "Acceso eliminado", templateUrl: app.notifyTemplateUrl, duration: app.notytimeout});
            $scope.accesos.splice($scope.accesos.indexOf(access),1);
            $scope.accesstodelete={};
            $scope.deletemsg="";
        },
        function(error)
        {               
            if(error.msg)
                notify({ message: error.msg, templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
            else
                notify({ message: "Ha ocurrido un error al eliminar el acceso", templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});

            $scope.accesstodelete={};
            $scope.deletemsg="";
        });
}

$scope.cancelDelete=function()
{
    $scope.usertodelete={};
    $scope.deletemsg="";
    angular.element('#modalconfirmdelete').closeModal();        
}

$scope.changePage = function(page)
    {
        $scope.paginationdata.current_page = page;
        $scope.getAccesos();
    };

$scope.doOrder = function(orderfield,orderdesc)
{
    $scope.orderfield = orderfield;
    $scope.orderdesc = orderdesc;
    $scope.paginationdata.current_page=1;
    $scope.getAccesos();
}

$scope.asignarAccesos = function(user)
{   
    $scope.useraccess = user;    

    notify({ message: "Cargando accesos...", templateUrl: app.notifyTemplateUrl, duration: app.notytimeout});
    usersSvc.getUserAccess(user.cliid)
    .then(function(result)
    {
        $scope.useraccess.useracces = result.data.permisosusuario;
        $scope.allacess = result.data.todoslospermisos;        
        angular.element('#modalaccessuser').openModal();
    },
    function(error)
    {               
        if(error.data.msg)
            notify({ message: error.data.msg, templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
        else
            notify({ message: "Ha ocurrido un error al cargar la lista de accesos", templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});

        $scope.useraccess={};
        
    });

   $scope.hasPermiso = function(access)
   {
        var perm = $filter('filter')($scope.useraccess.useracces,{accid:access},true);
        
        return perm.length?true:false;
   }

   $scope.updateAccess = function(event,access)
   {        
       notify({ message: "Actualizando acceso...", templateUrl: app.notifyTemplateUrl, duration: app.notytimeout});
       angular.element('.accessfield').attr('disabled','');
        usersSvc.updateAccess($scope.useraccess.cliid,access,event.currentTarget.checked?true:false)
        .then(function(result)
        {
            angular.element('.accessfield').removeAttr('disabled');
        },
        function(error)
        {         
            angular.element('.accessfield').removeAttr('disabled');      
            if(error.data.msg)
                notify({ message: error.data.msg, templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
            else
                notify({ message: "Ha ocurrido un error al asignar/eliminar el permiso", templateUrl: app.notifyErrorTemplateUrl, duration: app.notytimeout});
        });
   }
    
}

$scope.getSearch();
		
     	
     	
}]);

