<?php require_once('header.php') ;?>
  <div class="main row">
    <h1>article listing</h1>
    
    <?php if($this->list) :?>
    <table class="zebra-striped">
      <thead>
      	<tr>
      		<th>Title</th>
      		<th>Action</th>
      	</tr>
      </thead>
      <tbody>
        <?php foreach($this->list as $article) :?>
        <tr>
      		<td><a href="<?php print Helper::url('article/view/' . $article['ID']) ;?>"><?php print $article['title'] ;?></a></td>
      		<td><a href="<?php print Helper::url('article/edit/' . $article['ID']) ;?>" class="btn info">Edit</a> <a href="<?php print Helper::url('article/delete/' . $article['ID']) ;?>" class="btn danger">Delete</a></td>
      	</tr>
        <?php endforeach ;?>
      </tbody>
    </table>
    <p>
      <?php print Helper::link('article/add', 'Add new article', array('class' => 'btn primary')) ;?>
    </p>
    <?php else: ?>
    <p class="alert-message danger">No articles found.</p>
    <p><a href="<?php print Helper::url('article/add') ;?>" class="btn primary">Add a new article</a></p>
    <?php endif ;?>
    
  </div>
<?php require_once('footer.php') ;?>