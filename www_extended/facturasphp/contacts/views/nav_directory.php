<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=contacts&a=directory&id=<?php echo $id; ?>">
                <?php _menu_icon("top" , "directory") ; ?>
                <?php _t("Directory") ; ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <?php if ( permissions_has_permission($u_rol , "directory" , "create") ) { ?>    
                <button 
                    type="button" 
                    class="btn btn-primary navbar-btn navbar-right" 
                    data-toggle="modal" data-target="#modal_contacts_directory_add"
                    >
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("New") ; ?>
                </button>
            <?php } ?>    


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<div class="modal fade" id="modal_contacts_directory_add" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contacts_directory_add"><?php _t("Add new data") ; ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_directory_add.php" ; ?>
            </div>


        </div>
    </div>
</div>