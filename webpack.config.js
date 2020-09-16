/* eslint-env commonjs */

const path = require('path');
const webpack = require('webpack');
const RemoveStrictPlugin = require( 'remove-strict-webpack-plugin' );
const dirSource = path.resolve(__dirname, 'assets/src/js');
const dirJs = dirSource;
const dirAssets = path.resolve(__dirname, 'assets/js');

module.exports = {
  mode: 'development',
  devtool: 'source-map',
  context: dirSource,
  externals: {
    jquery: 'jQuery',
  },
  entry: {
    app: [
      path.resolve(dirJs, './main.js'),
    ],
  },
  output: {
    path: path.resolve(dirAssets, './bundle'),
    filename: 'bundle.js',
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            cacheDirectory: true,
            presets: [
              ['env', {
                targets: {
                  browsers: [
                    'last 2 versions',
                    'safari >= 12',
                    // 'ie >= 10',
                  ],
                },
              }],
            ],
          },
        },
      },
    ],
  },
  plugins: [
    new RemoveStrictPlugin(),
    new webpack.ProvidePlugin({
      $: 'jquery',
      jQuery: 'jquery',
      'window.jQuery':  'jquery',
      'window.$':  'jquery'
    }),
    new webpack.LoaderOptionsPlugin({
      options: {
        eslint:
        {
          failOnWarning: false,
          failOnError: false,
          fix: true,
          quiet: false,
        },
      },
    }),
    new webpack.NoEmitOnErrorsPlugin(),
  ],
  resolve: {
    alias: {
      '@': dirSource
    },
  },
};
