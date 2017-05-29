const elixir = require('laravel-elixir');

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');

    //Unifico los scripts requeridos para angular en un solo archivo con gulp
    mix.scripts([
    	'app.js',
    	'controllers.js',
    	'services.js'
    ], 'public/js/app.js');
});
