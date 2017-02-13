<?php
include_once (__DIR__. '../../config/top.inc.php');
require_once (__DIR__. '../../src/project.class.php');
require_once (__DIR__. '/header.php');
?>



<div class="columns">
  <div class="column is-3">
    <?php $project->getProjects('panel'); ?>
  </div>
  <div class="column is-7 is-offset-1">
    <?php $project->getProjects('list'); ?>
  </div>
</div>



<?php require_once (__DIR__. '/footer.php'); ?>
