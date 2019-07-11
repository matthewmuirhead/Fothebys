<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h2>Add User</h2>

      <form class="input-form" action="" method="POST">
        <span><label>First Name:</label><input type="text" name="user[first_name]" required/></span>
        <span><label>Surname:</label><input type="text" name="user[surname]" required/></span>
        <span><label>Username:</label><input type="text" name="user[username]" required/></span>
        <span><label>Password:</label><input type="password" name="user[password]" required/></span>

        <span>
          <label>Account Type:</label><select name="user[account_type]" required>
            <option value="Admin">Admin</option>
            <option value="Buyer" selected>Buyer</option>
            <option value="Seller" selected>Seller</option>
          </select>
        </span>


        <input type="hidden" name="user[account_creation]" value="<?=date('Y-m-d')?>"/>
        <input type="submit" name="submit" value="Add User" />

      </form>
    </div>
  </div>
</div>
