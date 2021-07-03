<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top", "stats"); ?>
        <?php _t("Stats"); ?>
    </div>
  <div class="panel-body">
    
      
      
      <form method="get" action="index.php" >
          <input type="hidden" name="c" value="stats">
          

  <div class="form-group">
      <label for="a"><?php _t("Type"); ?></label>
      <select class="form-control" name="a" id="a">
          <option value="all"><?php _t('Select one'); ?></option>          
          <?php foreach ( array(
              "invoices", 
              "contacts", 
              "addresses_by_city", 
              "remakes_by_office", 
              "remake_motifs", 
              "stats_by_office"
              ) as $key => $type) {
              echo '<option value="'.$type.'">'. $type .'</option>'; 
          }?>
      </select>
  </div>    

          
     
     
  <div class="form-group">
    <label for="date"><?php _t("Date"); ?></label>
    <input type="date" class="form-control" name="date" id="date" placeholder="">
  </div>
     
          
               
 

     
     
  <div class="form-group">
      <label for="office_id"><?php _t("Office"); ?></label>
      <select class="form-control" name="office_id" id="office_id">
          <option value="all"><?php _t('Select one'); ?></option>
          <?php foreach (contacts_list_by_type(1) as $key => $office) {
              echo '<option>'. contacts_formated($office[id]).'</option>'; 
          }?>
      </select>
  </div>
     
     

     
     
     
     
  <button type="submit" class="btn btn-default">Submit</button>
</form>
      
      
      
      
      
      
  </div>
</div>






<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", "stats"); ?>
            <?php echo _t("stats"); ?>
    </a>
    <a href="index.php?c=stats" class="list-group-item"><?php _t("List"); ?></a>
     <a href="index.php?c=stats&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>


<div class="list-group">
  <a href="#" class="list-group-item active">
      <?php _menu_icon("top", "stats"); ?>
    <?php _t("Stats"); ?>
  </a>
  <a href="index.php?c=stats&a=p1" class="list-group-item">Page 1</a>
  <a href="index.php?c=stats&a=p2" class="list-group-item">Page 2</a>
  <a href="index.php?c=stats&a=p3" class="list-group-item">Page 3</a>
  <a href="index.php?c=stats&a=p4" class="list-group-item">Page 4</a>
  <a href="#" class="list-group-item">Morbi leo risus</a>
  <a href="#" class="list-group-item">Porta ac consectetur ac</a>
  <a href="#" class="list-group-item">Vestibulum at eros</a>
</div>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "invoices") ; ?>
        <?php echo _t("Statistics") ; ?>
    </a>
    <a href="index.php?c=invoices&a=stat" class="list-group-item"><?php _t("Statistics") ; ?></a>

</div>