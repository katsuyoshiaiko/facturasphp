<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="magia">
    <input type="hidden" name="a" value="deleteOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">
    


    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$magia[id]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Base_datos"); ?></label>
        <div class="col-sm-8">                    
            <input type="base_datos" name="base_datos" class="form-control"  id="base_datos" placeholder="base_datos" value="<?php echo "$magia[base_datos]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tabla"); ?></label>
        <div class="col-sm-8">                    
            <input type="tabla" name="tabla" class="form-control"  id="tabla" placeholder="tabla" value="<?php echo "$magia[tabla]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Campo"); ?></label>
        <div class="col-sm-8">                    
            <input type="campo" name="campo" class="form-control"  id="campo" placeholder="campo" value="<?php echo "$magia[campo]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Accion"); ?></label>
        <div class="col-sm-8">                    
            <input type="accion" name="accion" class="form-control"  id="accion" placeholder="accion" value="<?php echo "$magia[accion]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Label"); ?></label>
        <div class="col-sm-8">                    
            <input type="label" name="label" class="form-control"  id="label" placeholder="label" value="<?php echo "$magia[label]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tipo"); ?></label>
        <div class="col-sm-8">                    
            <input type="tipo" name="tipo" class="form-control"  id="tipo" placeholder="tipo" value="<?php echo "$magia[tipo]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Clase"); ?></label>
        <div class="col-sm-8">                    
            <input type="clase" name="clase" class="form-control"  id="clase" placeholder="clase" value="<?php echo "$magia[clase]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tabla_externa"); ?></label>
        <div class="col-sm-8">                    
            <input type="tabla_externa" name="tabla_externa" class="form-control"  id="tabla_externa" placeholder="tabla_externa" value="<?php echo "$magia[tabla_externa]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Columna_externa"); ?></label>
        <div class="col-sm-8">                    
            <input type="columna_externa" name="columna_externa" class="form-control"  id="columna_externa" placeholder="columna_externa" value="<?php echo "$magia[columna_externa]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Nombre"); ?></label>
        <div class="col-sm-8">                    
            <input type="nombre" name="nombre" class="form-control"  id="nombre" placeholder="nombre" value="<?php echo "$magia[nombre]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Identificador"); ?></label>
        <div class="col-sm-8">                    
            <input type="identificador" name="identificador" class="form-control"  id="identificador" placeholder="identificador" value="<?php echo "$magia[identificador]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Marca_agua"); ?></label>
        <div class="col-sm-8">                    
            <input type="marca_agua" name="marca_agua" class="form-control"  id="marca_agua" placeholder="marca_agua" value="<?php echo "$magia[marca_agua]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Valor"); ?></label>
        <div class="col-sm-8">                    
            <input type="valor" name="valor" class="form-control"  id="valor" placeholder="valor" value="<?php echo "$magia[valor]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Solo_lectura"); ?></label>
        <div class="col-sm-8">                    
            <input type="solo_lectura" name="solo_lectura" class="form-control"  id="solo_lectura" placeholder="solo_lectura" value="<?php echo "$magia[solo_lectura]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Obligatorio"); ?></label>
        <div class="col-sm-8">                    
            <input type="obligatorio" name="obligatorio" class="form-control"  id="obligatorio" placeholder="obligatorio" value="<?php echo "$magia[obligatorio]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Seleccionado"); ?></label>
        <div class="col-sm-8">                    
            <input type="seleccionado" name="seleccionado" class="form-control"  id="seleccionado" placeholder="seleccionado" value="<?php echo "$magia[seleccionado]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Desactivado"); ?></label>
        <div class="col-sm-8">                    
            <input type="desactivado" name="desactivado" class="form-control"  id="desactivado" placeholder="desactivado" value="<?php echo "$magia[desactivado]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Orden"); ?></label>
        <div class="col-sm-8">                    
            <input type="orden" name="orden" class="form-control"  id="orden" placeholder="orden" value="<?php echo "$magia[orden]"; ?>" disabled="" >
        </div>	
    </div>
<div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Estatus"); ?></label>
        <div class="col-sm-8">                    
            <input type="estatus" name="estatus" class="form-control"  id="estatus" placeholder="estatus" value="<?php echo "$magia[estatus]"; ?>" disabled="" >
        </div>	
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>

