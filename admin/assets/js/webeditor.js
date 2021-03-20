const pretty = require("pretty")
  var myCodeMirror = CodeMirror.fromTextArea(document.querySelector(".codemirror-textarea"), {
  //   value: "hello world",
    theme: "gruvbox-dark",
    mode: "htmlmixed",
    keyMap: "vim",
    lineNumbers: true,
  })  
  myCodeMirror.setSize("100%", "calc(100vh - 123px)")
  
function loadViewText(view)
{
  const htmlContent = require(`../../view/usrView/${view}.html`)
  myCodeMirror.getDoc().setValue(pretty(htmlContent.default))
}

  function ajaxData(viewGen)
  {
      $.ajax({
          url: `/gamestation/admin/${viewGen}.php`,
          type: "POST",
          contentType: "text/json",
          data: myCodeMirror.getValue()
      })
  }
window.loadViewText = loadViewText
window.ajaxData = ajaxData