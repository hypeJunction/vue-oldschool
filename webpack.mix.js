let mix = require('laravel-mix');

mix.setPublicPath('public/assets/')
	.setResourceRoot('public/assets/')
	.js('src/index.js', 'public/assets/index.js')
	.extract(['vue'], 'vue');

mix.webpackConfig({
	optimization: {
		splitChunks: false,
	},
	output: {
		libraryTarget: 'umd',
		publicPath: '/assets/',
	}
});