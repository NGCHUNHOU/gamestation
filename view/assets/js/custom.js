const $  = require('jquery')
const index = require('./index.js')
const news = require('./news.js')
const about = require('./about.js')
const home = require('./home.js')

window.setDailyNews = index.setDailyNews
// window.styleNewsPage = news.news()
// enable hoverable card
news.hoverCard()

function makeFadedIn(nodes) {
    let isScrolled = false
    nodes.forEach((node) => {
       node.style.visibility = "hidden" 
        window.onscroll = () => {
            if (window.pageYOffset >= 70 && !isScrolled) 
            {
                document.querySelector('.card').style.visibility = "initial"
                document.querySelector('.pic-newsPaper').style.visibility = "initial"
                anime({
                    targets: document.querySelector(".pic-newsPaper"),
                    translateX: [-350,0],
                    // loop: true,
                    opacity: [0,1],
                    duration: 1000,
                    easing: 'easeInOutQuad'
                });
                anime({
                    targets: document.querySelector(".card"),
                    translateX: [350,0],
                    opacity: [0,1],
                    duration: 1000,
                    easing: 'easeInOutQuad'
                });
            isScrolled = true
            }
        }
    }
)
}

function makeWave(node) {
    anime({
    targets: node,
    d: 'm-2,-110.30547c213.92539,-164.88947 427.85073,164.88946 641.77607,0l0,296.80101c-139.92534,-24.11052 -264.85068,196.11055 -641.77607,0l0,-296.80101z',
    easing: 'easeOutQuad',
    duration: 9000,
    loop: true,  
    direction: 'alternate'
    });
}
window.makeFadedIn = makeFadedIn
window.makeWave = makeWave