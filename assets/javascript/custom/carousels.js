var carousel = new carousel();
function carousel(){
    this.init = function() {

        $('.carousel').slick({

        });
        console.log('carousel loaded');
    }
}
$(document).ready(function(){
        carousel.init();
});