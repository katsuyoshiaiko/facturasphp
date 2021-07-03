<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("config", "izq"); ?>
    </div>

    <div class="col-lg-9">
        <?php include view("config", "nav"); ?>


        <?php
        if (isset($m)) {
            foreach ($m as $key => $value) {
                message("info", "$value");
            }
        }
        
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        //https://mailtrap.io/blog/test-emails-in-php/
        ?>

        <h1><?php _t("Email"); ?></h1>

        Email 
        datos de conction 

        In case you are using Gmail as your email server and there are problems with the connection test, please read the Google Guide / Troubleshoot problems

        https://support.google.com/mail/answer/7126229?hl=en-419


        <form class="form-horizontal" method="post" action="index.php">
            <input type="hidden" name="c" value="config">
            <input type="hidden" name="a" value="ok_email_update">  




            <div class="form-group">
                <label for="name" class="col-sm-2 control-label"><?php _t("Email"); ?></label>
                <div class="col-sm-4">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="config_mail_username" 
                        name="config_mail_username" 
                        placeholder="config_mail_username" 
                        value="<?php echo _options_option('config_mail_username'); ?>"
                        >

                </div>
            </div>

           

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label"><?php _t("Password"); ?></label>
                <div class="col-sm-4">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="config_mail_password" 
                        name="config_mail_password" 
                        placeholder="config_mail_password" 
                        value="<?php echo _options_option('config_mail_password'); ?>"
                        >
                </div>
            </div>
            
            
             <div class="form-group">
                <label for="name" class="col-sm-2 control-label"><?php _t("Host"); ?></label>
                <div class="col-sm-4">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="config_mail_host" 
                        name="config_mail_host" 
                        placeholder="config_mail_host" 
                        value="<?php echo _options_option('config_mail_host'); ?>"
                        >
                </div>
            </div>


            <div class="form-group">
                <label for="name" class="col-sm-2 control-label"><?php _t("Port"); ?></label>
                <div class="col-sm-4">
                    <input 
                        type="text" 
                        class="form-control" 
                        id="config_mail_port" 
                        name="config_mail_port" 
                        placeholder="config_mail_port" 
                        value="<?php echo _options_option('config_mail_port'); ?>"
                        >
                </div>
            </div>



            <div class="form-group">
                <label for="name" class="col-sm-2 control-label"><?php _t("Actived"); ?></label>
                <div class="col-sm-4">
                    
                    <?php $checked = (_options_option('config_mail'))? " checked " : "" ; ?>
                    
                    <input 
                        type="checkbox" 
                        name="config_mail" 
                        id="config_mail" 
                        value="1"
                        <?php echo $checked; ?>
                        >
                    
                    <span id="config_mail" class="help-block"><?php _t("Select here to activate the sending of documents by email"); ?></span>
                    
                    
                    
                </div>
            </div>














            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button 
                        type="submit" 
                        class="btn btn-default">
                        <?php _t("Update"); ?>
                    </button>
                </div>
            </div>
        </form>



    </div>
</div>

<?php include view("home", "footer"); ?> 

