<div class="card">
 <header class="card-header">
   <p class="card-header-title">
     <?php echo $event['name']; ?>
   </p>
   <a class="card-header-icon">
     <span class="icon">
       <i class="fa fa-angle-down"></i>
     </span>
   </a>
 </header>
 <div class="card-content">
   <div class="content">
     <?php if (isset($event['description'])): ?>
       <p><?php echo $event['description']; ?></p>
     <?php endif; ?>
   </div>
 </div>
</div>
