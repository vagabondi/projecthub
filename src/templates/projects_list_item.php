<div class="card">
 <header class="card-header">
   <p class="card-header-title">
     <?php echo $row['name']; ?>
   </p>
   <a class="card-header-icon">
     <span class="icon">
       <i class="fa fa-angle-down"></i>
     </span>
   </a>
 </header>
 <div class="card-content">
   <div class="content">
     <?php if (isset($row['description'])): ?>
       <p><?php echo $row['description']; ?></p>
     <?php endif; ?>
   </div>
 </div>
 <footer class="card-footer">
   <a class="card-footer-item" href="index.php?page=single&project=<?php echo $row['id']; ?>">Show</a>
   <!-- <a class="card-footer-item">Edit</a>
   <a class="card-footer-item">Delete</a> -->
 </footer>
</div>
