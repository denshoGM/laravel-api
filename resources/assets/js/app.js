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