/**
 * Created by alexchavet on 29/06/2016.
 */
var singlePageHelpers = function(){

   var pHasImg = $('p').has('img');

    $(pHasImg).addClass('single-image');

}
if (typeof isBlogBH !== 'undefined') {
    $(document).ready(singlePageHelpers());
};