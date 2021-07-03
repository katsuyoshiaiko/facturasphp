<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("config", "nav"); ?>


        <?php
        if ($m) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("Home page"); ?></h1>

        <p><?php _t("What page do you want to see at the beginning?"); ?></p>

        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_home_page_update">            


            <div class="form-group">
                <label class="sr-only" for="home_page">Home page</label>
                <div class="input-group">                    

                  
                    
                    <select name="home_page" class="form-control">
                        <?php
                        foreach (controllers_list() as $key => $controller) {
                            
                            $selected = ( _options_option('home_page') == $controller['controller'] )? " selected " : ""; 
                            
                            echo '<option value="'.$controller['controller'].'"  '.$selected.'>' . $controller['controller'] . '</option>';
                        }
                        ?>
                    </select>


                </div>
            </div>

            <button type="submit" class="btn btn-primary"><?php _t("Update"); ?></button>
        </form>






    </div>
</div>

<?php include view("home", "footer"); ?> 

