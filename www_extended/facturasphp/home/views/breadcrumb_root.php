

    <ol class="breadcrumb">

        <li><a href="index.php"><?php _t("Home"); ?></a></li>

        <li><a href="index.php?c=<?php echo "$c"; ?>"><?php echo _tr($c); ?></a></li>

        <?php echo ( isset($a) && $a != "index" ) ? '<li class="active">' . _tr($a) . '</li>' : ''; ?>


    </ol>

