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


//Fix off-canvas/parralax issues

$(document).ready(function(){
    //Check wich offcanvas is open

    $(this).on( 'opened.zf.offcanvas' ,function (event){
        console.log(event.target.attributes[3].nodeValue );
        if(event.target.attributes[3].nodeValue == 'left'){
            $('.parallax-mirror').addClass('offcanvas-open').removeClass('offcanvas-closed').removeClass('left');
            $( ".js-off-canvas-exit" ).clone().appendTo( ".parallax-mirror").addClass('js-off-canvas-exit-cloned right');
            console.log('right', event.target.attributes[3].nodeValue);
        }
        else {
            $('.parallax-mirror').addClass('offcanvas-open').removeClass('offcanvas-closed').addClass('left');
            $( ".js-off-canvas-exit" ).clone().appendTo(".parallax-mirror").addClass('js-off-canvas-exit-cloned left');
            console.log('left', event.target.attributes[3].nodeValue);
        }

        $('.js-off-canvas-exit-cloned').on('click', function(){
            $(event.target).foundation('close');
        });

    });
    $(this).on( 'closed.zf.offcanvas' ,function (){
        $('.parallax-mirror').removeClass('offcanvas-open').removeClass('offcanvas-closed').removeClass('left');
        console.log('test 2 ');
        $('.parallax-mirror').find('.js-off-canvas-exit-cloned').remove();
    });

})