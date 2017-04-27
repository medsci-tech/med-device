const { mix } = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.autoload({
	'jquery': 'jQuery'
})


let scripts = ['common', 'index', 'login',
		'broker-sign', 'help', 'loc',
		'marketing-order', 'password', 'product-detail',
		'profile-basic', 'profile-change-password', 'profile-collect', 'profile-expertise', 'register'
	],
	styles = ['common', 'index', 'login']

/* javascript compile */
scripts.forEach(js => mix.js(`resources/assets/js/${ js }.js`, 'public/js'))

/* less compile */
styles.forEach(less => mix.less(`resources/assets/less/${ less }.less`, 'public/style'))

mix.extract(['jquery', 'bootstrap', 'swiper'])

