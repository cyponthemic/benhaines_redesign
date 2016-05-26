var carousel = new carousel();
function carousel(){
    this.init = function() {
        $('.carousel').each(function(){
            var element = $(this);
            $(this).slick({

               prevArrow: carousel.prevNav,
               nextArrow:  carousel.prevNext,
               dots: carousel.hasDots(element)
           });
            console.log(element);
            console.log('element',carousel.hasDots(element));

        });



    };
    this.hasDots = function(element){

       var dots = false;
        if($(element).hasClass('carousel-with-dots')){
             dots = true;
        }
       return dots;
    };
    this.prevNav = '<a class="carousel--arrow-nav carousel--arrow-nav_prev"><img src="'+templateUrl+'/assets/images/arrow-left.png" alt="scroll down"> </a>';
    this.prevNext = '<a class="carousel--arrow-nav carousel--arrow-nav_next"><img src=" '+templateUrl+'/assets/images/arrow-right.png" alt="scroll down"> </a>';
}
$(document).ready(function(){
        carousel.init();
});