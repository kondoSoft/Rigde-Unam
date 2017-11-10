'use strict';

var appServices = angular.module('appServices', []);
	
appServices.factory('usersSvc',  ['$http','$resource', '$rootScope', '$window', '$q', '$auth', function ($http, $resource, $rootScope, $window, $q, $auth)
{
    var urlForgot = app.apiUrlBase.forgot;
    var urlCheckForgotCode = app.apiUrlBase.checkforgotcode;
    var urlResetPw = app.apiUrlBase.urlResetPw;
    var urlUserProfile = app.apiUrlBase.updateUser;
    var urlMe = app.apiUrlBase.me;
    
    var userData = null;
    
    function setUserGroup(iduser,idgrupo)
    {
        var save = 'api/v1/users/'+iduser+'/group';
        var deferred = $q.defer();                
        $http.post(save,{idgrupo:idgrupo})
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;
    }
    function getUserGroup(iduser)
    {
        var ulrgetgrupo = 'api/v1/users/'+iduser+'/group/';
        

        var deferred = $q.defer();
        $http.get(ulrgetgrupo,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

        return deferred.promise;   
    }

    function listGroupsUser(q,nextpage,orderfield,orderdesc,cliid)
    {
        var q = q;
        var search = 'api/v1/groups/user/'+cliid+'?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
        if(q)
          search = 'api/v1/groups/user/'+cliid+'?page='+nextpage+'&q='+q+'&orderfield='+orderfield+'&orderdesc='+orderdesc;

        var deferred = $q.defer();
        $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

        return deferred.promise;   
    }

    function searchGroups(q,nextpage,orderfield,orderdesc)
    {
        var q = q;
        var search = 'api/v1/groups?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
        if(q)
          search = 'api/v1/groups?page='+nextpage+'&q='+q+'&orderfield='+orderfield+'&orderdesc='+orderdesc;

        var deferred = $q.defer();
        $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

        return deferred.promise;   
    }

    function savenewgroup(group)
    {
      var save = 'api/v1/groups/add';
        var deferred = $q.defer();                
        $http.post(save,group)
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;
    }

    function searchUsers(q,nextpage,orderfield,orderdesc)
    {
      var q = q;
      var search = 'api/v1/users?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
      if(q)
          search = 'api/v1/users?page='+nextpage+'&q='+q+'&orderfield='+orderfield+'&orderdesc='+orderdesc;

      var deferred = $q.defer();
      $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

      return deferred.promise;
    }

    function getUser(user_id)
    {
        var api = 'api/v1/users/'+user_id+'/edit';
        var deferred = $q.defer();                
        $http.get(api,{})
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;
    }

    function saveuser(user)
    {
      var save = 'api/v1/users/'+user.cliid;
        var deferred = $q.defer();                
        $http.put(save,user)
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;
    }

    function savenewuser(user)
    {
      var save = 'api/v1/users/add';
        var deferred = $q.defer();                
        $http.post(save,user)
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;
    }

    function deleteUser(userid)
    {        
        var del = 'api/v1/users/'+userid;
        var deferred = $q.defer();                
        $http.delete(del,{})
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;   
    }

    function getUserAccess(user_id)
    {      
      var access = 'api/v1/users/'+user_id+'/access';   
      var deferred = $q.defer();                   
      $http.get(access,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

      return deferred.promise;
    }

    function updateAccess(user_id,access,action)
    {      
      var actionurl = action?$http.put('api/v1/users/'+user_id+'/access/'+access,{}):$http.delete('api/v1/users/'+user_id+'/access/'+access,{});   
      var deferred = $q.defer();                         
          actionurl.then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

      return deferred.promise;
    }

    
    function menuUser()
    {
        var urlUserMenu = app.apiUrlBase.userMenu;
        var deferred = $q.defer();
        $http.get(urlUserMenu, {})
            .then(function(result) 
                    {   
                        if(!result.data.error)
                        {
                            deferred.resolve(result.data.msg);
                        }
                        else
                        {
                            deferred.reject(result.data.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
        return deferred.promise;    
    }
    
    function forgotCode(userName) 
    {
        var deferred = $q.defer();
        $http.post(urlForgot, { userName: userName})
            .then(function(result)
                    {   
                        if(!result.data.error)
                        {
                            deferred.resolve(result.data.msg);
                        }
                        else
                        {
                            deferred.reject(result.data.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
        return deferred.promise;
    }
    
    function checkForgotCode(thecode) 
    {
        var deferred = $q.defer();
        $http.post(urlCheckForgotCode, { code: thecode})
            .then(function(result)
                    {
                        if(!result.data.error)
                        {
                            deferred.resolve(result.data.msg);
                        }
                        else
                        {
                            deferred.reject(result.data.msg);
                        }
                    },
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
        return deferred.promise;
    }
    
    function resetPW(userPassword, thecode) 
    {
        var deferred = $q.defer();
        $http.post(urlResetPw, {code: thecode, pw: userPassword})
            .then(function(result)
                    {
                        if(!result.data.error)
                        {
                            deferred.resolve(result.data.msg);
                        }
                        else
                        {
                            deferred.reject(result.data.msg);
                        }
                    },
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
        return deferred.promise;
    }
    
    function destroyUserData()
    {
        userData = null;
        $window.sessionStorage["userData"] = null;
    }
    
    function setUserData(data)
    {
        userData = data;
        $window.sessionStorage["userData"] = JSON.stringify(userData);
    }
    
    function getUserData()
    {
        return userData;
    }
    
    function getProfile() 
    {
        var deferred = $q.defer();
        $http.get(app.apiUrlBase.me)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data.user);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;
    }
    
    // Para update user
    function updateProfile(data) 
    {
        var deferred = $q.defer();
        var userProfile = $resource(urlUserProfile, {cliid:'@cliid'}, {'update': { method:'PUT' }});
        data.cliid = userData.cliid;
        userProfile.update(data)
            .$promise.then(function(result)
                    {   
                        if(!result.error)
                        {
                            deferred.resolve(result.msg);
                        }
                        else
                        {
                            deferred.reject(result.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
         return deferred.promise;
    }
    
    function init()
    {
        if($window.sessionStorage["userData"]) 
        {
            userData = JSON.parse($window.sessionStorage["userData"]);
        }
        else
        {
            $auth.logout();
        }
    }
    init();
    
    return {
        forgotCode: forgotCode,
        checkForgotCode: checkForgotCode,
        resetPW: resetPW,
        menuUser: menuUser,
        getProfile: getProfile,
        getUserData: getUserData,
        setUserData: setUserData,
        destroyUserData: destroyUserData,
        updateProfile: updateProfile,
        searchUsers:searchUsers,
        getUser:getUser,
        saveuser:saveuser,
        deleteUser:deleteUser,
        getUserAccess:getUserAccess,
        updateAccess:updateAccess,
        savenewuser:savenewuser,
        searchGroups:searchGroups,
        listGroupsUser:listGroupsUser,
        savenewgroup:savenewgroup,
        getUserGroup:getUserGroup,
        setUserGroup:setUserGroup
    };

}]);


appServices.factory('accesosSvc',  ['$http','$resource', '$rootScope', '$window', '$q', '$auth', function ($http, $resource, $rootScope, $window, $q, $auth)
{      

    function searchAccesos(q,nextpage,orderfield,orderdesc)
    {
      var q = q;
      var search = 'api/v1/accesos?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
      if(q)
          search = 'api/v1/accesos?page='+nextpage+'&q='+q+'&orderfield='+orderfield+'&orderdesc='+orderdesc;

      var deferred = $q.defer();
      $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

      return deferred.promise;
    }

    function saveacceso(acceso)
    {
      var save = 'api/v1/accesos';
        var deferred = $q.defer();                
        $http.post(save,{accid:acceso})
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;
    }

    function updateacceso(acceso)
    {
      var save = 'api/v1/accesos/'+acceso.accnombre;
        var deferred = $q.defer();                
        $http.put(save,acceso)
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;
    }

    function deleteAccesso(acceso)
    {        
      var save = 'api/v1/accesos/'+acceso;
        var deferred = $q.defer();                
        $http.delete(save,{})
            .then(function(result)
            {
                if(result.data.error)
                    deferred.reject(result.data);
                else
                    deferred.resolve(result.data);
            },function(error)
            {
                deferred.reject(error);
            });

        return deferred.promise;
    }

    

    
    
    return {
        searchAccesos: searchAccesos,
        saveacceso:saveacceso,
        updateacceso:updateacceso,
        deleteAccesso:deleteAccesso
    };

}]);

appServices.factory('indicadorSvc',  ['$http','$resource', '$rootScope', '$window', '$q', '$auth', function ($http, $resource, $rootScope, $window, $q, $auth)
{

    function updateGrupoUsuario(guid,gid,cliid)
    {
        var deferred = $q.defer();
        var urlUpdateEstatus = 'api/v1/user/'+cliid+'/groups/add';
       
        $http.post(urlUpdateEstatus, {guid:guid,gid:gid})
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;  
    }
    function getRetroIndiSeg(idind,cliid)
    {
        var q = q;
        var search = 'api/v1/seguimiento/retroalimentacion/indicador/'+idind+'/user/'+cliid;
      
        var deferred = $q.defer();
        $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

        return deferred.promise;   
    }

    function getDetaiIndilSeg(idind,cliid)
    {
        var q = q;
        var search = 'api/v1/seguimiento/ficha/indicador/'+idind+'/user/'+cliid;
      
        var deferred = $q.defer();
        $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

        return deferred.promise;   
    }
    function getIndicadorSeg(iddim,cliid,q,nextpage,orderfield,orderdesc)
    {
        var q = q;
        var search = 'api/v1/seguimiento/dimension/'+iddim+'/user/'+cliid+'?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
        if(q)
          search =  'api/v1/seguimiento/dimension/'+iddim+'/user/'+cliid+'?page='+nextpage+'&q='+q+'&orderfield='+orderfield+'&orderdesc='+orderdesc;

        var deferred = $q.defer();
        $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

        return deferred.promise;   
    }
    function listIndicadorAuto(iddim)
    {
        var deferred = $q.defer();
        var urlIndicadorLista = '/api/v1/autoevaluacion/isi/dimension/'+iddim;
        $http.get(urlIndicadorLista)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }
    function listIndicadorUsuario(q,nextpage,orderfield,orderdesc,cliid)
    {
        var q = q;
        var urlIndicadorLista = '/api/v1/indicador/lista/usuario/'+cliid+'?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
        if(q)
          urlIndicadorLista =  '/api/v1/indicador/lista/usuario/'+cliid+'?page='+nextpage+'&q='+q+'&orderfield='+orderfield+'&orderdesc='+orderdesc;

        var deferred = $q.defer();
       // var urlIndicadorLista = '/api/v1/indicador/lista';
        $http.get(urlIndicadorLista)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }
    function listIndicador(q,nextpage,orderfield,orderdesc)
    {
        var q = q;
        var urlIndicadorLista = '/api/v1/indicador/lista'+'?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
        if(q)
          urlIndicadorLista =  '/api/v1/indicador/lista'+'?page='+nextpage+'&q='+q+'&orderfield='+orderfield+'&orderdesc='+orderdesc;

        var deferred = $q.defer();
       // var urlIndicadorLista = '/api/v1/indicador/lista';
        $http.get(urlIndicadorLista)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }
    function registrarInicador(userid,data) 
    {
        var urlRegistrarIndicador = '/api/v1/indicador/users/:userid/registrar';
        var deferred = $q.defer();
        var sIndicador = $resource(urlRegistrarIndicador, {userid:'@userid', data:'@data'});
        var data = {'userid': userid, 'data': data};
        sIndicador.save(data)
            .$promise.then(function(result)
                    {   
                        if(!result.error)
                        {
                            deferred.resolve(result.data);
                        }
                        else
                        {
                            deferred.reject(result.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
         return deferred.promise;
    }
    
    function registrarFormula(userid,data,vars) 
    {
        var urlRegistrarIndicador = '/api/v1/indicador/users/:userid/registrar/formula';
        var deferred = $q.defer();
        var sIndicador = $resource(urlRegistrarIndicador, {userid:'@userid', data:'@data',vars:'@vars'});
        var data = {'userid': userid, 'data': data, 'vars': vars};
        sIndicador.save(data)
            .$promise.then(function(result)
                    {   
                        if(!result.error)
                        {
                            deferred.resolve(result.data);
                        }
                        else
                        {
                            deferred.reject(result.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
         return deferred.promise;
    }

    function getResponsables()
    {
        var deferred = $q.defer();
        $http.get(app.apiUrlBase.getresponsables)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }

    function getDimensiones()
    {
        var deferred = $q.defer();
        $http.get(app.apiUrlBase.getdimensiones)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }

    function updatedEstatus(op, id)
    {
        var deferred = $q.defer();
        var urlUpdateEstatus = 'api/v1/';
        if(op == 1)
            urlUpdateEstatus += 'indicador/'+id+'/update';
        else
            urlUpdateEstatus += 'dimension/'+id+'/update';
        $http.post(urlUpdateEstatus, {op:op})
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }
    function updateIndicadorUsuario(uiid,cinid,uicalificar,cliid)
    {
      var deferred = $q.defer();
        var urlUpdateIndicadorUsuario = 'api/v1/indicador/usuario/'+cliid+'/calificar';
        $http.post(urlUpdateIndicadorUsuario, {uiid:uiid,cinid:cinid,uicalificar:uicalificar})
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }
    function getInfoIndicador()
    {
        var deferred = $q.defer();
        $http.get(app.apiUrlBase.getInfoIndicador)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }

    return {
        updateGrupoUsuario:updateGrupoUsuario,
        getRetroIndiSeg: getRetroIndiSeg,
        getDetaiIndilSeg: getDetaiIndilSeg,
        getIndicadorSeg: getIndicadorSeg,
        listIndicadorAuto: listIndicadorAuto,
        listIndicadorUsuario:listIndicadorUsuario,
        registrarInicador: registrarInicador,
        registrarFormula: registrarFormula,
        getResponsables: getResponsables,
        getDimensiones: getDimensiones,
        listIndicador: listIndicador,
        updatedEstatus: updatedEstatus,
        updateIndicadorUsuario:updateIndicadorUsuario
    };

}]);


appServices.factory('planestudiosSvc',  ['$http','$resource', '$rootScope', '$window', '$q', '$auth', function ($http, $resource, $rootScope, $window, $q, $auth)
{
    
    function getPlanes()
    {
        var deferred = $q.defer();
        $http.get(app.apiUrlBase.getplanes)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }

   
    return {
        getPlanes: getPlanes
    };

}]);

appServices.factory('seguimientoSvc',  ['$http','$resource', '$rootScope', '$window', '$q', '$auth', function ($http, $resource, $rootScope, $window, $q, $auth)
{
    
    function getSeguimiento(q,nextpage,orderfield,orderdesc)
    {
        var q = q;
      var search = 'api/v1/accesos?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
      if(q)
          search = 'api/v1/accesos?page='+nextpage+'&q='+q+'&orderfield='+orderfield+'&orderdesc='+orderdesc;

      var deferred = $q.defer();
      $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data.data);
          },function(error)
          {
              deferred.reject(error);
          });

      return deferred.promise;  
    }

    function getListSeguimiento(clave,nivel,autoevaluacion,nextpage,orderfield,orderdesc)
    {
        var q = q;
        var nivel = nivel;
        var autoevaluacion = autoevaluacion;
        var clave = clave;
        var search = 'api/v1/seguimiento/lista?page='+nextpage+'&orderfield='+orderfield+'&orderdesc='+orderdesc;
        if(nivel)
            search += '&nivel='+nivel;
        if(clave)
            search += '&clave='+clave;
        if(autoevaluacion)
            search += '&autoevaluacion='+autoevaluacion;
      var deferred = $q.defer();
      $http.get(search,{})
          .then(function(result)
          {
              if(result.data.error)
                  deferred.reject(result.data);
              else
                  deferred.resolve(result.data);
          },function(error)
          {
              deferred.reject(error);
          });

      return deferred.promise;  
    }
   
    return {
        getSeguimiento: getSeguimiento,
        getListSeguimiento:getListSeguimiento
    };

}]);


appServices.factory('autoevaluacionSvc',  ['$http','$resource', '$rootScope', '$window', '$q', '$auth', function ($http, $resource, $rootScope, $window, $q, $auth)
{
    function registrarSeguimientoIndi(userid,cinid,data){
        var urlIniciarAutoevaluacion = 'api/v1/autoevaluacion/evaluar/'+userid+'/indicador/'+cinid+'/seguimiento/registrar';
        var deferred = $q.defer();
        var sProceso = $resource(urlIniciarAutoevaluacion, {userid:'@userid', data:'@data'});
        var data = {'userid': userid, 'data': data};
        sProceso.save(data)
            .$promise.then(function(result)
                    {   
                        if(!result.error)
                        {
                            deferred.resolve(result.data);
                        }
                        else
                        {
                            deferred.reject(result.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
         return deferred.promise;
    }
    function uploadFile(userid,cinid,data){
        var urlUploadFile = 'api/v1/autoevaluacion/evaluar/'+userid+'/indicador/'+cinid+'/upload';
        var deferred = $q.defer();
        var sProceso = $resource(urlUploadFile, {userid:'@userid', data:'@data'});
        var data = {'userid': userid, 'data': data};
        sProceso.save(data)
            .$promise.then(function(result)
                    {   
                        if(!result.error)
                        {
                            deferred.resolve(result.data);
                        }
                        else
                        {
                            deferred.reject(result.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
         return deferred.promise;
    }
    function getIsiInfo(cliisi)
    {
        var deferred = $q.defer();
        $http.get('api/v1/unamsi/isi/'+cliisi)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }
    function getInfoIndicador(cliid,cinid)
    {
        var deferred = $q.defer();
        $http.get('api/v1/autoevaluacion/evaluar/'+cliid+'/indicador/'+cinid)
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }
    function registrarEvalIndi(userid,cinid,data)
    {
        var urlIniciarAutoevaluacion = 'api/v1/autoevaluacion/evaluar/'+userid+'/indicador/'+cinid+'/registrar';
        var deferred = $q.defer();
        var sProceso = $resource(urlIniciarAutoevaluacion, {userid:'@userid', data:'@data'});
        var data = {'userid': userid, 'data': data};
        sProceso.save(data)
            .$promise.then(function(result)
                    {   
                        if(!result.error)
                        {
                            deferred.resolve(result.data);
                        }
                        else
                        {
                            deferred.reject(result.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
         return deferred.promise;
    }

    function registrarProceso(userid,data)
    {
        var urlIniciarAutoevaluacion = '/api/v1/autoevaluacion/:userid/iniciar';
        var deferred = $q.defer();
        var sProceso = $resource(urlIniciarAutoevaluacion, {userid:'@userid', data:'@data'});
        var data = {'userid': userid, 'data': data};
        sProceso.save(data)
            .$promise.then(function(result)
                    {   
                        if(!result.error)
                        {
                            deferred.resolve(result.data);
                        }
                        else
                        {
                            deferred.reject(result.msg);
                        }
                    }, 
                    function (error) 
                    {
                        deferred.reject(error);
                    });
                    
         return deferred.promise;
    }

    function getIsis(userid)
    {
        var deferred = $q.defer();
        //var app.apiUrlBase.getIsis = 'api/v1/autoevaluacion/'+userid+'/isi';
        $http.get('api/v1/autoevaluacion/'+userid+'/isi')
            .then(function(result)
                {   
                    if(!result.data.error)
                    {
                        deferred.resolve(result.data);
                    }
                    else
                    {
                        deferred.reject(result.data.msg);
                    }
                }, 
                function (error) 
                {
                    deferred.reject(error);
                });
                    
        return deferred.promise;   
    }
   
    return {
        registrarSeguimientoIndi: registrarSeguimientoIndi,
        getInfoIndicador: getInfoIndicador,
        registrarEvalIndi: registrarEvalIndi,
        registrarProceso: registrarProceso,
        getIsis: getIsis,
        getIsiInfo: getIsiInfo,
        uploadFile:uploadFile
    };

}]);