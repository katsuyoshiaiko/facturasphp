
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#commentsUpdate">
    <?php echo _t("Add comments"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="commentsUpdate" tabindex="-1" role="dialog" aria-labelledby="commentsUpdateLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="commentsUpdateLabel">
                    <?php echo _t("Comments"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php
                include "formCommentsUpdate.php";
                ?>
            </div>
            <div class="modal-footer">


            </div>
        </div>
    </div>
</div>