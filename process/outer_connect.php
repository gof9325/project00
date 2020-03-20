<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config['host'], $config['duser'], $config['dpwd'], $config['dname']);
 ?>
