<?php
require('../model/database.php');
require('../model/vehicle_db.php');
require('../model/class_db.php');
require('../model/make_db.php');
require('../model/type_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_vehicles';
    }
}

require('controller/vehicle.php');
require('controller/class.php');
require('controller/make.php');
require('controller/type.php');

?>



