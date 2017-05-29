/*Definición de App y de Rutas con Angular Route*/
var zohoApp = angular.module('zohoApp', [
  'ngRoute',
  'zohoAppControllers'
]);


zohoApp.config(['$routeProvider', function($routeProvider) {
    
    $routeProvider.
    /*Ruta de Pantalla Principal*/
    when('/', {
        templateUrl: 'vistas/index.html',
        controller: 'MainController'
    }).
    otherwise({
        redirectTo: '/'
    });

}]);
var zohoAppControllers = angular.module('zohoAppControllers', []);


zohoAppControllers.controller('MainController', ['$scope', '$http', function ($scope, $http) {

	//Consulta la API para traer los contactos
    $scope.consultaInvoices = function () {
	    $http.get('/service/getZohoData')
		    .then(function(response, status, headers, config) {
			    $scope.invoices = response.data.invoices;
			    console.log($scope.invoices);
		    });
    }

    $scope.filtraInvoices = function(){

    };
    $scope.mayorA = function(data){
    	console.log('mayorA');
    };

	$scope.consultaInvoices();

}]);

/*Defino los servicios de la Aplicación Zoho*/
var zohoAppServices = angular.module('zohoAppServices', [
    'LocalStorageModule'
]);

zohoAppServices.factory('userService', ['$http', 'localStorageService', function($http, localStorageService) {

}]);
//# sourceMappingURL=app.js.map
