<?php require_once('header.php') ;?>
      <div class="main row">
        <form action="<?php print Helper::url('user/add_user');?>" method="post" class="form-stacked">
          <fieldset>
            <legend>Add a new user</legend>
            <div class="clearfix">
            	<label>Username</label>
            	<div class="input"><input name="username"/></div>
            </div>
			<div class="clearfix">
            	<label>Password</label>
            	<div class="input"><input name="password" type="password"/></div>
            </div>
            <div class="clearfix">
            	<label>Firstname</label>
            	<div class="input"><input name="firstname"/></div>
            </div>
			<div class="clearfix">
            	<label>Lastname</label>
            	<div class="input"><input name="lastname"/></div>
            </div>
			
            <div class="actions">
              <input type="hidden" name="addednew" value=="true" />
              <input class="btn primary" type="submit" value="Add" />
            </div>
          </fieldset>
        </form>
      </div>
<?php require_once('footer.php') ;?>








