var carousel = new carousel();
function carousel(){
    this.init = function() {

        $('.carousel').slick({
            dots: false,
            prevArrow: this.prevNav,
            nextArrow:  this.prevNext,
            //dotsClass: "fa fa-circle"
            //appendArrows: $('.carousel--arrow-nav')
    });
        console.log('carousel loaded');
    };

    this.prevNav = '<a class="carousel--arrow-nav carousel--arrow-nav_prev"><img src="'+templateUrl+'/assets/images/arrow-left.png" alt="scroll down"> </a>'
    this.prevNext = '<a class="carousel--arrow-nav carousel--arrow-nav_next"><img src=" '+templateUrl+'/assets/images/arrow-right.png" alt="scroll down"> </a>'
}
$(document).ready(function(){
        carousel.init();
});