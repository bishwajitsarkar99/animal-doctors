let interval=4e3,displayvalue=document.querySelectorAll(".num");displayvalue.forEach((e=>{let t=0,a=parseInt(e.getAttribute("data-val")),n=(Math.floor(interval/a),setInterval((function(){t+=1,e.textContent=t,t==a&&clearInterval(n)})))})),window.addEventListener("DOMContentLoaded",(e=>{const t=document.getElementById("datatablesSimple");t&&new simpleDatatables.DataTable(t)})),
/*!
    * Start Bootstrap - SB Admin v7.0.7 (https://startbootstrap.com/template/sb-admin)
    * Copyright 2013-2023 Start Bootstrap
    * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
*/
window.addEventListener("DOMContentLoaded",(e=>{const t=document.body.querySelector("#sidebarToggle");t&&t.addEventListener("click",(e=>{e.preventDefault(),document.body.classList.toggle("sb-sidenav-toggled"),localStorage.setItem("sb|sidebar-toggle",document.body.classList.contains("sb-sidenav-toggled"))}))}));