/**
 * Created by alex on 30/09/16.
 */
var addToCart = new addToCart();
function addToCart(){
    this.fieldset = document.getElementById('add-to-cart-directive');
    this.buttons = $(this.fieldset).find('.add-to-cart-custom');
    this.input = $(".input-text.qty.text");
    this.updateBtn = function(element){
        $(element).addClass('added');
        $(element).find('.bh-add-to-cart__qty').html('<i class="fa fa-spin fa-spinner"></i>');
    };
    this.getQty = function(element){
        return element.getAttribute('data-value');
    };
    this.updateInput = function(value){
        $(this.input).attr('value', value);
        $("#add-to-cart-form").submit();
    };
    this.multiplyPrice = function(element){
        console.log($("#add-price-1 .amount").text()*2);
    };
}
$(document).ready(function(){

		$('.single_add_to_cart_button').on('click',function(){
				$(this).html('<i class="fa fa-spin fa-spinner"></i> Adding')
				$("#add-to-cart-form").submit();
		});

    if(!addToCart.fieldset){
        return false;
    }

    console.log('add-to-cart-init');
    //change price
    addToCart.multiplyPrice(addToCart.fieldset);

    $(addToCart.buttons).on('click',function(){
        //show button is clicked
        addToCart.updateBtn(this);
        //get qtys
        var qty = addToCart.getQty(this);


        //add qtys to cart
        addToCart.updateInput(qty);
        console.log('add to cart',addToCart.input,$(addToCart.input).parent("form"), qty);

    })
});
