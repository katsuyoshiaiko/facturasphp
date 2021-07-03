<?php 
if( updates_field_id("installed", $id) == 0 ){
    echo '<a href="index.php?c=updates&a=install&id='.$id.'">Instalar</a>'; 
} else{
    echo '<a href="index.php?c=updates&a=uninstall&id='.$id.'">Desinstalar</a>'; 
}
echo "<hr>"; 
echo updates_get_update(2020); 
?>

<hr>
Instalar



