<?php
include_once (__DIR__. '../../config/top.inc.php');
require_once (__DIR__. '../../src/project.class.php');
require_once (__DIR__. '../../src/event.class.php');
require_once (__DIR__. '/header.php');

if(!isset($_GET['page'])) {
    include(__DIR__. "/projects_list.php");
} elseif(isset($_GET['page']) && isset($_GET['project'])) {
    $page=$_GET['page'];
    $project_id = $_GET['project']);
    include($page . '.php');
}


require_once (__DIR__. '/footer.php'); ?>
