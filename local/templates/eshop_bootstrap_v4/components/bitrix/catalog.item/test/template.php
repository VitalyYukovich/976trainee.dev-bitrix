<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use \Bitrix\Main;

/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 * @var CatalogProductsViewedComponent $component
 * @var CBitrixComponentTemplate $this
 * @var string $templateName
 * @var string $componentPath
 * @var string $templateFolder
 */


//pr($arResult['ITEM']['OFFERS'][0]['ITEM_PRICES'][0]['DISCOUNT']);?>
<div class="product-item">
	<a href = <?=$arResult['ITEM']['DETAIL_PAGE_URL'];?>>
		<div class ='pic' style="background-image: url('<?=$arResult['ITEM']['DETAIL_PICTURE']['SRC']?>');"></div>
	</a>
	<h3 class="product-item-title">
		<a href="<?=$arResult['ITEM']['DETAIL_PAGE_URL'];?>" title="<?=$arResult['ITEM']['NAME'];?>">
			<?=$arResult['ITEM']['NAME'];?>
		</a>
	</h3>
	<div class="product-item-info-container product-item-price-container" data-entity="price-block">
		<?if($arResult['ITEM']['OFFERS'][0]['ITEM_PRICES'][0]['DISCOUNT']!=0){?>
			<span class="product-item-price-old"><?=$arResult['ITEM']['OFFERS'][0]['ITEM_PRICES'][0]['BASE_PRICE']?></span>&nbsp;
		<?}?>
		<span class="product-item-price-current"><?=$arResult['ITEM']['OFFERS'][0]['ITEM_PRICES'][0]['PRICE'];?> руб.</span>
	</div>
						
	<div class="product-item-info-container product-item-hidden" data-entity="buttons-block">
		<div class="product-item-button-container">
			<?if($arResult['ITEM']['OFFERS'][0]['PRODUCT']['QUANTITY']<=0){?>
				<span>Нет в наличии</span>
			<?}else{?>
				<div  class="form-group row" id="<?=$arResult['ITEM']['ID']. '_basket_action'?>">
					<div class='col'>
						<div class="input-group">
							<div class="input-group-prepend" id='decQuantity'>
								<div class="input-group-text">-</div>
							</div>
							<input class='form-control' type="number" value='1' name = "quantity"  style="text-align: center;">
							<div class="input-group-append">
								<div class="input-group-text" id='incQuantity'>+</div>
							</div>
						</div>
					</div>
					<button class="btn btn-outline-success add-to-basket col" id="<?=$arResult['ITEM']['ID']. '_basket_buy'?>" data-basket-id="<?=$arResult['ITEM']['OFFERS'][0]['ID']?>">
						Купить
					</button>
				</div>
			<?}?>
		</div>
	</div>
</div>
