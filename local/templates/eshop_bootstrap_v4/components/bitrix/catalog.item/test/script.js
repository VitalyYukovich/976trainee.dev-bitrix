$(document).ready(function(){
	$(document).on('click', '.add-to-basket', function(){
		let idProduct = $(this).attr('data-basket-id');	
		let form_group = $(this).closest('.form-group')[0];
		let quantityElem = $(form_group).find('input[name=quantity]')[0];
		let quantityProduct = $(quantityElem).val();

		$.ajax({
			method: 'POST',
			url: '/ajax/addtobasket.php',
			data: {id: idProduct, quantity: quantityProduct},
			success: function(result){
				console.log(result);
			}
			
		})
	});
	$(document).on('click', '#incQuantity', function(){
		changeQuantity(this, 1);
	});
	$(document).on('click', '#decQuantity', function(){
		changeQuantity(this, -1);
	});
	function changeQuantity(elem, num){
		let quantityElem = getQuantityElem(elem);
		let quantity = Number($(quantityElem).val());
		if(quantity + num > 0)
			$(quantityElem).val(quantity + num);
	}
	function getQuantityElem(elem){
		let input_group = $(elem).closest('.input-group')[0];
		let quantityElem = $(input_group).children('input[name=quantity]')[0]
		return quantityElem;
	}
})