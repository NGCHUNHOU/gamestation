const path = require('path')

module.exports =
{
    entry: './assets/js/main.js',
    output: 
    {
        filename: 'adminbundle.js',
        path: path.resolve( __dirname + '/assets/js', 'dist')
    },
    devServer:
    {
      contentBase: __dirname + 'dist',
      compress: true,
      port: 80
    }
}