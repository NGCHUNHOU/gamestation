const $  = require('jquery')
const index = require('./index.js')
const news = require('./news.js')
const about = require('./about.js')
const home = require('./home.js')

window.setDailyNews = index.setDailyNews
window.styleNewsPage = news.news()

// enable hoverable card
news.hoverCard()