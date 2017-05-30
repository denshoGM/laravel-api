<!DOCTYPE html>
<html lang="es">

@include('layouts.partials.htmlhead')

<body>
<div class="wrapper container-fluid" id="app">
@include('layouts.partials.mainheader')

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->

</div>

@include('layouts.partials.scripts')
@include('layouts.partials.footer')
</body>
</html>