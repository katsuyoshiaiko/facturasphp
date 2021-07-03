<?php include view("home" , "header") ; ?>  

<div class="row">
    <div class="col-lg-3">
        <?php include view("addresses" , "izq") ; ?>
    </div>

    <div class="col-lg-9">
        <?php include view("addresses" , "nav") ; ?>


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


        <?php include "table_index.php" ; ?>







<?php 
/*        <nav>
            <ul class="pagination">
                <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                <li class="page-item //<?= ($currentPage == 1) ? "disabled" : "" ?>">
                    <a href="?page=<?= $currentPage - 1 ?>" class="page-link">Précédente</a>
                </li>

                <?php for ( $page = 1 ; $page <= $pages ; $page ++ ): ?>
                    <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                    <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                        <a href="./?page=<?= $page ?>" class="page-link"><?= $page ?></a>
                    </li>
                <?php endfor ?>

                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                    <a href="./?page=<?= $currentPage + 1 ?>" class="page-link">Suivante</a>
                </li>
            </ul>
        </nav>*/
?>

        
        
        <?php
        // pagination
        // if ( isset($_GET['page']) && ! empty($_GET['page']) ) {
//          $page = ( int ) strip_tags($_GET['page']) ;
//      } else {
//          $page = 1 ;
//      } 
//
//      // pagination('index.php?c=addresses' , $totalItems , $itemsByPage , $page)
//
//      $totalItems = count(addresses_list()) ;
//
//      $itemsByPage = (_options_option("system_items_limit")) ? _options_option("system_items_limit") : 5 ;
//      //$totalPages = ceil($totalItems / $itemsByPage) * 10 ;
//      $limit = $itemsByPage ;
//      $start = ($page == 1 ) ? 0 : $page * $itemsByPage ;
//
//      $addresses = addresses_list($limit , $start) ;
        
        pagination("index.php?c=$c" , $totalItems , $itemsByPage , $page); 
                
        ?>



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

    