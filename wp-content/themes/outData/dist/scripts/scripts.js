"use strict";document.addEventListener("DOMContentLoaded",function(){document.querySelector("body").classList.add("js-active");var sr=ScrollReveal({distance:"60px",duration:1e3,delay:250});function scrollEvents(){100<(void 0!==window.pageYOffset?window.pageYOffset:(document.documentElement||document.body.parentNode||document.body).scrollTop)?document.querySelector("#js-header").classList.add("scrolled"):document.querySelector("#js-header").classList.remove("scrolled")}NodeList.prototype.forEach=function(callback,thisArg){thisArg=thisArg||window;for(var i=0;i<this.length;i++)callback.call(thisArg,this[i],i,this)},document.querySelector(".js-search")&&document.querySelector(".js-search-toggle").addEventListener("click",function(){var search=document.querySelector(".js-search");search.classList.contains("open")?search.classList.remove("open"):search.classList.add("open")},!1),sr.reveal(".load-hidden"),scrollEvents(),document.addEventListener("scroll",function(){scrollEvents()}),document.querySelector("#mobile-toggle")&&document.getElementById("mobile-toggle").addEventListener("click",function(){document.querySelector("html").classList.toggle("mobile-menu-open"),document.querySelector(".hamburger").classList.toggle("is-active"),document.querySelector(".header__toggle").classList.toggle("is-active"),document.querySelector(".header").classList.toggle("is-active"),document.querySelector(".js-search").classList.toggle("open"),document.querySelector("nav").classList.toggle("is-active")},!1),document.querySelector(".menu-item-has-children")&&document.querySelector(".menu-item-has-children").addEventListener("click",function(){var submenu=this.querySelector(".sub-menu"),children=submenu.children,totalHeight=0;if(window.innerWidth<1025){if(submenu.classList.contains("open"))submenu.classList.remove("open");else{for(var i=0;i<children.length;i++){var style=children[i],height=style.offsetHeight,style=getComputedStyle(style);totalHeight+=height+parseInt(style.marginTop,10)+parseInt(style.marginBottom,10)}submenu.classList.add("open")}submenu.style.maxHeight=totalHeight+"px"}},!1)});