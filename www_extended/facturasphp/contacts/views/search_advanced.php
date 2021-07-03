<?php include view("home","header"); ?>  

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php include "www/articles/views/izq.php"; ?>
    </div>
    <div class="col-sm-9 col-md-9 col-lg-9">
        <h1><?php _t("Advanced search"); ?></h1>

        <?php
        if ($action == "edit") {
            foreach ($error as $key => $value) {
                // message("info", "$value");
            }
        }
        ?>

       
        


        

        <form class="form-horizontal" action="index.php" method="post">

            <input type="hidden" name="c" id="c"  value="art_edit">			    	
            <input type="hidden" name="id" id="id"  value="<?php echo $detail_article["id"] ?>">			    	
            <input type="hidden" name="action" id="action"  value="edit">			    	

            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Category"); ?></label>
                <div class="col-sm-10">                                                
                    <select class="form-control" name="type_id">
                        <?php
                        foreach (type_article_array() as $key => $value) {
                            $selected = ($value['id'] == $detail_article['type_id'] ) ? " selected " : "80";
                            echo "<option value=\"$value[id]\" $selected >$value[category]</option>\n";
                        }
                        ?>
                    </select>
                </div>
            </div>	


            <div class="form-group">
                <label class="control-label col-sm-2" for="name"><?php _t("Article name"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="name" id='name' value="">
                </div>
            </div>	

            <div class="form-group">
                <label class="control-label col-sm-2" for="quantity"><?php _t("Stock"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="quantity" id='quantity' value="">
                </div>
            </div>	

            <div class="form-group">
                <label class="control-label col-sm-2" for="price"><?php _t("Price"); ?></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="price" id='price' value="">
                </div>	
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="5" name="description"  id='description'></textarea>
                </div>
            </div>
            
            
             <div class="form-group">
                <label class="control-label col-sm-2" for="price"><?php _t("Only with photo"); ?></label>
                <div class="col-sm-10">
                    <input type="checkbox" name="photo" value="ON" />
                </div>	
            </div>
            
            

            <div class="form-group">	
                <div class="col-sm-offset-2 col-sm-10" >
                    <input class="btn btn-primary active col-sm-2" type ="submit" value ="<?php _t("Search"); ?>">
                </div>	
            </div>

        </form>	
        
        
        

        <?php
        echo articles_photo($detail_article['id'], 200);
        ?>

        <p><?php _t("Photo name"); ?><?php echo ": $detail_article[photo]"; ?></p>




        <form id="subirImg" name="subirImg" enctype="multipart/form-data" method="post" action="index.php">

            <input type="hidden" name="c" value="art_foto">
            <input type="hidden" name="id" id="id"  value="<?php echo $detail_article["id"] ?>">
            <label for="imagen">Subir imagen:</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
            <input type="file" name="imagen" id="imagen" />
            <input type="submit" name="subirBtn" id="subirBtn" value="<?php _t("Update Image"); ?>" />
        </form>







    </div>
    
<?php include view("home","footer"); ?>  