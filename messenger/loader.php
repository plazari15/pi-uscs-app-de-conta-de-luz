<?php
/**
 * Facebook Messenger Bots
 *
 * @version 2.0
 */

ini_set( 'allow_url_fopen', true );

define( 'FMB_ABS_PATH', dirname( __FILE__ ) . '/' );

require_once FMB_ABS_PATH . 'core/config.php';

require_once FMB_ABS_PATH . 'core/FacebookHttp.php';

require_once FMB_ABS_PATH . 'core/functions.php';

require_once FMB_ABS_PATH . 'core/FacebookMessageReceive.php';

require_once FMB_ABS_PATH . 'core/FacebookMessageResponse.php';

require_once FMB_ABS_PATH . 'core/FacebookMessengerBot.php';