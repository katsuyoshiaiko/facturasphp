<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("_content" , "izq") ; ?>
    </div>

    <div class="col-lg-9">
        <?php include view("_content" , "nav") ; ?>


        <?php
        if ( $_REQUEST ) {
            foreach ( $error as $key => $value ) {
                message("info" , "$value") ;
            }
        }
        ?>



        <?php
// https://api.jquery.com/prop/
        
        
        
        ?>

        
    <script>
    $.getJSON('https://demo.web.com/index.php?c=_translations&a=api&s=home&l=fr_BE', function(data) {
        
        var text = `${data.fr_BE}`
                    
        
        $(".mypanel").html(text);
        
        $('#translation_2').val(text);
        
        
    });
    </script>
    
    
    <div class="mypanel"></div>
    
    
    
    
    

        <table class="table table-striped">
            <thead>
                <tr>
                    <th><?php _t("#") ; ?></th>
                    <th><?php _t("Id") ; ?></th>
                    <th><?php _t("Frase") ; ?></th>                    
                    <th><?php _t("Languages") ; ?></th>
                    <th><?php _t("Translation") ; ?></th>                                                                      
                </tr>
            </thead>
            <tbody>
                <tr>
                    <?php
                    if ( ! $_content ) {
                        message("info" , "No items") ;
                    }
                    $i = 1 ;

                    //foreach ($liste_info as $address) {

                    foreach ( $_content as $_content_item ) {

                        $lang = array() ;
                        foreach ( _languages_list() as $key => $_languages_list ) {
                            array_push($lang , $_languages_list["language"]) ;
                        }

                        
                        $suggestion = _diccionario_search_translation_by_content_lang($_content_item['frase'], $language); 


                     //   vardump($language); 

                        $menu = '<div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                              '._tr("Actions").'
                              <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                              <li><a href="index.php?c=_content&a=details&id=' . $_content_item["id"] . '">' . _tr("Details") . '</a></li>
                              <li><a href="index.php?c=_content&a=edit&id=' . $_content_item["id"] . '">' . _tr("Edit") . '</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="index.php?c=_content&a=delete&id=' . $_content_item["id"] . '">' . _tr("Delete") . '</a></li>
                            </ul>
                          </div>' ;
                        //   $photo = addresses_photos_principal($address["id"]);
                        //   $contact_name = contacts_field_id("name", $_content_item["contact_id"]);
                        //   $contact_lastname = contacts_field_id("lastname", $_content_item["contact_id"]);
                        echo "<tr id=\"$_content_item[id]\">" ;
                        echo "<td>$i</td>" ;
                        echo "<td>$_content_item[id]</td>" ;
                        echo "<td>$_content_item[frase]</td>" ;
                        echo "<td>$language</td>" ;
                        //  echo "<td>$_content_item[contexto]</td>";
                        echo "<td>" ;
                        ?>
                    
                    
                    
                <form class="form-inline" method="post" >
                    <input type="hidden" name="c" value="_translations">
                    <input type="hidden" name="a" value="addOk">
                    <input type="hidden" name="content" value="<?php echo $_content_item['frase'] ; ?>">
                    <input type="hidden" name="language" value="<?php echo $language ; ?>">
                    <input type="hidden" name="redi" value="2">

                    <div class="form-group">
                        <label class="sr-only" for="translation">Tr</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="translation_2" 
                            name="translation" 
                            placeholder="<?php echo "$_content_item[frase]" ; ?>"
                            value="<?php echo ($language == "en_GB")? $_content_item['frase']: $suggestion; // echo "$_content_item[frase]" ; ?>"
                            >
                        
                    </div>


                    <button type="submit" class="btn btn-default btn-sm"><?php _t("Add") ; ?></button>
                </form>
            
            
            
            
            
            
                <?php
                foreach ( $lang as $key => $l ) {
                    //echo (_translations_by_content_language($_content_item["frase"], $l)) ? '<span class="label label-info">' . $l . '</span> ' : '<span class="label label-default">' . $l . '</span> ';
                    //  include (_translations_by_content_language($_content_item["id"], $l)) ? view("_content", "modal_details") : view("_content", "modal_add");
                } echo "</td>" ;

                  echo "<td>$menu</td>";

                echo "</tr>" ;

                $i ++ ;
            }
            ?>	
            </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th><?php _t("#") ; ?></th>
                    <th><?php _t("Id") ; ?></th>
                    <th><?php _t("Frase") ; ?></th>
                    <th><?php _t("Contexto") ; ?></th>
                    <th><?php _t("Languages") ; ?></th>
                    <th><?php _t("Action") ; ?></th>                                                                      
                </tr>
            </tfoot>
        </table>







<?php
/*
  Export:
  <a href="index.php?c=addresses&a=export_json">JSON</a>
  <a href="index.php?c=addresses&a=export_pdf">pdf</a>
 */
?>


    </div>
</div>

<?php include view("home" , "footer") ; ?> 

