require_once('header.php') ;?>
      <div class="main row">
        <form action="<?php print Helper::url('user/login');?>" method="post" class="form-stacked">
      <table width="25%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#C7BEBC">
  <tr>
    <td align="center" bgcolor="#C7BEBC"><font color="000000" size="2" face="Verdana, Arial, Helvetica, sans-serif"><strong>Login</strong></font></td>
  </tr>
  <tr>
    <td bordercolor="#FFFFFF"><form name="login" method="post" action="<?php print Helper::url('user/login');?>">
        <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><br>
&nbsp;Username:
          <input type="text" name="user">
        </font></p>
        <p><font size="2" face="Verdana, Arial, Helvetica, sans-serif">&nbsp;Password:
              <input type="password" name="pass">
        </font></p>
        <p align="center"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">
          <input type="submit" name="Submit2" value="Login">
        </font></p>
      </form>
        <div align="right"><font size="2" face="Verdana, Arial, Helvetica, sans-serif"><<a href="<?php print Helper::url('user/logout');?>" class="btn primary">Logout</a>&nbsp;</font></div>
    </td>
  </tr>
</table>
        </form>
      </div>
<?php require_once('footer.php') ;?>