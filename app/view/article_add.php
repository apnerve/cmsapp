<?php require_once('header.php') ;?>
      <div class="main row">
        <form action="<?php print Helper::url('article/' . $this->type) ;?>" method="post" class="form-stacked">
          <fieldset>
            <legend><?php print ($this->type == 'add') ? 'Add a new article' : 'Edit article' ;?></legend>
            <div class="clearfix">
            	<label>Title</label>
            	<div class="input"><input name="title" value="<?php print ($this->type == 'edit') ? $this->article_data->title : '' ;?>" /></div>
            </div>
            <div class="clearfix">
            	<label>Content</label>
            	<div class="input"><textarea name="content"><?php print ($this->type == 'edit') ? $this->article_data->content : '' ;?></textarea></div>
            </div>
            <div class="actions">
              <input type="hidden" name="filled" value=="true" />
              <input class="btn primary" type="submit" value="publish" />
            </div>
          </fieldset>
        </form>
      </div>
<?php require_once('footer.php') ;?>








