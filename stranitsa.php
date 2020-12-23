<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница");
?>

<?
CModule::IncludeModule("sale");
CModule::IncludeModule("iblock");
CModule::IncludeModule("catalog");
/*$basket = \Bitrix\Sale\Basket::create('s1');
$item = $basket->createItem('catalog', 33);
$item->setField('QUANTITY', 2);
$item->setField('CURRENCY', 'RUB');
$r = $basket->save();*/

//Add2BasketByProductID(42);
//Add2BasketByProductID(43,2);
//Add2BasketByProductID(44,3);
?>
<form>
	<input type='text' id='idProduct'>
	<input type='submit' value='Добавить товар' id='addProduct'>
</form>
<div id='basket'>
<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.line", "bootstrap_v5_custom", Array(
	"PATH_TO_BASKET" => SITE_DIR."personal/cart/",	// Страница корзины
		"PATH_TO_PERSONAL" => SITE_DIR."personal/",	// Страница персонального раздела
		"SHOW_PERSONAL_LINK" => "N",	// Отображать персональный раздел
		"SHOW_NUM_PRODUCTS" => "Y",	// Показывать количество товаров
		"SHOW_TOTAL_PRICE" => "Y",	// Показывать общую сумму по товарам
		"SHOW_PRODUCTS" => "N",	// Показывать список товаров
		"POSITION_FIXED" => "N",	// Отображать корзину поверх шаблона
		"SHOW_AUTHOR" => "Y",	// Добавить возможность авторизации
		"PATH_TO_REGISTER" => SITE_DIR."login/",	// Страница регистрации
		"PATH_TO_PROFILE" => SITE_DIR."personal/",	// Страница профиля
	),
	false
);?>
</div>
<script>



	$(document).ready(function(){
		$('#addProduct').on('click', function(event){
			event.preventDefault();
			$.ajax({
				url: './handler.php',
				method: 'GET',
				data: {idProduct: $('#idProduct').val()},
				success: function(data){
					let dataParse = $.parseJSON(data);
					let prevSum = $('#basket .basket-line-block span strong').text();
					if(dataParse.status == 'ok'){
						let currSum = Number(dataParse.message).toFixed(2);
						$({numberValue: parseInt(prevSum)}).animate({numberValue: currSum}, {
							duration: 500, // Продолжительность анимации, где 500 = 0,5 одной секунды, то есть 500 миллисекунд
							easing: "linear",
							step: function(val) {
								
								$(".basket-line-block>span>strong>#value-basket-price").html(Math.ceil(val)); // Блок, где необходимо сделать анимацию
								
							}
							
						});
					}else{
						console.log(dataParse.message);
					}

				}
			})
		});
	})
</script>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>