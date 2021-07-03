<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("_content", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("_content", "nav"); ?>




        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        INSERT INTO `_translations` (`id`, `content_id`, `language`, `translation`) VALUES
        <hr>
        <textarea>
            <?php
            //  INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES 
            if (!$_content) {
                message("info", "No items");
            }

            foreach ($_content as $val) {


                //  echo "(NULL, 'This patient (contact) is not yours', 'fr_BE', 'Cest'),  <br>";
               // echo " (NULL, '$val[content_id]', '$languageTo', '". _content_field_id("frase", $val['content_id'])."'), \n"; 

                //UPDATE `_translations` SET `content_id` = '17' WHERE `_translations`.`content` = 'Logout' 
            }
            ?>	

        </textarea>
        
        <hr>
        
        <textarea class="form-control" rows="10">
 INSERT INTO `_translations` (`id`, `content_id`, `language`, `translation`) VALUES
            <?php
            //  INSERT INTO `_translations` (`id`, `content`, `language`, `translation`) VALUES 
            if (!$_content) {
                message("info", "No items");
            }

            foreach ($_content as $val) {


                //  echo "(NULL, 'This patient (contact) is not yours', 'fr_BE', 'Cest'),  <br>";
               // echo "$val[id]|$languageTo|". _content_field_id("frase",$val['id'])." \n"; 
                echo "(null, $val[id], \"$languageTo\", \"". _content_field_id("frase",$val['id'])."\"), \n"; 

                //UPDATE `_translations` SET `content_id` = '17' WHERE `_translations`.`content` = 'Logout' 
            }
            ?>	

        </textarea>


        


        





    </div>
</div>

<?php include view("home", "footer"); ?> 

