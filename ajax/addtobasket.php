<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");?>
<?
$PRODUCT_ID = $_POST['id'];
$PRODUCT_QUANTITY = $_POST['quantity'];

if(CModule::IncludeModule("sale") || CModule::IncludeModule("catalog"))
{
    if (IntVal($PRODUCT_ID)>0)
    {
        echo Add2BasketByProductID($PRODUCT_ID, $PRODUCT_QUANTITY);
    }
}
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");?>