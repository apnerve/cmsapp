<?php require_once('header.php') ;?>
<script language="javascript">
function edit(d)
{
document.forms['frm'].elements['txtusername'+d].disabled=false;
document.forms['frm'].elements['txtfirstname'+d].disabled=false;
document.forms['frm'].elements['txtlastname'+d].disabled=false;
document.forms['frm'].elements['btnupdate'+d].disabled=false;
document.forms['frm'].elements['btnedit'+d].disabled=true;
id1=d;
}

function update(d)
{
document.forms['frm'].elements['txtusername'+d].disabled=true;
document.forms['frm'].elements['txtfirstname'+d].disabled=true;
document.forms['frm'].elements['txtlastname'+d].disabled=true;
document.forms['frm'].elements['btnupdate'+d].disabled=true;
document.forms['frm'].elements['btnedit'+d].disabled=false;
id1=d;
}
</script>
  <div class="main row">
    <h1>article listing</h1>
  <p class="alert-message"><?php print Session::getFlashMessage(); ?></p>
    <?php if ($this->list) :?>
    <table class="zebra-striped">
      <thead>
      	<tr>
      		<th>Username</th>
			<th>First Name</th>
			<th>Last Name</th>
      		<th>Operations</th>
      	</tr>
      </thead>
      <tbody>
        <?php foreach($this->list as $userlist) :?>
        <tr>
      		<td><input type="text" disabled="true" name="txtusername<?php echo $userlist['ID'];?>" id="<?php echo $userlist['ID']; ?>" value="<?php echo $userlist['user'];?>"></td>
<td><input type="text" disabled="true" name="txtfirstname<?php echo $userlist['ID'];?>" id="<?php echo $userlist['ID']; ?>" value="<?php echo $userlist['firstname'];?>"></td>
<td><input type="text" disabled="true" name="txtlastname<?php echo $userlist['ID'];?>" id="<?php echo $userlist['ID']; ?>" value="<?php echo $userlist['lastname'];?>"></td>
<td><input type="button" name= "btnedit<?php echo $userlist['ID'];?>" value="Edit" id="<?php echo $userlist['ID']; ?>" onclick="edit(<?php echo $userlist['ID'];?>)">
<a href="<?php print Helper::url('user/edit/' . $userlist['ID']) ;?>"><input name= "btnupdate<?php echo $userlist['ID'];?>" class="btn primary" disabled="true" value="Update" id="<?php echo $userlist['ID'];?>" onclick="update("<?php echo $userlist['ID'];?>");"></a>
<a href="<?php print Helper::url('user/del_user/' . $userlist['ID']) ;?>" class="btn danger">Delete</a>
      	</tr>
        <?php endforeach ;?>
      </tbody>
    </table>
    <p>
      <?php print Helper::link('user/add_user', 'Add a new user', array('class' => 'btn primary')) ;?>
    </p>
    <?php else: ?>
    <p class="alert-message danger">No users found.</p>
    <p><a href="<?php print Helper::url('user/add_user');?>" class="btn primary">Add a new user</a></p>
    <?php endif ;?>
    
  </div>
<?php require_once('footer.php') ;?>