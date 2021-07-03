<?php foreach ( comments_search_by_controller_id($c , $id) as $key => $value ) { ?>
  
    <div class="media well well-sm">

        <div class="media-left media-middle">
            <a href="#">
                
                
                <?php echo (file_exists('www/gallery/img/users/'.$value['sender_id'].'.jpg'))? 
                '<img class="media-object img-thumbnail" src="www/gallery/img/users/'.$value['sender_id'].'.jpg" alt="jiho" width="50"/>' 
                :
                '<img class="media-object img-thumbnail" src="www/gallery/img/users/user.webp" alt="default" width="50"/>'
                ; ?>
                
            </a>
        </div>

        <div class="media-body">
            <h4 class="media-heading">
                <a href="index.php?c=contacts&a=details&id=<?php echo $value['sender_id']; ?>">
                    <?php echo contacts_formated($value['sender_id']) ?>
                </a>
                - 
                    <?php echo $value["date"] ; ?>
                
                <?php 
                // poner $c me permite borrar desde cualquier parte 
                //
                echo ( $u_id == $value['sender_id'] )? "<a href=\"index.php?c=$c&a=ok_comments_change_status&id=".$value['id']."&status=delete&order_id=$id\"><span class=\"glyphicon glyphicon-trash\"></span> "._tr('Delete')."</a>" : "  "; ?>  
                
            </h4>
            <p>
                <?php echo $value["comment"] ; ?>

            </p>
        </div>
    </div>
<?php } ?>




    


