const $  = require('jquery')
const index = require('./index.js')
const news = require('./news.js')
const about = require('./about.js')
const home = require('./home.js')

window.setDailyNews = index.setDailyNews
// window.styleNewsPage = news.news()
// enable hoverable card
news.hoverCard()

function makeFadedIn(leftnodes, rightnodes, isViewportSmall = false) {
    let crossObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.target && entry.target.dataset.direction == "left" && !isViewportSmall)
            {
                anime({
                    targets: entry.target,
                    translateX: [350,0],
                    opacity: [0,1],
                    duration: 1000,
                    easing: 'easeInOutQuad'
                });
            }
            if (entry.target && entry.target.dataset.direction == "right" && !isViewportSmall)
            {
                anime({
                    targets: entry.target,
                    translateX: [-350,0],
                    opacity: [0,1],
                    duration: 1000,
                    easing: 'easeInOutQuad'
                });
            }
            if (entry.target && entry.target.dataset.direction == "left" && isViewportSmall)
            {
                anime({
                    targets: entry.target,
                    opacity: [0,1],
                    duration: 1000,
                    easing: 'easeInOutQuad'
                });
            }
            if (entry.target && entry.target.dataset.direction == "right" && isViewportSmall)
            {
                anime({
                    targets: entry.target,
                    opacity: [0,1],
                    duration: 1000,
                    easing: 'easeInOutQuad'
                });
            }
        }) 
    }, {})
    leftnodes.forEach((leftnode) => {
    crossObserver.observe(leftnode)
    })
    rightnodes.forEach((rightnode) => {
    crossObserver.observe(rightnode)
    })
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