<?php require_once('header.php') ;?>
  <div class="main row">
    <h1>Articles so far</h1>
    
    <?php if($this->list) :?>
    <table class="zebra-striped">
      <thead>
      	<tr>
      		<th>Title</th>
      		<?php if (isset($_SESSION['isLoggedIn'])){ ?><th>Action</th><?php } ?>
      	</tr>
      </thead>
      <tbody>
        <?php foreach($this->list as $month) :?>
        <tr>
      		<td><a href="<?php print Helper::url('article/browse/' . 'timewise',$month['time1']) ;?>"><?php print $month ;?></a></td>
      		
      	</tr>
        <?php endforeach ;?>
      </tbody>
    </table>
    <?php else: ?>
    <p class="alert-message danger">No archive found.</p>
    <?php if (isset($_SESSION['isLoggedIn'])) { ?><p><a href="<?php print Helper::url('article/add') ;?>" class="btn primary">Add a new article</a></p><?php } ?>
    <?php endif ;?>
    
  </div>
<?php require_once('footer.php') ;?>