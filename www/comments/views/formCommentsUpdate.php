
<form method="post" action="index.php">

    <input type="hidden" name="c" value="comments">
    <input type="hidden" name="a" value="ok_comments_add">
    <input type="hidden" name="doc" id="doc"  value="<?php echo $c ; ?>">
    <input type="hidden" name="doc_id" id="doc_id"  value="<?php echo $id ; ?>">


    <div class="form-group">
        <label for="notes"><?php _t("Comments") ; ?></label>
        
        
        <input type="text" class="form-control" name="comment">
        
    </div>


    <button type="submit" class="btn btn-default"><?php _t("Add your comment") ; ?></button>
    
</form>


 <?php
        /*        <hr>

          <form method="post" action="index.php">

          <input type="hidden" name="c" value="orders">
          <input type="hidden" name="a" value="ok_comments_send">
          <input type="hidden" name="id" id="id"  value="<?php echo $id ; ?>">

          <div class="form-group">
          <label for="comment"><?php _t("Comments") ; ?></label>
          <textarea class="form-control" name="comment" ></textarea>
          </div>


          <button type="submit" class="btn btn-default"><?php _t("Send") ; ?></button>
          </form> */
        ?>


        <hr>


