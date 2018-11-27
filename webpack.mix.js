const mix = require('laravel-mix');

mix.styles(['resources/plantilla/css/bootstrap.min.css'],
			'public/css/plantilla.css'
)
.scripts(['resources/plantilla/js/jQuery-2.1.4.min.js',
			'resources/plantilla/js/bootstrap.min.js'],
			'public/js/plantilla.js')
.js('resources/js/app.js', 'public/js/app.js');

