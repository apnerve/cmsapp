<?php

class Article extends Controller {
  var $article;
  function __construct() {
    
    $this->article = Load::model('article_model');
  }
  
  function index() {
    $this->browse();
  }
  
  function browse() {
    $article_list = $this->article->browse(10);
    $data = array(
      'title' => 'article listing',
      'list' => $article_list
    );
    Load::view('article_listing.php',$data);
  }
  
  function view($id) {
    if($this->article->read($id)) {
      $data = array(
        'article' => $this->article->read($id),
        'title' => 'All articles' 
      );
      Load::view('article_read.php', $data);
    }
    else parent::error();
  }
  
  function edit($id) {
    if(isset($_POST['filled'])) {
      $result = $this->article->edit($id, $_POST['title'], $_POST['content']);
      $notice['message'] = ($result) ? 'Article edited successfully' : 'Article could not be edited' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
      $data = array(
        'title' => 'Article success',
        'notice' => array(
          'type' => $notice['type'],
          'message' => $notice['message']
        )
      );
      Load::view('notice.php', $data);
    }
    else {
      $article_data = $this->article->read($id);
      $data = array(
        'title' => 'Edit article',
        'type' => 'edit',
        'article_data' => $article_data
      );
      Load::view('article_add.php', $data);
    }
  }
  
  function add() {
    if(isset($_POST['filled'])) {
      $result = $this->article->add($_POST['title'], $_POST['content']);
      $notice['message'] = ($result) ? 'Article <b>' . $_POST['title'] . '</b> was added successfully' : 'Article couldn\'t be added' ;
      $notice['type'] = ($result) ? 'success' : 'danger';
      $data = array(
        'title' => 'All articles',
        'notice' => array(
          'type' => $notice['type'],
          'message' => $notice['message']
        )
      );
      Load::view('notice.php', $data);
    }
    else {
      $data = array(
        'title' => 'Add new article',
        'type' => 'add',
        'article_data' => NULL
      );
      Load::view('article_add.php', $data);
    }
  }
  
  function delete($id) {
    $article_title = $this->article->getArticleTitleById($id);
    $result = ($this->article->delete($id)) ? 'Article <b>' . $article_title . '</b> deleted' : 'Error deleting the article';
    $data = array(
      'title' => 'All articles',
      'notice' => array(
        'type' => 'success',
        'message' => $result
      )
    );
    
    Load::view('notice.php', $data);
  }
}
