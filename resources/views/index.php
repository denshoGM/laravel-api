<!DOCTYPE html>
<html lang="es" ng-app="zohoApp">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Zoho Laravel-Angular Invoices</title>
        <!--Bootstrap-->
        <link href="bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!--Angular-->
        <script src="bower_components/angular/angular.min.js"></script>
        <script src="bower_components/lodash/dist/lodash.min.js"></script>
        <script src="bower_components/angular-route/angular-route.min.js"></script>
        <script src="bower_components/angular-local-storage/dist/angular-local-storage.min.js"></script>
        <script src="bower_components/restangular/dist/restangular.min.js"></script>
        <!--Angular-->

        <style>
            
            li {
                padding-bottom: 8px;
            }

        </style>
    </head>
    <body>
        <!--Contenedor Principal-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>
                        Invoices de Zoho 
                    </h1>

                </div>
            </div>
            <!--Contenedor de Vistas-->
            <div ng-view></div>
            <!--Contenedor de Vistas-->
        </div>
        <!--Contenedor Principal-->

        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/app.js"></script>
    </body>
</html>
