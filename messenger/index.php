<?php
/** 
 * Webhook file. User can access via /messenger/
 */
if ( isset( $_REQUEST['hub_verify_token'] ) && $_REQUEST['hub_verify_token'] == 'EcoLightBot' )
{
	echo $_REQUEST['hub_challenge'];

	exit;
}

require_once 'loader.php';
//require_once 'examples/example.php';
require_once 'MeuBot.php';
