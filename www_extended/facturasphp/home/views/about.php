<?php include view("home", "header"); ?>



<div class="container-fluid">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">

        <h1><?php _t("About"); ?></h1>

        <p><?php _t("Developed with"); ?>: Coello</p>
        <p><?php _t("Version"); ?>: web-2.0.2</p>
        <p><?php _t("By"); ?>: Róbinson Coello S.</p>
        <p><?php _t("Url"); ?>: <a href="http://coello.be" target="coello">http://coello.be</a></p>
        <p><?php _t("Theme"); ?>: <?php echo $config_theme; ?></p>
        <p><?php _t("Doc"); ?>: <?php echo _options_option("doc_model");?></p>

    </div>
    <div class="col-lg-3"></div>
</div>


<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#dontClick">
<?php _t("Dont click here"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="dontClick" tabindex="-1" role="dialog" aria-labelledby="dontClickLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="dontClickLabel">Factux</h4>
            </div>
            <div class="modal-body">

                <iframe width="560" height="315" src="https://www.youtube.com/embed/i0f_LSP_agA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>




<?php include view("home", "footer"); ?>