<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="magia">
    <input type="hidden" name="a" value="addOk">

    <?php # base_datos ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="base_datos"><?php _t("Base_datos"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="base_datos" class="form-control" id="base_datos" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /base_datos ?>

    <?php # tabla ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tabla"><?php _t("Tabla"); ?></label>
        <div class="col-sm-8">
            <select  name="tabla" class="form-control" id="tabla">                                
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /tabla ?>

    <?php # campo ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="campo"><?php _t("Campo"); ?></label>
        <div class="col-sm-8">
            <select  name="campo" class="form-control" id="campo">                                
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /campo ?>

    <?php # accion ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="accion"><?php _t("Accion"); ?></label>
        <div class="col-sm-8">
            <select  name="accion" class="form-control" id="accion">                                
                <?php _select("", "", array(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /accion ?>

    <?php # label ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="label" class="form-control" id="label" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /label ?>

    <?php # tipo ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tipo"><?php _t("Tipo"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="tipo" class="form-control" id="tipo" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /tipo ?>

    <?php # clase ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="clase"><?php _t("Clase"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="clase" class="form-control" id="clase" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /clase ?>

    <?php # tabla_externa ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tabla_externa"><?php _t("Tabla_externa"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="tabla_externa" class="form-control" id="tabla_externa" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /tabla_externa ?>

    <?php # columna_externa ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="columna_externa"><?php _t("Columna_externa"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="columna_externa" class="form-control" id="columna_externa" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /columna_externa ?>

    <?php # nombre ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="nombre"><?php _t("Nombre"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="nombre" class="form-control" id="nombre" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /nombre ?>

    <?php # identificador ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="identificador"><?php _t("Identificador"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="identificador" class="form-control" id="identificador" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /identificador ?>

    <?php # marca_agua ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="marca_agua"><?php _t("Marca_agua"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="marca_agua" class="form-control" id="marca_agua" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /marca_agua ?>

    <?php # valor ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="valor"><?php _t("Valor"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="valor" class="form-control" id="valor" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /valor ?>

    <?php # solo_lectura ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="solo_lectura"><?php _t("Solo_lectura"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="solo_lectura" class="form-control" id="solo_lectura" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /solo_lectura ?>

    <?php # obligatorio ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="obligatorio"><?php _t("Obligatorio"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="obligatorio" class="form-control" id="obligatorio" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /obligatorio ?>

    <?php # seleccionado ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="seleccionado"><?php _t("Seleccionado"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="seleccionado" class="form-control" id="seleccionado" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /seleccionado ?>

    <?php # desactivado ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="desactivado"><?php _t("Desactivado"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="desactivado" class="form-control" id="desactivado" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /desactivado ?>

    <?php # orden ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="orden"><?php _t("Orden"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="orden" class="form-control" id="orden" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /orden ?>

    <?php # estatus ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="estatus"><?php _t("Estatus"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="estatus" class="form-control" id="estatus" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /estatus ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>
