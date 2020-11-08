const path = require('path')

module.exports =
{
    entry: './view/assets/js/custom.js',
    output: 
    {
        filename: 'bundle.js',
        path: path.resolve( './view/assets/js', 'dist')
    },
    module:
    {
        rules: 
      [
        {
          test: /\.(png|jpe?g|gif)$/i,
          use: 
          {
            loader: 'file-loader'
          }
        },
        {
          test: /\.txt$/i,
          use:
          {
            loader: 'raw-loader',
            options:
            {
              esModule: false
            }
          }
        },
        {
          test: /\.css$/i,
          use:
          {
            loader: 'css-loader',
            options:
            {
              esModule: false
            }
          }
        },
        {
          test: /\.html$/i,
          use:
          {
            loader: 'html-loader',
            options:
            {
              esModule: false,
            }
          }
        }
      ]
    }
}