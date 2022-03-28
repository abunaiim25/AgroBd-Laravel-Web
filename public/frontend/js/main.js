//===============image show================
var loadFile = function(event)
{
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
}

var loadFile2 = function(event)
{
    var output = document.getElementById('output2');
    output.src = URL.createObjectURL(event.target.files[0]);
}

var loadFile3 = function(event)
{
    var output = document.getElementById('output3');
    output.src = URL.createObjectURL(event.target.files[0]);
}

var loadFile4 = function(event)
{
    var output = document.getElementById('output4');
    output.src = URL.createObjectURL(event.target.files[0]);
}

/* ====================Back to top======================= */
const toTop = document.querySelector(".to-top");

window.addEventListener('scroll',() => {
    if(window.pageYOffset > 100)
    {
        toTop.classList.add('active_top');
    }
    else
    {
        toTop.classList.remove('active_top');
    }
})



/* ====================Product Display======================= */
function myFunctionimg(small_img){
    var full_img = document.getElementById('display_img');
    full_img.src=small_img.src;
    }




/*======================Search=================================*/
let search = document.querySelector(".search");
let clear = document.querySelector(".clear");

search.onclick = function()
{
    document.querySelector(".sesrch-box").classList.toggle('active');
}

clear.onclick = function()
{
    document.getElementById("query").value = "";
}


//=============================slight slider======================================

$(document).ready(function() {
    $('#autoWidth').lightSlider({
        autoWidth:true,
        loop:true,
        onSliderLoad: function() {
            $('#autoWidth').removeClass('cS-hidden');
        } 
    });  
  });




/*=============read more read less===============*/
const readMore = document.querySelector('.read-more-btn');
const text = document.querySelector('.text');


readMore.addEventListener('click',(element)=>{
    text.classList.toggle('show-more');
    if(readMore.innerHTML === "Read More")
    {
        readMore.innerHTML = "Read Less"
    }
    else{
        readMore.innerHTML = "Read More"
    }
});




