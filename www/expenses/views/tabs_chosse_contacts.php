

<div>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        
        <li role="presentation" class="active">
            <a href="#new" aria-controls="new" role="tab" data-toggle="tab">
                <?php _t("New") ; ?>
            </a>
        </li>
        
        <li role="presentation"><a href="#all" aria-controls="all" role="tab" data-toggle="tab">
                <?php _t("All") ; ?>
            </a>
        </li>
        
    
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="new">
            <h1><?php _t("New provider"); ?></h1>
            <?php //include view("contacts", "form_contacts_company_add"); ?>
            <?php include view("providers", "form_add"); ?>

        </div>
        <div role="tabpanel" class="tab-pane" id="all">
            <h1><?php _t("Chosse a contact"); ?></h1>
            <?php include "form_add.php"; ?>
        </div>
        
        
    </div>

</div>