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

            <a class="navbar-brand" href="index.php?c=balance">                
                <?php _menu_icon("top" , "balance") ; ?>                
                <?php _t("Balance") ; ?>                
            </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">               
               <li>
                    <a href="index.php?&c=balance&a=export_pdf&id=<?php echo $id ; ?>" target="top">
                        <span class="glyphicon glyphicon-print"></span>
                            <?php _t("Print"); ?>
                    </a>
                </li>
            </ul>
            



            <form action="index.php"  method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="balance">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="null">

                <div class="form-group">
                    <input 
                        name="txt" 
                        type="text" 
                        class="form-control" 
                        placeholder="<?php // _t("id") ; ?>" 
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
                    <?php _t("Search") ; ?>
                </button>

                <?php 
                /*<a 
                    class="btn btn-default btn-sm" 
                    role="button" 
                    data-toggle="collapse" 
                    href="#collapseExample" 
                    aria-expanded="false" 
                    aria-controls="collapseExample">
                    +
                </a>
*/
                ?>





            </form>
            
            <ul class="nav navbar-nav">
                <?php if( permissions_has_permission($u_rol, "export","read")){ ?>
                    <li><a href="index.php?c=export&a=balance"><?php _t("Export"); ?></a></li>
                <?php } ?>
            </ul>





            <?php
            /*

              <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php?c=contacts&a=help"><?php _t("Help"); ?></a></li>


              </ul>
             */
            ?>







            
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if ( permissions_has_permission($u_rol , "balance" , "create") ) { ?>     
                    <button 
                        type="button" 
                        class="btn btn-primary navbar-btn navbar-right" 
                        data-toggle="modal" data-target="#balance_add"
                        >
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New") ; ?>
                    </button>
                <?php } ?>    
            </div>








        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>






<div class="collapse" id="collapseExample">
    <?php include "part_search_advanced.php" ; ?>
</div>




<div class="modal fade" id="balance_add" tabindex="-1" role="dialog" aria-labelledby="balance_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="balance_addLabel">
                    <?php _t("Balance add new registre") ; ?>                
                </h4>
            </div>
            <div class="modal-body">

                <?php _t('Disabled'); ?>



                <?php //include "izq.php"; ?>

                <?php //include "form_balance_add.php"; ?>
            </div>
        </div>
    </div>
</div>
