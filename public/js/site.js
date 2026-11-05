
var DEMO_VIDEO=""; // isi dengan alamat file video demo jika sudah ada
var dlg=document.getElementById("demo"),vid=document.getElementById("demoVideo"),mock=document.getElementById("demoMock");
document.getElementById("demoBtn").onclick=function(){if(DEMO_VIDEO){vid.src=DEMO_VIDEO;vid.hidden=false;mock.hidden=true}dlg.showModal()};
document.getElementById("demoX").onclick=function(){vid.pause();dlg.close()};
dlg.addEventListener("click",function(e){if(e.target===dlg){vid.pause();dlg.close()}});
var st=0,t0=0,btn=document.getElementById("ci");
function hm(d){return String(d.getHours()).padStart(2,"0")+":"+String(d.getMinutes()).padStart(2,"0")}
setInterval(function(){document.getElementById("clk").textContent=hm(new Date())},1000);
btn.onclick=function(){var n=new Date();if(st===0){t0=n;document.getElementById("tin").textContent=hm(n);btn.textContent="Check-out";st=1}else if(st===1){document.getElementById("tout").textContent=hm(n);var m=Math.round((n-t0)/60000);document.getElementById("twh").textContent=Math.floor(m/60)+"j "+(m%60)+"m";btn.textContent="Selesai";st=2}};


var sl=document.getElementById("sl");
document.getElementById("sn").onclick=function(){sl.scrollBy({left:300,behavior:"smooth"})};
document.getElementById("sp").onclick=function(){sl.scrollBy({left:-300,behavior:"smooth"})};
