<?php

require_once 'configuration.php';

//loading users system
require_once 'includes/classes/authentication.class.php';
require_once 'includes/classes/users.class.php';
require_once 'includes/classes/userfunctions.php';
require_once 'includes/classes/members.class.php';

//

require_once 'app/core.php'; //define autoloading and instance global classes



require_once 'includes/lib/limonade.php';

require_once 'includes/functions/general.php';

require_once 'includes/functions/checking.php';

require_once 'includes/classes/mysql.class.php';

require_once 'app/controllers/controllers.php';

require_once 'app/model/users/core.php';

require_once 'routing.php';


