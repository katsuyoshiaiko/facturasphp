<?php include view("_translations", "izq"); ?>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "_content") ; ?>
        <?php echo _t("_content") ; ?>
    </a>
    <a href="index.php?c=_content" class="list-group-item"><?php _t("List") ; ?></a>
    <a href="index.php?c=_content&a=dic" class="list-group-item"><?php _t("Diccionario") ; ?></a>
    <a href="index.php?c=_content&a=add" class="list-group-item"><?php _t("Add") ; ?></a> 
</div>

<?php include view("_translations" , "izq") ?>


<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Text without translation") ; ?></div>
    <div class="panel-body">

        <p><?php _t("Find texts without translation") ; ?></p>
        <form method="get" action="index.php">
            <input class="hidden" name="c" value="_content">
            <input class="hidden" name="a" value="search">
            <input class="hidden" name="w" value="hasNotTranslation">

            <div class="form-group">
                <label for="language"><?php _t("Language") ; ?></label>
                <select class="form-control" name="language" id="language">
<?php
foreach ( _languages_list() as $key => $value ) {
    echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>' ;
}
?>                                        
                </select>
            </div>








            <button type="submit" class="btn btn-default"><?php _t("Search") ; ?></button>            
        </form>
    </div>
</div>







<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Export to translate") ; ?></div>
    <div class="panel-body">

        <form method="get" action="index.php">
            <input class="hidden" name="c" value="_content">
            <input class="hidden" name="a" value="search">
            <input class="hidden" name="w" value="exportToTranslate">

            <div class="form-group">
                <label for="language"><?php _t("Language") ; ?></label>
                <select class="form-control" name="language" id="language">
<?php
foreach ( _languages_list() as $key => $value ) {
    echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>' ;
}
?>                                        
                </select>
            </div>


            <div class="form-group">
                <label for="languageTo"><?php _t("Language") ; ?></label>
                <select class="form-control" name="languageTo" id="languageTo">
<?php
foreach ( _languages_list() as $key => $value ) {
    echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>' ;
}
?>                                        
                </select>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>            
        </form>
    </div>
</div>




<div class="panel panel-default">
    <div class="panel-heading"><?php _t("Export language") ; ?></div>
    <div class="panel-body">

        <form method="get" action="index.php">
            <input class="hidden" name="c" value="_content">
            <input class="hidden" name="a" value="search">
            <input class="hidden" name="w" value="exportLanguage">

            <div class="form-group">
                <label for="languageFrom"><?php _t("From language") ; ?></label>
                <select class="form-control" name="languageFrom" id="languageFrom">
<?php
foreach ( _languages_list() as $key => $value ) {
    echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
}
?>                                        
                </select>
            </div>


            <div class="form-group">
                <label for="languageTo"><?php _t("to language") ; ?></label>
                <select class="form-control" name="languageTo" id="languageTo">
<?php
foreach ( _languages_list() as $key => $value ) {
    echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
}
?>                                        
                </select>
            </div>

            <button type="submit" class="btn btn-default">Submit</button>            
        </form>
    </div>
</div>





