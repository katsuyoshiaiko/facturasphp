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
            <?php _t("Invoice"); ?> <?php echo $id; ?>
        </a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php /*<li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>*/?>
        <li>
            <a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>" target="top">
                <span class="glyphicon glyphicon-print"></span>
                <?php _t("Print"); ?>
            </a>
        </li>
        

        
        
        
         <?php 
              /*  

               * 
               * 
               * 
               *          <li>
            <a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>&type=nv" target="top">
                <span class="glyphicon glyphicon-print"></span>
                <?php _t("Pdf nv"); ?>
            </a>
        </li>
        
               * 
               * 
               *         
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-print"></span>
                <?php _t("Print"); ?>
              <span class="caret"></span></a>
            
             
          <ul class="dropdown-menu">
            <li><a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>&type=nv"><?php _t("Not valued"); ?></a></li>
            <li><a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>"><?php _t("Valued"); ?></a></li>
            <li><a href="#"></a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li>
          </ul>
            
            
        </li>
        */?>
        
        
        

        
        
        
      </ul>

         <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="invoices">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="id">

                <div class="form-group">
                    <input 
                        type="text" 
                        name="id" 
                        class="form-control" 
                        placeholder="<?php _t("By id") ; ?>"
                        >
                </div>

                <button 
                    type="submit" 
                    class="btn btn-default">
                        <?php _t("Search") ; ?>
                </button>
            </form>





            <?php # edit ##########################################################?>
            <?php # edit ##########################################################?>
            <?php # edit ##########################################################?>
            <?php # edit ##########################################################?>
            
        <?php 
        
        if(permissions_has_permission($u_rol, "invoices", "update") && invoices_can_be_edit($id)){ ?> 
            <form class="navbar-form navbar-right">
                <input type="hidden" name="c" value="invoices"> 
                <input type="hidden" name="a" value="edit"> 
                <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
                <div class="form-group">

                </div>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> <?php _t("Edit invoice"); ?></button>
            </form>      
        <?php } ?>

        
        
        
      <ul class="nav navbar-nav navbar-right">
       
          <?php 
          /* <li><a href="#">Link</a></li>
        
        <?php ## EXPORT ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Export 
              <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Json</a></li>
            <li><a href="#">XML</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        
        
        
        <?php ## Import ?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              Import 
              <span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <li><a href="#">Json</a></li>
            <li><a href="#">XML</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
           * 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
        

        */
          ?>
        
        
        
        
        
        
        
        
        
      </ul>
        
        
        
        
        
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>