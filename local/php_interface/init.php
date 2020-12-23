<?
define('LOG_FILENAME', $_SERVER['DOCUMENT_ROOT'] . '/log.txt');
AddEventHandler("main", "OnEpilog", "OnEpilogHandler");

function OnEpilogHandler(){
	//AddMessage2Log(print_r($_SESSION, true));
}
?>