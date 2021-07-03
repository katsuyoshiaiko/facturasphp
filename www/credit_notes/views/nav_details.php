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
                <?php _t("Credit note") ; ?> <?php echo $id ; ?>
            </a>
        </div>

        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <?php /* <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> */ ?>
                <li>
                    <a href="index.php?&c=credit_notes&a=export_pdf&id=<?php echo $id ; ?>" target="top">
                        <span class="glyphicon glyphicon-print"></span>
                        <?php _t("Print") ; ?>
                    </a>
                </li>                
            </ul>
            
            
           <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="credit_notes">
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


            <?php # SAVE ##########################################################?>
            <?php # SAVE ##########################################################?>
            <?php # SAVE ##########################################################?>
            <?php # SAVE ##########################################################?>

            
            <?php if(
                    // tiene permiso 
                    permissions_has_permission($u_rol, "credit_notes", "update") 
                            
                    && 
                    // puede ser editada
                    credit_notes_can_be_edit($id)
                    
                    )
                    
                    { ?>
            <form class="navbar-form navbar-right">
                <input type="hidden" name="c" value="credit_notes"> 
                <input type="hidden" name="a" value="edit"> 
                <input type="hidden" name="id" value="<?php echo "$id" ; ?>"> 
                <div class="form-group">

                </div>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-pencil"></span> <?php _t("Edit") ; ?></button>
            </form>  
            <?php } ?>



            <ul class="nav navbar-nav navbar-right">
                
                <?php /*<li><a href="#">Link</a></li>*/?>

                <?php ## EXPORT ?>
<?php /*                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Export 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?&c=credit_notes&a=export_pdf&id=<?php echo $id ; ?>"><?php _t("PDF") ; ?></a></li>
                        <li><a href="#">Json</a></li>
                        <li><a href="#">XML</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>*/?>




<?php 
/*                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        Dropdown 
                        <span class="caret"></span>
                    </a>
                    
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </li>*/
?>



            </ul>





        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>