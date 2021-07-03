
<p class="text-center">
    <img src="www/gallery/img/company.jpg" class="img-thumbnail img-responsive" alt="alt"/>
</p>




<div class="list-group">
    <h4 class="list-group-item active">
        <span class="glyphicon glyphicon-home"></span> 
        <?php echo contacts_formated($id) ; ?>
    </h4>
    
    <?php if( permissions_has_permission($u_rol , "contacts" , "read") ) { ?>
        <a href="index.php?c=contacts&a=details&id=<?php echo $id ; ?>" class="list-group-item">
            <?php _menu_icon("top" , "contacts") ; ?>
            <?php _t("Details") ; ?> <?php echo $id ; ?> 
        </a>
    <?php } ?>
    
    
    
    
    
    <?php  if( permissions_has_permission($u_rol , "contacts" , "read") ) { ?>
    <a href="index.php?c=contacts&a=contacts&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "contacts") ; ?>
            <?php _t("Contacts") ; ?>
    </a>
    <?php  } ?>
    
    
    
    
    <?php  if( permissions_has_permission($u_rol , "contacts" , "read") ) { ?>
    <a href="index.php?c=contacts&a=offices&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "contacts") ; ?>
            <?php  _t("Offices") ; ?>
    </a>
    <?php  } ?>



    
    
    
    <?php if( permissions_has_permission($u_rol , "directory" , "read") ) { ?>
    <a href="index.php?c=contacts&a=directory&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "directory") ; ?>
            <?php _t("Directory") ; ?>
    </a>
    <?php } ?>
    
    
    <?php if( permissions_has_permission($u_rol , "addresses" , "read") ) { ?>
    <a href="index.php?c=contacts&a=addresses&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "addresses") ; ?>
            <?php _t("Addresses") ; ?>
    </a>
    <?php } ?>
    
    
    <?php if( permissions_has_permission($u_rol , "banks" , "read") && contacts_is_headoffice($id) ) { ?>
    <a href="index.php?c=contacts&a=banks&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "banks") ; ?>
            <?php _t("Banks") ; ?>
    </a>
    <?php } ?>
    
    
    <?php if( permissions_has_permission($u_rol , "invoices" , "read") && contacts_is_headoffice($id) && $id != $u_owner_id  ) { ?>
    <a href="index.php?c=contacts&a=invoices&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "invoices") ; ?>
            <?php _t("Invoices") ; ?>
    </a>
    <?php } ?>   
    
    
        
    
    <?php if( permissions_has_permission($u_rol , "budgets" , "read") && contacts_is_headoffice($id) && $id != $u_owner_id ) { ?>
    <a href="index.php?c=contacts&a=budgets&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "budgets") ; ?>
            <?php _t("Budgets") ; ?>
    </a>
    <?php } ?>   
    
    
    

</div>





<?php /*
  <div class="list-group">
  <a href="#" class="list-group-item active">
  <span class="glyphicon glyphicon-home"></span>
  <?php _t("Companies list"); ?>
  </a>

  <?php foreach ( contacts_list_by_type(1) as $key => $value ) {
  //  echo '<a href="index.php?c=contacts&a=details&id='.$value['id'].'" class="list-group-item">'.$value['name'].'</a>';
  }?>

  </div>


  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title">
  <span class="glyphicon glyphicon-home"></span>
  <?php _t("Owner"); ?>
  </h3>
  </div>
  <div class="panel-body">

  <p><?php _t(""); ?></p>
  <h3><?php echo contacts_formated($contact["owner_id"]) ?></h3>
  <a href="index.php?c=contacts&a=details&id=<?php echo $contact['owner_id']; ?>" class="btn btn-primary"><?php _t('Details'); ?></a>

  </div>
  </div>


 */ ?>






