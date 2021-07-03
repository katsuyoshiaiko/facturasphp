<form class="form-signin" method="post" >
    <input type="hidden" name="c" value="users">
    <input type="hidden" name="a" value="identification">   


    <p class="text-center">
        <?php  logo(200 , "img-responsive") ; ?>
    </p>

    <h2 class="form-signin-heading text-center"><?php _t("Orders on line") ; ?></h2>


<?php 
/*    <div class="form-group">
        <select name="language" class="form-control selectpicker" data-live-search="true">            
            <?php
            foreach ( _languages_list() as $key => $value ) {
                echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>' ;
            }
            ?>
        </select>
    </div>*/
?>

    <div class="form-group">
        <input type="text" placeholder="<?php _t("Username") ; ?>" name="login" class="form-control">
    </div>

    <div class="form-group">
        <input 
            type="password" 
            placeholder="<?php _t("Password") ; ?>" 
            name="password" 
            class="form-control">
    </div>

    <button class="btn btn-lg btn-primary btn-block" type="submit"><?php _t("Sign in") ; ?></button>
    <bR>
    <p class="text-center">
        <a href="index.php?c=home&a=forgetPassword"><?php _t("Forget password") ; ?></a> | 
        <?php _t("Login") ; ?> | 
        <a href="index.php?c=home&a=newAccount"><?php _t("New account") ; ?></a>
    </p>
</form>