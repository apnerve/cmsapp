<?php

class User extends Controller {
  
  function __construct() {
    $this->user = Load::model('model_user');
  }
  
   function index() {
    Session::setFlashMessage('hello');
  }
  
  function danda() {
    echo Session::getFlashMessage();
  }
  
  function login() {
    if(isset($_POST['login'])) {
      $row = $this->user->ifloggedin($_POST['username'], $_POST['password']);
      if ($row) {
        Session::set('isLoggedIn',TRUE);
		Session::set('username',$_POST['username']);
		Session::set('designation',$row['designation']);
		//how to directly call the browse function from the controller article file to fetch data (not from model, from controller)
		Load::view('article_listing.php');
      }
      else {
        echo 'Login failed';
      }
    }
    else
	Load::view('login.php',NULL);;
  }
  
  function logout() {
    Session::clear('isLoggedIn');
  }
  
  public static function add_user()
  {
  if ($_POST('addednew'))
  {
  $result=$this->user->add($_POST['username'],$_POST['password'],$_POST['firstname'],$_POST['lastname']);
  $notice['message'] = ($result) ? 'New user added' : 'There was a problem adding the user to the database' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
  $userlist=$this->user->browse();
  $data = array(
      'title' => 'list of users',
      'list' => $userlist,
	  'notice' => array(
          'type' => $notice['type'],
          'message' => $notice['message'])
    );

    Load::view('user_list.php',$data);
  }
  
  else
  {
   $data = array(
        'title' => 'Add new user',
        'userdata' => NULL
      );
      Load::view('user_add.php', $data);
  }
  }
  
  public static function del_user($id)
  {
  $result=$this->user->delete($id);
  $notice['message'] = ($result) ? 'User deleted' : 'There was a problem deleting the user' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
  $data = array(
      'title' => 'list of users',
      'list' => $userlist,
	  'notice' => array(
          'type' => $notice['type'],
          'message' => $notice['message'])
    );
	Load::view('user_list.php',$data);
  }
  
  public static function edit($id)
  {
  $result=$this->user->edit($id);
  $notice['message'] = ($result) ? 'User details updated' : 'There was a problem updating the details of the user' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
  $data = array(
      'title' => 'list of users',
      'list' => $userlist,
	  'notice' => array(
          'type' => $notice['type'],
          'message' => $notice['message'])
    );
	Load::view('user_list.php',$data);
  }

public static function changepwd()
{
  if ($_POST('changesubmitted'))
  {
  $result=$this->user->changepwd($_SESSION['username'],$_POST['oldpwd'],$_POST['newpwd']);
  $notice['message'] = ($result) ? 'Password changed successfully' : 'Password could not be changed' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
  $userlist=$this->user->browse();
  $data = array(
      'title' => 'list of users',
      'list' => $userlist,
	  'notice' => array(
          'type' => $notice['type'],
          'message' => $notice['message'])
    );

    Load::view('user_list.php',$data);
  }
  
  else
  {
   $data = array(
        'title' => 'Change password',
        'data' => NULL
      );
      Load::view('change_password.php', $data);
  }
  }  
}
