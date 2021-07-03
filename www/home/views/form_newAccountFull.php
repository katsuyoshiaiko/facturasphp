<form method="post" action="index.php">
        <input type="hidden" name="c" value="home">
    <input type="hidden" name="a" value="ok_newAccount">
    
    
    
    
    <p class="text-center">
    <?php logo(200, "img-responsive"); ?>
    </p>
    
    <h2 class="form-signin-heading text-center"><?php _t("Orders on line"); ?></h2>
    
    
    
    
  <div class="form-group">
    <label for="exampleInputEmail1"><?php _t("Company name"); ?></label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
    
    
    
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
    
    
    
  <div class="form-group">
    <label for="exampleInputFile">File input</label>
    <input type="file" id="exampleInputFile">
    <p class="help-block">Example block-level help text here.</p>
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox"> Check me out
    </label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>