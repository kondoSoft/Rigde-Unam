'use strict';

angular.module('mussi').directive("checkFileSize", function() {
	return {
	    link: function(scope, elem, attr, ctrl) {
	      function bindEvent(element, type, handler) {
	        if (element.addEventListener) {
	          element.addEventListener(type, handler, false);
	        } else {
	          element.attachEvent('on' + type, handler);
	        }
	      }

	      bindEvent(elem[0], 'change', function() {
	        if(this.files[0].size >= 5242880)
	        	console.log(this.files[0]);
	        	//alert("El archivo tiene que ser menor a 5Mb");
	      });
	    }
	};
});

angular.module('mussi').directive("loadingIndicator", function() {
    return {
        restrict : "A",
        template: "",
        link : function(scope, element, attrs) {
            scope.$on("ntLoadingStart", function(e) {
               NProgress.configure({ ease: 'ease', speed: 500 });
			   NProgress.start();
            });

            scope.$on("ntLoadingEnd", function(e) {
				NProgress.done();
            });

        }
    };
});

angular.module('mussi').directive('ntScrollToTop', ['$window', '$rootScope', '$document', function($window, $rootScope, $document) {
	    return {
        restrict : "A",
        template: "",
        link : function(scope, element, attrs) {
           		$rootScope.$on('$routeChangeStart', function() {
           			$document.duScrollTopAnimated(0, 5000).then(function() {
           				console && console.log('You just scrolled to the top!');
           			});
			});
        }
    };
}]);


angular.module('mussi').directive('elementMeasures', function($timeout) {
  return {
      restrict: 'A',
      link: function($scope, element) {
          $scope.Eheight = element.prop('clientHeight');
          $scope.Ewidth = element.prop('offsetWidth');
      }
  };
});


/*Para el resize del width del carrusel del menú lateral*/
angular.module('mussi').directive('resizable', function($window) {
    return function($scope) {
      $scope.initializeWindowSize = function() {
        $scope.windowHeight = $window.innerHeight;
        $scope.windowWidth  = $window.innerWidth;
        //console.log('***** h: ' + $window.innerHeight + ' w: ' + $window.innerWidth);
      };
      angular.element($window).bind("resize", function() {
        $scope.initializeWindowSize();
        $scope.$apply();
      });
      $scope.initializeWindowSize();
    }
});

angular.module('mussi').directive('myTooltip', function($tooltip) {
	  return {
	    restrict: 'EA',
	    scope: { show: '=myTooltip' },
	    link: function(scope, elem) {
	      var tooltip = $tooltip({
	        target: elem,
	        scope: scope,
	        templateUrl: 'template/my-tooltip.html'
	      });

	      scope.$watch('show', function(value) {
	        if (value) {
	          tooltip.open();
	        } else {
	          tooltip.close();
	        }
	      })
	    }
	  };
	});


angular.module('mussi').directive("showErrors", function($timeout) {
	
	
	var linkFn = function(scope, el, attrs, formCtrl) 
    {
		
    	// find the text box element, which has the 'name' attribute
		/*
		 * inputEl = el[0].querySelector('.form-control[name]');
        inputNgEl = angular.element(inputEl);
        inputName = $interpolate(inputNgEl.attr('name') || '')(scope);
		 */
	      var inputEl   = el[0].querySelector(".form-control[name]");
	      // convert the native text box element to an angular element
	      var inputNgEl = angular.element(inputEl);
	      // get the name on the text box so we know the property to check
	      // on the form controller
	      var inputName = inputNgEl.attr('name');
	      scope.$on('show-errors-check-validity', function() 
	  	  {
	  	      el.toggleClass('has-error', formCtrl[inputName].$invalid);
	      });
	      
	      scope.$on('show-errors-reset', function() 
	      {
	    	  $timeout(function() 
	    	  {
	    	    el.removeClass('has-error');
	    	  }, 0, false);
	      });
	      
	      inputNgEl.bind('blur', function() 
	      {
	        el.toggleClass('has-error', formCtrl[inputName].$invalid);
	      });
    }

    return {
    	restrict: 'A',
        require: '^form',
        link: linkFn 
    };
});
