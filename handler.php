<?
require_once($_SERVER['DOCUMENT_ROOT'] . "/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("catalog");
$idProduct = intval($_GET['idProduct']);

if(Add2BasketByProductID($idProduct, 1)){
	$basket = Bitrix\Sale\Basket::loadItemsForFUser(Bitrix\Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
	echo json_encode(array('status'=> 'ok', 'message'=> $basket->getPrice()));
}else{
	echo json_encode(array('status'=> 'error', 'message'=> 'Ошибка'));
}
?>
