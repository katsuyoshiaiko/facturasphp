
<p class="text-center">
    <img src="www/gallery/img/user.png" class="img-thumbnail img-responsive" alt="alt"/>
</p>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">

            <?php _t("Owner") ; ?>: 
        </h3>
    </div>
    <div class="panel-body">

        <p>

            <a href="index.php?c=contacts&a=details&id=<?php echo contacts_field_id("owner_id" , $id) ; ?>">
                <?php _menu_icon("top" , "contacts") ; ?>
                <?php echo contacts_formated(contacts_field_id("owner_id" , $id)) ?>
            </a>
        </p>


    </div>
</div>



<div class="list-group">
    <h4 class="list-group-item active">
        <span class="glyphicon glyphicon-user"></span> 
        <?php echo contacts_formated($id) ; ?>
    </h4>

    <?php if ( permissions_has_permission($u_rol , "contacts" , "read") ) { ?> 
        <a href="index.php?c=contacts&a=details&id=<?php echo $id ; ?>" class="list-group-item">
            <?php _menu_icon("top" , "contacts") ; ?>
            <?php _t("Details") ; ?> <?php echo $id ; ?>
        </a>

    <?php } ?>

    
    

    <?php if ( permissions_has_permission($u_rol , "directory" , "read") ) { ?> 
        <a href="index.php?c=contacts&a=directory&id=<?php echo "$id" ; ?>" class="list-group-item">
          <?php _menu_icon("top" , "directory") ; ?>
            <?php _t("Directory") ; ?>
        </a>
    <?php } ?>


    <?php if ( permissions_has_permission($u_rol , "banksssssssssssssssssss" , "read") ) { ?> 
        <a href="index.php?c=contacts&a=banks&id=<?php echo "$id" ; ?>" class="list-group-item">
            <?php _menu_icon("top" , "banks") ; ?>
            <?php _t("Banks") ; ?>
        </a>
    <?php } ?>


    <?php if ( permissions_has_permission($u_rol , "system" , "read") ) { ?> 
        <a href="index.php?c=contacts&a=system&id=<?php echo "$id" ; ?>" class="list-group-item">
            <?php _menu_icon("top" , "system") ?>
            <?php _t("System") ; ?>
        </a>
    <?php } ?>


    <?php if(permissions_has_permission($u_rol, "logs", "read")){ ?> 
    <a href="index.php?c=contacts&a=logs&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "logs") ; ?>
        <?php _t("Logs") ; ?>
    </a>    
    <?php } ?>
    
    
    
    
        <?php if(permissions_has_permission($u_rol, "comments", "read")){ ?> 
    <a href="index.php?c=contacts&a=comments&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "comments") ; ?>
        <?php _t("Comments") ; ?>
    </a>    
    <?php } ?>
    
    
    

    
    <?php if(permissions_has_permission($u_rol, "permissions", "read")){ ?> 
    <a href="index.php?c=contacts&a=permissions&id=<?php echo "$id" ; ?>" class="list-group-item">
        <?php _menu_icon("top" , "permissions") ; ?>
        <?php _t("Permissions") ; ?>
    </a>    
    <?php } ?>

</div>


