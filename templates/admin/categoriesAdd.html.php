<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h2>Add Category</h2>

      <form class="input-form" action="" method="POST">
        <span><label>Name:</label><input type="text" name="category[name]" required/></span>
        <span><label>Description:</label><input type="text" name="category[description]" required/></span>
        <span><label>Extra Details Column Name:</label><input type="text" name="category[extra_one_name]"/></span>
        <span><label>Extra Details Column Name:</label><input type="text" name="category[extra_two_name]"/></span>
        <span><label>Extra Details Column Name:</label><input type="text" name="category[extra_three_name]"/></span>
        <span><label>Extra Details Column Name:</label><input type="text" name="category[extra_four_name]"/></span>
        <input type="submit" name="submit" value="Add Category" />
      </form>
    </div>
  </div>
</div>
