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
		"font-awesome.css",
		"ionicons.css",
		"morris/morris.css",
		"jvectormap/jquery-jvectormap-1.2.2.css",
		"fullcalendar/fullcalendar.css",
		"daterangepicker/daterangepicker-bs3.css",
		"bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css",
		"AdminLTE.css"
    ]);

    mix.scripts([
		"bootstrap.js",
		"plugins/morris/morris.min.js",
		"plugins/sparkline/jquery.sparkline.min.js",
		"plugins/jvectormap/jquery-jvectormap-1.2.2.min.js",
		"plugins/jvectormap/jquery-jvectormap-world-mill-en.js",
		"plugins/fullcalendar/fullcalendar.min.js",
		"plugins/jqueryKnob/jquery.knob.js",
		"plugins/daterangepicker/daterangepicker.js",
		"plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js",
		"plugins/iCheck/icheck.min.js",
		"AdminLTE/app.js",
		"AdminLTE/dashboard.js",
		"index.js",
		"plugins/readmore.js"
    ]);
	
});
