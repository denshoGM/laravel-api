@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <ol class="breadcrumb">
            <li><a href="#">Bienvenido!, Welcome!</a></li>
        </ol>
    </div>

    <div class="col-lg-8 col-md-offset-2" style="padding-bottom: 5%">
        <p>&nbsp;
        </p>
        <h1><strong><span style="color:#3399cc">Funcionamiento de la Aplicaci&oacute;n</span></strong>
        </h1>
        <p style="color:#b0b0b0">La idea de esta&nbsp;aplicaci&oacute;n es resolver de forma sencilla y r&aacute;pida el requerimiento solicitado, sin dejar de lado las buenas pr&aacute;cticas y&nbsp;el uso de est&aacute;ndares de programaci&oacute;n. A su vez, se explotan las bondades de los frameworks utilizados y las tecnolog&iacute;as disponibles. La premisa consiste en una aplicaci&oacute;n que tome informaci&oacute;n de distintos usuarios de un servidor externo en conjunto con una lista de tareas asociadas a dichos usuarios.
        </p>
        <h3><span style="color:#b0b0b0"><strong>&iquest;C&oacute;mo utilizarme?</strong></span>
        </h3>
        <p><span style="color:#b0b0b0">Desde el men&uacute; &quot;Action&quot; est&aacute;n disponibles todas las funciones de la aplicaci&oacute;n:</span>
        </p>
        <ol>
            <li><span style="color:#b0b0b0">L<strong>oad Users</strong> y <strong>Load Tasks</strong>, permiten simular la consulta a API&#39;s externas, retornando la informaci&oacute;n en un formato unificado.</span></li>
            <li><span style="color:#b0b0b0"><strong>Load Users+Tasks</strong> es el <em><strong>core</strong></em> de la aplicaci&oacute;n. En esta secci&oacute;n se combinan las funcionalidades del cliente PHP HTTP y consultas v&iacute;a Ajax para traer informaci&oacute;n de los dos API&#39;s externos. Se hace una consulta a la primera API al entrar a la vista y luego al hacer clic sobre el bot&oacute;n, se consulta la segunda API simulando la carga de informaci&oacute;n.</span></li>
            <li><span style="color:#b0b0b0">Para los puntos 1. y 2. la informaci&oacute;n consultada es almacenada en base de datos.</span></li>
        </ol>
        <p><span style="color:#b0b0b0">Una vez consultada la informaci&oacute;n y almacenada en DB, el men&uacute; <strong>History</strong>&nbsp;mantiene un registro hist&oacute;rico de las consultas guardadas desde la opci&oacute;n <strong>Load Users+Task</strong>. En esta vista se tienen dos enlaces: </span>
        </p>
        <ul>
            <li><span style="color:#b0b0b0">Uno para re-ejecutar la b&uacute;squeda, mostrando un detalle por usuario, y permitiendo eliminar cada una de las tareas asignadas.</span></li>
            <li><span style="color:#b0b0b0">El segundo enlace, permite eliminar en lote todas las tareas asignadas por usuario.&nbsp;</span></li>
        </ul>
        <p style="color:#b0b0b0">Un bot&oacute;n al final, permite eliminar toda la informaci&oacute;n del historia. Este paso es opcional y solamente es para fines de mantener la cantidad de informaci&oacute;n reducida.
    </div>


@endsection