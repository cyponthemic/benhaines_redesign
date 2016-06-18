/**
 * Created by alexchavet on 15/06/2016.
 */

$(document).ready(function(){
    $('#feature-a').parallax({
        imageSrc: templateUrl+'/assets/images/sample/feature-a.jpg',
        zIndex: 9,
        speed: 0.9
    });
    $('#feature-b').parallax({
        imageSrc: templateUrl+'/assets/images/sample/feature-b.jpg',
        zIndex: 9,
        speed: 0.9
    });
});