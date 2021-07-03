<button 
    type="button" 
    class="btn btn-danger btn-md" 
    data-toggle="modal" 
    data-target="#myModalDeletePicture<?php echo $side; ?>"
    >
        <?php _t("Delete picture"); ?>
</button>
<div 
    class="modal fade" 
    id="myModalDeletePicture<?php echo $side; ?>" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="myModalDeletePicture<?php echo $side; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalDeletePicture<?php echo $side; ?>Label">
                    <?php _t("Delete"); ?>
                </h4>
            </div>
            <div class="modal-body">   
                
                <?php 
               // vardump($img); 
                ?>
                
                <p><?php _t("Delete image?"); ?></p>

                <form method="post" action="index.php">

                    <input type="hidden" name="c"       value="gallery">
                    <input type="hidden" name="a"       value="ok_picture_delete">                        
                    <input type="hidden" name="filename"value="<?php echo $img; ?>">                                                    
                    <input type="hidden" name="item"    value="<?php echo $c; ?>">                                                    
                    <input type="hidden" name="item_id" value="<?php echo $id; ?>">                                                    
                    <input type="hidden" name="redi"    value="1">                                        

                    <button type="submit" class="btn btn-danger"><?php _t("Delete now"); ?></button>
                </form>



                <?php
                //include "tabs_der_picture_add.php";
                ?>                    
            </div>              


        </div>
    </div>
</div>





