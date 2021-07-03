<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="magia">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <?php # base_datos ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="base_datos"><?php _t("Base_datos"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="base_datos" class="form-control"  id="base_datos" placeholder="base_datos" value="<?php echo "$magia[base_datos]"; ?>" >
        </div>	
    </div>
<?php # /base_datos ?>

<?php # tabla ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="tabla"><?php _t("Tabla"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tabla" class="form-control"  id="tabla" placeholder="tabla" value="<?php echo "$magia[tabla]"; ?>" >
        </div>	
    </div>
<?php # /tabla ?>

<?php # campo ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="campo"><?php _t("Campo"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="campo" class="form-control"  id="campo" placeholder="campo" value="<?php echo "$magia[campo]"; ?>" >
        </div>	
    </div>
<?php # /campo ?>

<?php # accion ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="accion"><?php _t("Accion"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="accion" class="form-control"  id="accion" placeholder="accion" value="<?php echo "$magia[accion]"; ?>" >
        </div>	
    </div>
<?php # /accion ?>

<?php # label ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="label" class="form-control"  id="label" placeholder="label" value="<?php echo "$magia[label]"; ?>" >
        </div>	
    </div>
<?php # /label ?>

<?php # tipo ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="tipo"><?php _t("Tipo"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tipo" class="form-control"  id="tipo" placeholder="tipo" value="<?php echo "$magia[tipo]"; ?>" >
        </div>	
    </div>
<?php # /tipo ?>

<?php # clase ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="clase"><?php _t("Clase"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="clase" class="form-control"  id="clase" placeholder="clase" value="<?php echo "$magia[clase]"; ?>" >
        </div>	
    </div>
<?php # /clase ?>

<?php # tabla_externa ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="tabla_externa"><?php _t("Tabla_externa"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="tabla_externa" class="form-control"  id="tabla_externa" placeholder="tabla_externa" value="<?php echo "$magia[tabla_externa]"; ?>" >
        </div>	
    </div>
<?php # /tabla_externa ?>

<?php # columna_externa ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="columna_externa"><?php _t("Columna_externa"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="columna_externa" class="form-control"  id="columna_externa" placeholder="columna_externa" value="<?php echo "$magia[columna_externa]"; ?>" >
        </div>	
    </div>
<?php # /columna_externa ?>

<?php # nombre ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="nombre"><?php _t("Nombre"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="nombre" class="form-control"  id="nombre" placeholder="nombre" value="<?php echo "$magia[nombre]"; ?>" >
        </div>	
    </div>
<?php # /nombre ?>

<?php # identificador ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="identificador"><?php _t("Identificador"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="identificador" class="form-control"  id="identificador" placeholder="identificador" value="<?php echo "$magia[identificador]"; ?>" >
        </div>	
    </div>
<?php # /identificador ?>

<?php # marca_agua ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="marca_agua"><?php _t("Marca_agua"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="marca_agua" class="form-control"  id="marca_agua" placeholder="marca_agua" value="<?php echo "$magia[marca_agua]"; ?>" >
        </div>	
    </div>
<?php # /marca_agua ?>

<?php # valor ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="valor"><?php _t("Valor"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="valor" class="form-control"  id="valor" placeholder="valor" value="<?php echo "$magia[valor]"; ?>" >
        </div>	
    </div>
<?php # /valor ?>

<?php # solo_lectura ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="solo_lectura"><?php _t("Solo_lectura"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="solo_lectura" class="form-control"  id="solo_lectura" placeholder="solo_lectura" value="<?php echo "$magia[solo_lectura]"; ?>" >
        </div>	
    </div>
<?php # /solo_lectura ?>

<?php # obligatorio ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="obligatorio"><?php _t("Obligatorio"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="obligatorio" class="form-control"  id="obligatorio" placeholder="obligatorio" value="<?php echo "$magia[obligatorio]"; ?>" >
        </div>	
    </div>
<?php # /obligatorio ?>

<?php # seleccionado ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="seleccionado"><?php _t("Seleccionado"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="seleccionado" class="form-control"  id="seleccionado" placeholder="seleccionado" value="<?php echo "$magia[seleccionado]"; ?>" >
        </div>	
    </div>
<?php # /seleccionado ?>

<?php # desactivado ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="desactivado"><?php _t("Desactivado"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="desactivado" class="form-control"  id="desactivado" placeholder="desactivado" value="<?php echo "$magia[desactivado]"; ?>" >
        </div>	
    </div>
<?php # /desactivado ?>

<?php # orden ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="orden"><?php _t("Orden"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="orden" class="form-control"  id="orden" placeholder="orden" value="<?php echo "$magia[orden]"; ?>" >
        </div>	
    </div>
<?php # /orden ?>

<?php # estatus ?>
<div class="form-group">
        <label class="control-label col-sm-2" for="estatus"><?php _t("Estatus"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="estatus" class="form-control"  id="estatus" placeholder="estatus" value="<?php echo "$magia[estatus]"; ?>" >
        </div>	
    </div>
<?php # /estatus ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>

