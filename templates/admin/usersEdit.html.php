<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h2>Update User</h2>

      <form class="input-form" action="" method="POST">
        <input type="hidden" name="user[user_id]" value="<?=$templateVars[1]['user_id']?>" />
        <span><label>First Name:</label><input type="text" name="user[first_name]" value="<?=$templateVars[1]['first_name']?>" required/></span>
        <span><label>Surname:</label><input type="text" name="user[surname]" value="<?=$templateVars[1]['surname']?>" required/></span>
        <span><label>Username:</label><input type="text" name="user[username]" value="<?=$templateVars[1]['username']?>" required/></span>
        <span><label>Password:</label><input type="password" name="user[password]" required/></span>

        <span>
          <label>Account Type:</label><select name="user[account_type]" required>
            <option value="Admin" <?php if ($templateVars[1]['account_type'] == 'Admin') echo 'selected' ?>>Admin</option>
            <option value="Buyer" <?php if ($templateVars[1]['account_type'] == 'Buyer') echo 'selected' ?>>Buyer</option>
            <option value="Seller" <?php if ($templateVars[1]['account_type'] == 'Seller') echo 'selected' ?>>Seller</option>
          </select>
        </span>


        <input type="hidden" name="user[account_creation]" value="<?=$templateVars[1]['account_creation']?>"/>
        <input type="submit" name="submit" value="Update User" />

      </form>
    </div>
  </div>
</div>
