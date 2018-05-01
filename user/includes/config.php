<?php
/**
 * Created by PhpStorm.
 * User: A's
 * Date: 24/03/2018
 * Time: 16:06
 */

if (!defined('DB_SERVER')) define('DB_SERVER', 'localhost');
if (!defined('DB_USERNAME')) define('DB_USERNAME', 'okwtbzob_user');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', 'LoLxd12312');
if (!defined('DB_DATABASE')) define('DB_DATABASE', 'okwtbzob_db123');

$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);