<?php

class User extends Controller {
  
  function __construct() {

	 
    $this->user = Load::model('user_model');
/* 	  if (Session::timeOut())
	 Helper::redirect('user/logout');
	 else
	 Session::set($_SESSION['time'],time()); */
	//$usr=new User();
  }
  
   function index() {
    //Session::setFlashMessage('hello');
  }
  
  function login() {
    if(isset($_POST['login'])) {
      $row = $this->user->ifloggedin($_POST['username'], $_POST['password']);
      if ($row) {
        Session::set('isLoggedIn',TRUE);
		Session::set('username',$_POST['username']);
		Session::set('designation',$row['designation']);
		Session::set('time',time());
    Helper::redirect('article');
      }
      else {
        echo 'Login failed';
      }
    }
    else{
	$data['title'] = 'Login';
	Load::view('login.php',$data);
    }
  }
  
  function logout() {
    Session::clear('isLoggedIn');
	Session::clear('username');
	Session::clear('designation');
	Session::clear('time');
	Helper::redirect('user/login');
  }
  
  function browse() {
    $userlist = $this->user->browse(10);
    $data = array(
      'title' => 'list of users',
      'list' => $userlist
    );
    Load::view('user_list.php',$data);
  }
  
  public function add_user()
  {
  if ($_POST['addednew'])
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
  
  public function del_user($id)
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
  
  public function edit($id)
  {
  $result=$this->user->edit($id);
    $userlist=$this->user->browse();
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

public function changepwd()
{
  if ($_POST['changesubmitted'])
  {
  $result=$this->user->changepwd($_SESSION['username'],$_POST['oldpwd'],$_POST['newpwd']);
  $val = ($result) ? 'Password changed successfully' : 'Password could not be changed' ;
      Session::setFlashMessage($val);
	  if ($result)
	  Helper::redirect('user/logout');
	  else
  {
  $userlist=$this->user->browse();
  $data = array(
      'title' => 'list of users',
      'list' => $userlist,
	  );
Load::view('user_list.php',$data); //make a notice page for Password Changed
}
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
