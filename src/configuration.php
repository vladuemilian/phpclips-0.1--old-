<?php

//test
define('SITE_URL','');

//database connection

define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','phpclips');

//extra constrants
define('ROOT_PATH',dirname(__FILE__));
define('LANGUAGE','en');

/*
 * Templating
*/

//frontend templating
define('TEMPLATE_NAME','default');
define('TEMPLATE_PATH', ROOT_PATH.'/app/templates/frontend/'.TEMPLATE_NAME);
define('LAYOUTS', ROOT_PATH.'/app/templates/frontend/'.TEMPLATE_NAME.'/_layouts');
define('HELPERS', ROOT_PATH.'/app/templates/frontend/'.TEMPLATE_NAME.'/_helpers');

define('AVATARS_DIR',SITE_URL.'/users/avatars');

//backend templating

define('ADMIN_TEMPLATE_NAME','default');
define('ADMIN_TEMPLATE_PATH', ROOT_PATH.'/app/templates/backend/'.TEMPLATE_NAME);
define('ADMIN_LAYOUTS', ROOT_PATH.'/app/templates/backend/'.TEMPLATE_NAME.'/layouts');
define('ADMIN_HELPERS', ROOT_PATH.'/app/templates/backend/'.TEMPLATE_NAME.'/helpers');


//model directories

define('MODEL_DIR',ROOT_PATH.'/app/model');
define('MODEL_LAYOUTS', ROOT_PATH.'/app/model/layouts');
define('CLASSES',ROOT_PATH.'/includes/classes/');

//core constants


define('TMP_DIR',ROOT_PATH.'/tmp');
define('LOGS_DIR',TMP_DIR.'/logs');
define('CACHE_DIR',TMP_DIR.'/cache');
define('VIDEOS_DIR',TMP_DIR.'/videos');
define('THUMBS_DIR',TMP_DIR.'/thumbnails');

//

define('SYSTEM_PATH',ROOT_PATH.'/app/templates/system');

//helpers

define('VIEW_HELPERS',ROOT_PATH.'/app/templates/helpers');

//upload settings

define('UPLOAD_IMG_PATH',ROOT_PATH.'/webroot/images/videothumbs');


