
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "expenses") ; ?>
        <?php echo _t("Have to pay") ; ?>
    </a>
    <a href="index.php?c=expenses" class="list-group-item"><?php _t("Past bills") ; ?></a>
    <a href="index.php?c=expenses" class="list-group-item"><?php _t("Today") ; ?></a>
    <a href="index.php?c=expenses&a=add" class="list-group-item"><?php _t("Next 3 days") ; ?></a>
    <a href="index.php?c=expenses&a=add" class="list-group-item"><?php _t("Next 7 days") ; ?></a>
    <a href="index.php?c=expenses&a=add" class="list-group-item"><?php _t("Next 15 days") ; ?></a>
    <a href="index.php?c=expenses&a=add1" class="list-group-item"><?php _t("Next month") ; ?></a>           
    <a href="index.php?c=expenses&a=cal" class="list-group-item"><?php _t("Cal") ; ?></a>           
</div>

<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "expenses") ; ?>
        <?php echo _t("Expenses") ; ?>
    </a>
    <a href="index.php?c=expenses" class="list-group-item"><?php _t("List") ; ?></a>
    <a href="index.php?c=expenses&a=add" class="list-group-item"><?php _t("Add") ; ?></a>
    <a href="index.php?c=expenses&a=add1" class="list-group-item"><?php _t("Add1") ; ?></a>
    
    <a class="list-group-item"  data-toggle="modal" data-target="#myModal">
        <span class="glyphicon glyphicon-file"></span>
        Add from PDF
    </a>        
        <a href="index.php?c=expenses&a=add1" class="list-group-item">
        <span class="glyphicon glyphicon-picture"></span>
        Add from foto
    </a>        
    <a href="index.php?c=expenses&a=add1" class="list-group-item">
        <span class="glyphicon glyphicon-print"></span>
        Add from Scan
    </a>            
</div>

<div class="panel panel-primary">
    <div class="panel-heading">
        <?php _menu_icon("top" , "budgets") ; ?>
        <?php echo _t("Search") ; ?>
    </div>
    <div class="panel-body">
        <?php include "form_search_by_office.php" ; ?>
    </div>
</div>






<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top" , "expenses") ; ?>
        <?php echo _t("Expenses") ; ?>
    </a>

    <?php foreach ( expense_status_list_e() as $status ) { ?>
        <a href="index.php?c=expenses&a=search&w=byCode&code=<?php echo $status['code'] ?>" class="list-group-item"><?php _t($status['status']) ; ?> 
            <span class="badge"><?php echo (expenses_total_by_status($status['code'])) ? expenses_total_by_status($status['code']) : "" ; ?></span>
        </a>
    <?php } ?>


</div>








<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        
          
          
          
          <h1>Send invoice </h1>
        
        
        
        
          <form method="get" action="index.php">
              
              <input type="hidden" name="c" value="expenses">
              <input type="hidden" name="a" value="details">
              <input type="hidden" name="id" value="1">
                    
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Select file in you coputer.</p>
  </div>
            

            
            
            
  <button type="submit" class="btn btn-default">Submit</button>
</form>
        
        
        
        
        
        
        
      </div>
        
        
        

        
        
        
        
    </div>
  </div>
</div>