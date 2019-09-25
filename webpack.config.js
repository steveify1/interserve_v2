const path = require('path');

module.exports = {
	mode: 'development',
	devtool: "none",
	
	entry: ['babel-polyfill', './src/js/index.js'],
	output: {
		path: path.resolve(__dirname, 'dist'),
		filename: 'app.build.js'
	},
	
	module: {
		rules: [{
			test: /\.js?$/,
			include: [
				path.resolve(__dirname, '/src/js')
			],
			exclude: [
				path.resolve(__dirname, '/node_modules')
			],
			loader: 'babel-loader',
			options: {
				presets: ['env']
			}
		}]
	}
}