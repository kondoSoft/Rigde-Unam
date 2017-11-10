appControllers.controller('UsuariosController', ["$timeout", "$controller", "$scope", "$location", "$routeParams", "$auth", "usersSvc","$filter", 
function ($timeout, $controller, $scope, $location, $routeParams, $auth, usersSvc,$filter) 
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
$scope.usertodelete={};
$scope.paginationdata={};
$scope.orderfield = 'cliusername';
$scope.orderdesc = 'desc';
$scope.q="";
$scope.useraccess = {};
$scope.allacess = {};
//console.log(usersinfo);


$scope.getUsers=function(){
    var q = $scope.q;                                   
    var nextpage = $scope.paginationdata.current_page;
    noty({text: 'Recuperando información...', type: 'success',  timeout: app.notytimeout});    
    usersSvc.searchUsers(q,nextpage,$scope.orderfield,$scope.orderdesc)
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
    $scope.orderfield = 'cliapellidopaterno';
    $scope.orderdesc = 'asc';
    $scope.paginationdata.current_page=1;
    

    $scope.getUsers();
}

$scope.deleteuserWait=function(user)
{
    var nombrecli="";
    
    nombrecli = user.clinombre+' '+user.cliapellidopaterno+' '+user.cliapellidomaterno+' ('+user.climail+')';
    
    $scope.deletemsg="¿Deseas eliminar a el usuario: "+nombrecli+' ?';
    $scope.usertodelete= user;
    angular.element('#modalconfirmdelete').modal();     
}

$scope.deleteuser=function()
{
    angular.element('#modalconfirmdelete').modal('hide');
    var user = $scope.usertodelete;    
    noty({text: 'Eliminando usuario...', type: 'success',  timeout: app.notytimeout});    
    usersSvc.deleteUser(user.cliid)
    .then(function(result)
        {            
            noty({text: 'Usuario eliminado', type: 'success',  timeout: app.notytimeout});    
            $scope.users.splice($scope.users.indexOf(user),1);
            $scope.usertodelete={};
            $scope.deletemsg="";
        },
        function(error)
        {               
            if(error.data.msg)
                noty({text: error.data.msg, type: 'success',  timeout: app.notytimeout});                    
            else
                noty({text: "Ha ocurrido un error al eliminar a el usuario", type: 'success',  timeout: app.notytimeout});                    

            $scope.usertodelete={};
            $scope.deletemsg="";
        });
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
        $scope.getUsers();
    };

$scope.doOrder = function(orderfield,orderdesc)
{
    $scope.orderfield = orderfield;
    $scope.orderdesc = orderdesc;
    $scope.paginationdata.current_page=1;
    $scope.getUsers();
}


/*grupos*/


$scope.asignarGrupo = function(user)
{   
    $scope.useraccess = user;    
    
    noty({text: 'Cargando accesos...', type: 'success',  timeout: app.notytimeout});    
   
    angular.element('#modalgroupuser').modal();
    
    $scope.addbutton = true;
    $scope.delbutton = false;
    usersSvc.getUserGroup(user.cliid)
    .then(function(result)
    {
        var djson = JSON.parse(result.data);
        if(djson.length == 0)
        {
            $scope.addbutton = true;
            $scope.delbutton = false;
        }
        else
        {
            $scope.addbutton = false;
            $scope.delbutton = true;
            angular.forEach(djson, function (k, index) {
               console.log(k.guid);
               jQuery('#idgroup').val(k.guidgrupo);
               $scope.isisclave=k.gclaveisi;
            });
            
        }
    },
    function(error)
    {               
            noty({text: "Ha ocurrido un error", type: 'error',  timeout: app.notytimeout});                

        $scope.useraccess={};
        
    });

    $scope.saveGrupo = function()
    {
        var idgroup = jQuery('#idgroup').val();
        usersSvc.setUserGroup(user.cliid,idgroup)
            .then(function(result)
            {
               console.log(result);
            },
            function(error)
            {               
                noty({text: "Ha ocurrido un error al guardar", type: 'error',  timeout: app.notytimeout});                
                $scope.useraccess={};
                
            });

    };
    
}


$scope.asignarAccesos = function(user)
{   
    $scope.useraccess = user;    
    
    noty({text: 'Cargando accesos...', type: 'success',  timeout: app.notytimeout});    
    usersSvc.getUserAccess(user.cliid)
    .then(function(result)
    {
        $scope.useraccess.useracces = result.data.permisosusuario;
        $scope.allacess = result.data.todoslospermisos;        
        angular.element('#modalaccessuser').modal();
    },
    function(error)
    {               
        if(error.data.msg)
            noty({text: error.data.msg, type: 'error',  timeout: app.notytimeout});                
        else
            noty({text: "Ha ocurrido un error al cargar la lista de accesos", type: 'error',  timeout: app.notytimeout});                

        $scope.useraccess={};
        
    });

   $scope.hasPermiso = function(access)
   {
        var perm = $filter('filter')($scope.useraccess.useracces,{accid:access},true);
        
        return perm.length?true:false;
   }

   $scope.updateAccess = function(event,access)
   {        
        noty({text: "Actualizando acceso...", type: 'success',  timeout: app.notytimeout});           
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
                noty({text: error.data.msg, type: 'error',  timeout: app.notytimeout});                    
            else
                noty({text: "Ha ocurrido un error al asignar/eliminar el permiso", type: 'error',  timeout: app.notytimeout});                                    
        });
   }
    
}

$scope.getSearch();
		
     	
     	
}]);

appControllers.controller('UsuarioController', ["$timeout", "$controller", "$scope", "$location", "$routeParams", "$auth", "usersSvc", "cliinfo","planestudiosSvc","$modal","indicadorSvc",
function ($timeout, $controller, $scope, $location, $routeParams, $auth, usersSvc,cliinfo,planestudiosSvc,$modal,indicadorSvc) 
{   
    /*
        Los datos de abajo siempre deben de ser incluídos en el controller
    */
    var userData = usersSvc.getUserData();
    // Heredamos los datos del header y footer y userData  
    $controller('BaseController', {$scope: $scope}); //This works 
    $scope.cblass = '';     
    $scope.user = {};
    $scope.user.cliid="";
    $scope.user.clinombre="";
    $scope.user.cliapellidopaterno="";
    $scope.user.cliapellidomaterno="";     
    $scope.user.climail="";    
    $scope.user.clicontrasenarepeat="";
    $scope.user.cliplan = "";
    $scope.user.clitipo = 1;
    $scope.user.cliusername = ""; 
    var arr = [];
    noty({text: 'Cargando información!....', type: 'success',  timeout: app.notytimeout});            
    planestudiosSvc.getPlanes()
        .then(function(result) 
              {

                angular.forEach(result,function(v){                 
                    this.push(v.descplanestudio); 
                },arr);  
             
                $scope.planisi = arr;
              }, 
              function(error)
              {
                noty({text: "Ha ocurrido un error al cargar los datos", type: 'error',  timeout: app.notytimeout});            
              }
          );


    if(cliinfo)
    {       
        $scope.cblass = 'active'; 
        $scope.user = cliinfo.data;        
    } 

    $scope.user.clicontrasena="";

    $scope.saveuser=function(userForm){      
        var struser = ($scope.user.clitipousuario == 1)? $scope.user.climail: $scope.user.cliusername;
        $scope.user.cliusername = struser;

        noty({text: 'Guardando información del usuario!....', type: 'success',  timeout: app.notytimeout});            
        usersSvc.saveuser($scope.user)
        .then(function(result)
            {                
                noty({text: 'Usuario guardado con exito!', type: 'success',  timeout: app.notytimeout});            
                $scope.user = result.data;  
                $scope.user.clicontrasena = "";
                $scope.clicontrasenarepeat="";              
            },
            function(error)
            {               
                if(error.data.msg)                    
                    noty({text: error.msg, type: 'error',  timeout: app.notytimeout});            
                else
                    noty({text: "Ha ocurrido un error al guardar la información del usuario", type: 'error',  timeout: app.notytimeout});            
                    
            }); 
    }        

    $scope.savenewuser=function(userForm){      
        var planstr = '';
        var userplan = '';
        /*
        comparamos el tipo de usuario si es mussi el nombre de usuario
        sera su correo, si es ISI sera clave_isi-clave_plan
        */
        $scope.user.clitipo = userForm.tipo.$viewValue;
        if(userForm.tipo.$viewValue == 2)
        {
             /*Separamos la cadena  clave_isi-clave_plan-descipcion
            solo tomamos clave_isi-clave_plan
            sera el nombre de usuario para una ISI
            */
            planstr = userForm.plan.$viewValue;
            var arrplan = planstr.split('-');
            userplan = arrplan[0]+'-'+arrplan[1];
        }
        var struser = (userForm.tipo.$viewValue == 1)? $scope.user.climail: userplan;
        $scope.user.cliusername = struser;

        noty({text: "Guardando información del usuario!....", type: 'success',  timeout: app.notytimeout});            
        usersSvc.savenewuser($scope.user)
        .then(function(result)
            {                
                noty({text: "Usuario guardado con exito!", type: 'success',  timeout: app.notytimeout});            
                //$scope.user = result.data;  
                $scope.user = {};  
                $scope.user.clicontrasena = "";
                $scope.clicontrasenarepeat="";              
            },
            function(error)
            {               
                if(error.data.msg)                    
                    noty({text: error.msg, type: 'error',  timeout: app.notytimeout});            
                else
                    noty({text: "Ha ocurrido un error al guardar la información del usuario", type: 'error',  timeout: app.notytimeout});            
            }); 
    }

    //Validador de password
    $scope.passwordValidator = function(password,required) 
    {        
        var required = typeof required == "undefined"?false:true;
        if (!password && !required) 
        {
            return true;
        }
        else if (password.length < 8) 
        {
            return "La contraseña debe contener al menos " + 8 + " caracteres";
        }
        else if (!password.match(/[A-Z]/)) 
        {
            return "La contraseña debe tener al menos una letra mayúscula";
        }
        else if (!password.match(/[0-9]/)) 
        {
            return "La contraseña debe contener al menos un número";
        }
 
        return true;
    };

    $scope.passrepeat = function()
    {        
        if(!$scope.user.clicontrasena)
        {
            return true;
        }
        else if($scope.user.clicontrasena != $scope.clicontrasenarepeat)
            return false;

        return true;
    }

    $scope.searchIndiUser = function()
    {
        var usercliid = $routeParams.cliid;
        $scope.paginationdata = {};
        $scope.orderfield = 'cinclave';
        $scope.orderdesc = 'asc';
        $scope.q = "";
        var q = $scope.q;                                   
        var nextpage = $scope.paginationdata.current_page;
       indicadorSvc.listIndicadorUsuario(q,nextpage,$scope.orderfield,$scope.orderdesc,usercliid)
        .then(
            function(result)
            {
                var jsondata = JSON.parse(result.data);
                $scope.paginationdata = jsondata;
                $scope.misindicadores = [];
                angular.forEach(jsondata.data,function(v,k){                 
                    $scope.misindicadores.push(v);                 
                });  
                //$rootScope.$broadcast('ntLoadingEnd');
                
            },function(error)
            {
                $scope.msg = 'Error al recuperar la información';
                noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
                return false;
            }
        );
    }
    $scope.updateIndiUser = function(uiid,cinid,uicalificar)
    {
        var usercliid = $routeParams.cliid;
        var id = (uiid == null)? 0: uiid;
        indicadorSvc.updateIndicadorUsuario(id,cinid,uicalificar,usercliid)
        .then(
            function(result)
            {
                $scope.searchIndiUser();
                
            },function(error)
            {
                $scope.msg = 'Error al recuperar la información';
                noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
                return false;
            }
        );
    };

 

    $scope.paginationdatagroup={};
    $scope.q="";
    $scope.getlistUserGroup = function(){
        var q = $scope.q;                                   
        var nextpage = $scope.paginationdatagroup.current_page;
        var usercliid = $routeParams.cliid;
        noty({text: 'Recuperando información...', type: 'success',  timeout: app.notytimeout});    
        usersSvc.listGroupsUser(q,nextpage,'gid','asc',usercliid)
        .then(
            function(result)
            {
                $scope.paginationdatagroup = result.data;
                $scope.groups = [];
                angular.forEach(result.data.data,function(v,k){                 
                    $scope.groups.push(v);                 
                });  
                
            },function(error)
            {
                $scope.msg = 'Error al recuperar la información';
                noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
                return false;
            }
        );
    }

    $scope.listUserGrupo = function()
    {
        $scope.paginationdatagroup.current_page=1;
        $scope.getlistUserGroup();
    }

    $scope.changePage = function(page)
    {
        $scope.paginationdatagroup.current_page = page;
        $scope.getlistUserGroup();
    };

    // Show a basic modal from a controller
    var myModal = $modal({scope: $scope, template: 'js/app/templates/modal.listindiuser.tpl.html', show: false});
    var myModalGroup = $modal({scope: $scope, template: 'js/app/templates/modal.group.tpl.html', show: false});
    $scope.showModal = function() 
    {
        $scope.searchIndiUser();
        myModal.$promise.then(myModal.show);
    };
    $scope.showModalGroup = function()
    {
        $scope.listUserGrupo();
        myModalGroup.$promise.then(myModalGroup.show);
    };


    $scope.updateUsuaroGrupo = function(guid,gid)
    {
        var usercliid = $routeParams.cliid;
        var idug = (guid == null)? 0: guid;
        indicadorSvc.updateGrupoUsuario(idug,gid,usercliid)
        .then(
            function(result)
            {
                $scope.listUserGrupo();
                
            },function(error)
            {
                $scope.msg = 'Error al recuperar la información';
                noty({text: $scope.msg, type: 'error',  timeout: app.notytimeout});    
                return false;
            }
        );
    };
}]);

appControllers.controller('GrupoUsuarioController', ["$timeout", "$controller", "$scope", "$location", "$routeParams", "$auth", "usersSvc", "cliinfo","planestudiosSvc","$modal","indicadorSvc",
function ($timeout, $controller, $scope, $location, $routeParams, $auth, usersSvc,cliinfo,planestudiosSvc,$modal,indicadorSvc) 
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
    
  

 

}]);