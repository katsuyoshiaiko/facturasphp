<nav class="navbar navbar-default">
    <div class="container-fluid">        
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#bs-example-navbar-collapse-1" 
                aria-expanded="false">

                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php?c=contacts">                
                <?php _menu_icon("top", "contacts"); ?>                
                <?php _t("Contacts"); ?>                
            </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">




            <form action="index.php"  method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="contacts">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="">

                <div class="form-group">
                    <input 
                        name="txt" 
                        type="text" 
                        class="form-control" 
                        placeholder="<?php _t("Name, Lastname, Birthday"); ?>" 
                        autofocus>
                </div>


                <?php
                /*
                  <div class="form-group">
                  <select class="form-control" name="owner_id">
                  <option value="all"><?php echo _t("All");  ?></option>

                  <?php foreach (contacts_list_by_type(1) as $key => $value) {
                  echo '<option value="all">'.$value['name'].'</option>';
                  }?>


                  </select>
                  </div> */
                ?>



                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span> 
                    <?php _t("Search"); ?>
                </button>
            </form>



            <?php if (permissions_has_permission($u_rol, "users", "read")) { ?>
                <ul class="nav navbar-nav navbar-left">
                    <li>                  
                        <a href="index.php?c=users&a=search&w=waiting" >                      
                            <?php
                            echo users_status_icon(USER_WAITING);
                            _t("Waiting");
                            $users_total_by_status = users_total_by_status(0);
                            if ($users_total_by_status) {
                                echo '<span class="badge progress-bar-danger">' . $users_total_by_status . '</span>';
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            <?php } ?>





            <?php
            /*

              <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php?c=contacts&a=help"><?php _t("Help"); ?></a></li>


              </ul>
             */
            ?>









            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if (permissions_has_permission($u_rol, "contacts", "create")) { ?>     
                    <button 
                        type="button" 
                        class="btn btn-primary navbar-btn navbar-right" 
                        data-toggle="modal" data-target="#contacts_add"
                        >
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New contact"); ?>
                    </button>
                <?php } ?>    
            </div>






        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>







<div class="modal fade" id="contacts_add" tabindex="-1" role="dialog" aria-labelledby="contacts_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="contacts_addLabel">
                    <?php _t("Add new contact"); ?>                
                </h4>
            </div>
            <div class="modal-body">






                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" >
                            <a href="#contact" 
                               aria-controls="contact" 
                               role="tab" 
                               data-toggle="tab">
                                   <?php _t("Contact"); ?>
                            </a>
                        </li>

                        <li role="presentation" class="active">
                            <a href="#company" 
                               aria-controls="company" 
                               role="tab" 
                               data-toggle="tab">
                                   <?php _t("Company"); ?>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane"
                             id="contact">
                            <h3><?php _t("Add a contact"); ?></h3>



                            <?php include "form_contacts_contacts_add.php"; ?>

                        </div>
                        <div role="tabpanel" class="tab-pane active" id="company">
                            <h3><?php _t("Add a company"); ?></h3>

                            <?php include "form_contacts_company_add.php"; ?>
                        </div>
                    </div>

                </div>



                <?php //include "form_contacts_add.php";  ?>
            </div>
        </div>
    </div>
</div>
