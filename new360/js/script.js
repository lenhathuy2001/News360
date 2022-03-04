const menuBar = document.querySelector("#menu-bar")
menuBar.addEventListener("click",function(){
    document.querySelector(".menu-phone-content-items").classList.toggle("active")
})

const searchBtn = document.querySelector("#search-btn")
searchBtn.addEventListener("click",function(){
    document.querySelector(".menu-phone-content-search").classList.toggle("block")
})
//------------------------Login-----------------------
const loginBtn = document.querySelector("#login-btn")

loginBtn.addEventListener("click",function(){
    document.querySelector(".login").style.bottom = "0"
  
})
const loginClose = document.querySelector(".login-close")
loginClose.addEventListener("click",function(){
    document.querySelector(".login").style.bottom = "-100%"
  
})
//------------------------Mobile Login-----------------------
const loginBtnMb = document.querySelector("#mobile-login-btn")

loginBtnMb.addEventListener("click",function(){
    // console.log("ok")
    document.querySelector(".login").style.bottom = "0"
  
})

  
