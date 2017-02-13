<nav class="panel">
  <p class="panel-heading">
    Projects
  </p>
  <?php foreach ($projects_names as $id => $project) : ?>
    <a href="index.php?page=single&project=<?php echo $id; ?>" class="panel-block is-active">
      <span class="panel-icon">
        <i class="fa fa-book"></i>
      </span>
      <?php echo $project; ?>
    </a>
  <?php endforeach; ?>
</nav>
