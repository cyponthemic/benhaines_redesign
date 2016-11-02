/**
 * Created by alex on 16/04/16.
 */
var woocomerceCustomBH = new woocomerceCustomBH();
function woocomerceCustomBH(){
    this.closeNotice = function(){
        $(".woocommerce-message").hide();
    };
}
console.log('loaded');