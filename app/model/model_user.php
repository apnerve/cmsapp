<?php

class User_model {
  
  var $con;
  
  function __construct() {
    $this->$con = new DatabaseConn();
  }
  
  public static function browse() {
  $i=0;
  $result=NULL;
  $rows=$this->$con->queryexec('Select * from cmsusers');
  while($row=$this->$con->fetchArray($rows)){
  $result[$i]=$row;
  $i++;
  }
  return $result;
  }
  
  public static function read($user_id) {
  return mysql_fetch_object($this->con->queryexec('SELECT user,firstname,lastname FROM cmsusers WHERE ID = '.$user_id));
  }
  
  public static function edit($user_id) {
  return $this->$con->queryexec('UPDATE cmsusers SET user="'.$_POST[$username].'",firstname="'.$_POST[$firstname].'",lastname="'.$_POST[$lastname].'"where ID="'.$user_id.'"');

  }
  
  public static function add($username, $password, $firstname, $lastname) {
    $rows=$this->$con->queryexec("INSERT INTO cmsusers (user,pass,firstname,lastname) VALUES (". "'".$username."'".", ".
"PASSWORD('".$password."')".",'".$firstname."','".$lastname."')");
return $rows;
  }
  
  public static function delete($user_id) {
    return $this->con->queryexec('DELETE FROM cmsusers WHERE ID = '.$user_id);
  }
  
  public static function changepwd($username, $oldpassword, $newpassword) {
  return $this->con->queryexec("UPDATE cmsusers SET pass=PASSWORD('".$newpassword."') where user='".$username."' and pass='".$oldpassword."'");
  }
  
  public static function ifloggedin($us,$pa)
  {
  $rows = $this->$con->queryexec("SELECT * FROM cmsusers WHERE user = '".$us."' AND pass = '".$pa."'");
  if ($this->$con->getNumRows($rows) > 0)
  {
  $row=$this->$con->fetchArray($rows);
  return $row;
  }
  else
  return false;
  }
  
}