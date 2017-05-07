/**
 * Created by alex on 16/04/16.
 */
var heroVideo = new heroVideo();
function heroVideo(){
    this.container = document.getElementById('heroVideoJs');
    this.vide = {};
    this.vide.poster = function(){
        var windowDim = {
                w : $(window).width(),
                h : $(window).height()
        },
        file = "cover-ben-desktop-large.jpg";

        if (windowDim.w > 1200){
            file = "cover-ben-desktop-large.jpg";
        }
        else if (windowDim.w > 992){
            file = "cover-ben-desktop-reg.jpg";
        }
        else if (windowDim.w > 768){
            file = "cover-ben-desktop-ipad.jpg";
        }
        else {
            file = "cover-ben-desktop-mobile.jpg";
        }
        return file;

    };
    this.vide.path= {
        mp4 : 'https://s3-ap-southeast-2.amazonaws.com/benhaineswine/drone-video-final.mp4',
        poster : templateUrl+'/assets/images/covers/'+this.vide.poster()
    };
    this.vide.options = {
        volume: 0,
        playbackRate: 1,
        muted: true,
        loop: true,
        autoplay: true,
        position: '50% 50%', // Similar to the CSS `background-position` property.
        posterType: 'jpg', // Poster image type. "detect" — auto-detection; "none" — no poster; "jpg", "png", "gif",... - extensions.
        resizing: true, // Auto-resizing, read: https://github.com/VodkaBears/Vide#resizing
        bgColor: '#B7B7B7', // Allow custom background-color for Vide div,
        className: '' // Add custom CSS class to Vide div
    };

    this.ratio = {
        x: 12,
        y: 5
    };
    this.height = function() {
        var windowDim = {
             w : $(window).width(),
             h : $(window).height()
            },
            offset,
            dynamicHeight;


        if(windowDim.w >= 1025){

            dynamicHeight = (windowDim.w*heroVideo.ratio.y)/heroVideo.ratio.x;
        }

        else {
            offset = $(heroVideo.container).offset();
            offset.top = $('#masthead').height();
            dynamicHeight = windowDim.h - offset.top;

            if (windowDim.w<windowDim.h){
                $(heroVideo.container).find('video').css('height','100%');
                $(heroVideo.container).find('video').css('width','auto');
            }
            else {
                $(heroVideo.container).find('video').css('width','100%');
                $(heroVideo.container).find('video').css('height','auto');
            }

        }
        console.log(offset,dynamicHeight);
        return dynamicHeight;
    };
}
$(document).ready(function(){

    if (typeof initVideoBackground !== 'undefined') {


        $(heroVideo.container).height(heroVideo.height());

        $(heroVideo.container).find('div').first().css('z-index', '1');

        $(heroVideo.container).vide(heroVideo.vide.path, heroVideo.vide.options);


        $('.after-video-loaded').css('opacity', '1');

        $(window).resize(function () {

            $(heroVideo.container).height(heroVideo.height());
        });
    }
});

//<div class="video-container" id="heroVideoJs" style="height: 80vh"
//data-vide-bg="<?php echo get_template_directory_uri(); ?>/assets/images/drone.mp4" data-vide-options="loop: false, muted: true, position: 0% 0%"
//></div>

