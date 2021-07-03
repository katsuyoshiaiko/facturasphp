<nav class="navbar navbar-default navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <?php echo _options_option("nombre_web"); ?>                
            </a> 
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php
                foreach (_menus_list_by_location("top") as $key => $top) {
                    if (
                            (
                            $top["father"] == "" &&
                            permissions_has_permission($u_rol, $top["label"], "read")
                            ) &&
//                            //_options_option($top["label"])
//                            // cojo el status del modulo
//                           modules_field_module('status', $top["label"])
                            // saco el modulo al que pertenece, y veo su estatus
                            modules_field_module("status", modules_search_module_by_sub_module($top["label"]))
                    ) {

                        if (_menus_list_by_father_location($top["label"], "top")) {

                            echo ' <li class="dropdown">
                            <a href="#" 
                            class="dropdown-toggle" 
                            data-toggle="dropdown" 
                            role="button" 
                            aria-haspopup="true" 
                            aria-expanded="false">
                            
                            <i class="' . $top["icon"] . '"></i>
                                
                                ' . ucfirst(_tr($top["label"])) . '
                                <span class="caret"></span>';

                            if ($top["label"] == "contacts") {
                                $users_total_by_status = users_total_by_status(0);

                                if ($users_total_by_status) {
                                    echo '<span class="badge">' . $users_total_by_status . '</span>';
                                }
                            }


                            echo '</a><ul class="dropdown-menu">';

                            foreach (_menus_list_by_father_location($top["label"], "top") as $key => $childs) {

                                if (
                                        permissions_has_permission($u_rol, $childs["label"], "read") &&
                                        modules_field_module("status", modules_search_module_by_sub_module($childs["label"]))
                                ) {


                                    // if(  _options_option($childs["label"]) ){
                                    if (modules_search_module_by_sub_module($childs["label"])) {

                                        echo '<li>';
                                        echo '<a  href="' . $childs["url"] . '">';
                                        echo '<i class="' . $childs["icon"] . '"></i> ' . ucfirst(_tr($childs['label'])) . '</a>';
                                        echo '</li>';
                                    }
                                }
                            }

                            echo '                                                
                            </ul>
                        </li>';
                        } else {
                            echo '<li>';
                            echo '<a href="' . $top["url"] . '"><i class=" ' . $top["icon"] . '"></i> ' . ucfirst(_tr($top['label'])) . ' ';


                            if ($top["label"] == "contacts") {
                                $users_total_by_status = users_total_by_status(0);

                                if ($users_total_by_status) {
                                    echo '<span class="badge progress-bar-danger">' . $users_total_by_status . '</span>';
                                }
                            }
                            echo '</a>';
                            echo '</li>';
                        }
                    }
                }
                ?>
            </ul> 




            <ul class="nav navbar-nav navbar-right">
                <?php /* <li><a href="#">Link</a></li> */ ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <?php _menu_icon('top', 'contacts') ?>

                        <?php echo contacts_formated($u_id); ?> 
                        (<?php echo users_field_contact_id("rol", $u_id) ?>)
                        <span class="caret"></span></a>

                    <ul class="dropdown-menu">

                        <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>                        
                            <li>
                                <a href="index.php?c=contacts&a=details&id=<?php echo $u_owner_id; ?>">
                                    <span class="glyphicon glyphicon-home" ></span>  
                                    <?php _t("My company"); ?>
                                </a>
                            </li>
                        <?php } ?>



                        <?php if (permissions_has_permission($u_rol, "my_info", "read")) { ?>   
                            <li>
                                <a href="index.php?c=my_info">
                                    <span class="glyphicon glyphicon-user" ></span> 
                                    <?php _t("My info"); ?>
                                </a>
                            </li>
                        <?php } ?>




                        <?php if (permissions_has_permission($u_rol, "my_info", "read")) { ?>  
                            <li>
                                <a href="index.php?c=my_info&a=language">
                                    <span class="glyphicon glyphicon-globe" ></span> <?php _t("Change language"); ?>
                                </a>
                            </li>  
                        <?php } ?>


                        <li role="separator" class="divider"></li>

                        <li>
                            <a href="index.php?c=home&a=about">
                                <span class="glyphicon glyphicon-info-sign" ></span> <?php _t("About"); ?>
                            </a>
                        </li>

                        <?php if (permissions_has_permission($u_rol, 'config', "read")) { ?>
                            <li>
                                <a href="index.php?c=config">
                                    <span class="glyphicon glyphicon-wrench" ></span> <?php _t("Config"); ?>
                                </a>
                            </li>
                        <?php } ?>



                        <li role="separator" class="divider"></li>


                        <li>
                            <a href="index.php?c=home&a=logout">
                                <span class="glyphicon glyphicon-off" ></span> 
                                <?php _t("Logout"); ?>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>





        </div>
    </div>
</nav>


