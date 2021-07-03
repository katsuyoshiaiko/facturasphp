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
            <a class="navbar-brand" href="#">
                <?php _t("Expenses"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                

            </ul>


            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="expenses">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="id">
                
                <div class="form-group">
                    <input type="text" name="id" class="form-control" placeholder="<?php _t("By expense number"); ?>">
                </div>
                
                <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
            </form>
            
            <ul class="nav navbar-nav">
                <?php if( permissions_has_permission($u_rol, "export","read")){ ?>
                    <li><a href="index.php?c=export&a=expenses"><?php _t("Export"); ?></a></li>
                <?php } ?>
                                    
                <li>
                    <a 
                        href="#"
                        data-toggle="modal" 
                        data-target="#contacts_help"
                        >
                        <?php _t("Help"); ?>
                    </a>
                </li>
                
            </ul>


           <?php 
           /* <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="expenses">
                <input type="hidden" name="a" value="addOk">

                <div class="form-group">
                    <select class="form-control" name="contact_id">
                        <?php contacts_select("contact_id", "name", null, contacts_list_by_type(1)); ?>
                    </select>

                </div>


                <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
            </form>
*/
           ?>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
        <?php if ( permissions_has_permission($u_rol , "expenses" , "create") ) { ?>     
          <button 
              type="button" 
              class="btn btn-primary navbar-btn navbar-right" 
              data-toggle="modal" data-target="#contacts_expenses_add"
              >
              <span class="glyphicon glyphicon-plus-sign"></span>
                  <?php _t("New") ; ?>
          </button>
        <?php } ?>                           
        </div><!-- /.navbar-collapse -->


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>








<div class="modal fade" id="contacts_expenses_add" tabindex="-1" role="dialog" aria-labelledby="contacts_expenses_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="contacts_expenses_addLabel">
                    <?php _t("Add new expenses"); ?>                
                </h4>
            </div>
            <div class="modal-body">
                <?php //include "form_add.php"; ?>
                <?php include "tabs_chosse_contacts.php"; ?>
            </div>
        </div>
    </div>
</div>

<?php 
// Modal help para contacts
?>
<div class="modal fade" 
     id="contacts_help" 
     tabindex="-1" 
     role="dialog" 
     aria-labelledby="contacts_helpLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" 
                        class="close" 
                        data-dismiss="modal" 
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="contacts_helpLabel">
                    <?php _t("Help"); ?>                
                </h4>
            </div>
            <div class="modal-body">                
                <?php //include "tabs_chosse_contacts.php"; ?>
                <iframe 
    width="100%" 
    height="315" 
    src="http://127.0.0.1/jiho_22/index.php?c=blog&a=details&id=16&embed=1" 
    title="YouTube video player" 
    frameborder="0" 
    allow="" 
    allowfullscreen>        
    </iframe>
                
                
                
            </div>
        </div>
    </div>
</div>