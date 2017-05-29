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
    $scope.mayorA = function(){
    	console.log('mayorA');
    };

	$scope.consultaInvoices();

}]);
