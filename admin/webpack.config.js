const path = require('path')

module.exports =
{
    entry: './assets/js/webeditor.js',
    watch: true,
    output: 
    {
        filename: 'webeditorBundle.js',
        path: path.resolve( __dirname + '/assets/js', 'dist')
    },
    devServer:
    {
      contentBase: __dirname + 'dist',
      compress: true,
      port: 80
    },
    module: {
    rules: [
      {
        test: /\.html$/i,
        loader: 'html-loader',
      },
    ],
  },
}
