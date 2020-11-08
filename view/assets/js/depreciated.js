function headerlist() {
    this.home = $('.header-list .nav-item .nav-link:eq(0)')
    this.aboutus = $('.header-list .nav-item .nav-link:eq(1)')
    this.news = $('.header-list .nav-item .nav-link:eq(2)')
    this.bool = document.querySelector('.header-list').dataset.iscapitailse
};

function capitalizelist() {
    var list = new headerlist
    var listtext = [list.home, list.aboutus, list.news]
    if (typeof listtext !== undefined && list.bool == 'true') {
        listtext.forEach(function(val, index) {
            listtext[index].html(listtext[index].html().toUpperCase())
        });
        return true
    } else {
        return false
    }
}

function jsasset() {
    this.jslocation = $('script[src="http://localhost/gamestation/view/assets/js/custom.js"]')
    this.jslist = $('body script')
    this.duplist = []
}

function jspath(jsname) {
    var jsinfo = new jsasset()
    var path = jsinfo.jslocation[0].getAttribute('src')
    var pathtoarr = path.split('/')
    var lastindex = pathtoarr.length
    var lastname = pathtoarr[lastindex - 1]
    if (typeof pathready !== undefined) {
        return path.replace(lastname, jsname + '.js')
    } else {
        return false
    }
}

var jsinfo = new jsasset()

function insertjs(jsfile) {
    jsinfo.duplist.push(jsfile)
    var uniquelist = new Set(jsinfo.duplist)
    var jsnode = `<script type='text/javascript' src=${jspath(jsfile)}>`
    if (typeof jsinfo.jslocation !== undefined && jsinfo.duplist.length == uniquelist.size) {
        jsinfo.jslocation.after(jsnode)
    } else {
        return false
    }
}

function removejs(jstargetname) {
    var path = jspath(jstargetname)
    var targetjsfile = $(`body script[src='${path}']`)
    targetjsfile.remove()
}

