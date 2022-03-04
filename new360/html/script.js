const menuBar = document.querySelector("#menu-bar")
menuBar.addEventListener("click",function(){
    document.querySelector(".menu-phone-content-items").classList.toggle("active")
})

const searchBtn = document.querySelector("#search-btn")
searchBtn.addEventListener("click",function(){
    document.querySelector(".menu-phone-content-search").classList.toggle("block")
})