var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('login.scss');
	mix.styles([
		"bootstrap.css",
		"bootstrap.css.map",
		"bootstrap-theme.css",
		"bootstrap-theme.css.map",
		"font-awesome.css",
		"ionicons.css",
		"morris.css",
		"AdminLTE.css",
		"select2.css"
    ]);

    mix.scripts([
		"jquery-2.2.4.js",
		"jquery-migrate-1.4.1.js",
		"jquery.knob.js",
		"index.js",
		"jquery.slimscroll.js",
		"select2.js",
		"searchable.dropdown.app.js",
		"bootstrap.js",
		"morris.min.js",
		"admin-lte.js"
    ]);
	
});
