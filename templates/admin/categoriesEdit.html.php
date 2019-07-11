<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h2>Update Category</h2>

      <form class="input-form" action="" method="POST">
        <span><input type="hidden" name="user[user_id]" value="<?=$templateVars[1]['category_id']?>" /></span>
        <span><label>Name:</label><input type="text" name="category[name]" required value="<?=$templateVars[1]['name']?>" /></span>
        <span><label>Description:</label><input type="text" name="category[description]" required value="<?=$templateVars[1]['description']?>" /></span>
        <span><label>Extra Details Column Name:</label><input type="text" name="category[extra_one_name]" value="<?=$templateVars[1]['extra_one_name']?>" /></span>
        <span><label>Extra Details Column Name:</label><input type="text" name="category[extra_two_name]" value="<?=$templateVars[1]['extra_two_name']?>" /></span>
        <span><label>Extra Details Column Name:</label><input type="text" name="category[extra_three_name]" value="<?=$templateVars[1]['extra_three_name']?>" /></span>
        <span><label>Extra Details Column Name:</label><input type="text" name="category[extra_four_name]" value="<?=$templateVars[1]['extra_four_name']?>" /></span>
        <input type="submit" name="submit" value="Add Category" />
      </form>
    </div>
  </div>
</div>
