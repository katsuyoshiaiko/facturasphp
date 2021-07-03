<form class="form-horizontal" action ="index.php" method="post" >
    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="add_contact">
    <input type="hidden" name="owner_id" value="<?php echo $id; ?>">



    <div class="form-group">
        <label class="control-label col-sm-2" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <select class="selectpicker" data-live-search="true" name="title" id="title">
                <?php
                foreach (contacts_titles() as $title) {
                    echo "<option value=\"$title\" >"._tr($title)."</option>\n";
                }
                ?>
            </select>
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input class="form-control" type ="text " name ="name" id="name"/>
        </div>
    </div>



    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">
            <input class="form-control" type ="text " name ="lastname" id="lastname"/>
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">


            <div class="row">

                <div class="col-xs-2">
                    <select class="form-control" name="day">
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            echo "<option value=\"$i\">$i</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="col-xs-3">
                    <select class="form-control" name="month">
                        <?php
                        for ($i = 1; $i <= 12; $i++) {
                            echo "<option value=\"$i\">$i " . _tr($months[$i]) . "</option>";
                        }
                        ?>

                    </select>
                </div>
                <div class="col-xs-4">
                    <select class="form-control" name="year">
                        <?php
                        for ($i = 1900; $i <= date("Y"); $i++) {
                            echo "<option value=\"$i\">$i</option>";
                        }
                        ?>

                    </select>
                </div>
            </div>


        </div>
    </div>

    <div class="form-group">
        <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
    </div>

</form>


