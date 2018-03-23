const webpack = require('webpack');
const ExtractTextPlugin = require('extract-text-webpack-plugin');
const path = require('path');
const extractSass = new ExtractTextPlugin({ filename: '[name]-bundle.css' });

module.exports = (env, argv) => {
  const isProduction = argv.mode === 'production';

  return {
    entry: [
      './resources/assets/js/app.js',
      './resources/assets/sass/app.scss',
    ],
    output: {
      path: __dirname + '/public/dist',
      filename: '[name]-bundle.js'
    },
    module: {
      rules: [
        {
          test: /\.scss$/,
          include: [
            path.resolve(__dirname, 'resources', 'assets', 'sass'),
          ],
          use: extractSass.extract(
            {
              use: [
                {
                  loader: 'css-loader',
                  options: {
                    url: false,
                    minimize: isProduction
                  }
                },
                {
                  loader: 'postcss-loader',
                  options: {
                    parser: 'postcss-scss',
                    plugins: (loader) => [
                      require('autoprefixer')()
                    ]
                  }
                },
                {
                  loader: 'sass-loader',
                  options: {
                    outputStyle: 'nested',
                  }
                }
              ]
            }
          )
        },
        {
          test: /\.js$/,
          exclude: /node_modules/,
          include: [
            path.resolve(__dirname, 'resources', 'assets', 'js'),
          ],
          use: [
            {
              loader: 'babel-loader',
              options: {
                cacheDirectory: true
              }
            }
          ]
        }
      ]
    },
    watchOptions: {
      ignored: /node_modules/
    },
    plugins: [
      extractSass
    ]
  }
};

