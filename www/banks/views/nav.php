
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
                <?php _t("Banks"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">



            </ul>


            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="banks">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="all">
                <div class="form-group">
                    <input type="text" name="txt" class="form-control" placeholder="">
                </div>
                <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
            </form>

            
              <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <?php if ( permissions_has_permission($u_rol , "banks" , "create") ) { ?>     
                    <button 
                        type="button" 
                        class="btn btn-primary navbar-btn navbar-right" 
                        data-toggle="modal" data-target="#banks_add"
                        >
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New") ; ?>
                    </button>
                <?php } ?>    


            </div><!-- /.navbar-collapse -->



        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>





<div 
    class="modal fade" 
    id="banks_add" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="banks_addLabel"
    >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="banks_addLabel">
                    <?php _t("Add new bank") ; ?>                
                </h4>
            </div>
            <div class="modal-body">
                <?php //include view("banks", "form_add"); 
              
                
                
                ?>
                <?php include "form_add.php" ; ?>
            
                
                
                
                
                
            </div>
        </div>
    </div>
</div>