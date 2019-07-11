<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h1>Users</h1>
      </br>

      <a class="new" href="/admin/user/add">Add new user</a>
      </br>
      </br>
      <div>
        <h2 class="admin-header" onclick="displayNoneSub(this)">Admins</h2>
        <table>
          <thead>
            <tr>
              <th style="width: 35%">Name</th>
              <th style="width: 20%">Username</th>
              <th style="width: 10%">Account Type</th>
              <th style="width: 20%">Account Creation Date</th>
              <th style="width: 5%">&nbsp;</th>
              <th style="width: 10%">&nbsp;</th>
            </tr>
            <?php
              $i=0;
              foreach ($templateVars[1] as $user) {
                if ($user['account'] == 'Admin') {
                  echo '<tr>';
                  echo '<td>' . $user['name'] . '</td>';
                  echo '<td>' . $user['username'] . '</td>';
                  echo '<td>' . $user['account'] . '</td>';
                  echo '<td>' . $user['creation'] . '</td>';
                  echo '<td><a style="float: right" href="/admin/user/edit?id=' . $user['id'] . '">Edit</a></td>';
                  if ($user['id'] != 1 && $user['id'] != $_SESSION['id']) {
                    echo '<td><form class="search" method="post" action="/admin/user/delete">
                    <input type="hidden" name="id" value="' . $user['id'] . '" />
                    <input type="submit" name="submit" value="Delete" />
                    </form></td>';
                  } else {
                    echo '<td></td>';
                  }
                  echo '</tr>';
                  $i++;
                }
              }
              if ($i==0) {
                echo '<tr>';
                echo '<td>No Users in this Category</td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
              }
            ?>
          </thead>
        </table>
      </div>

      </br>
      <div>
        <h2 class="admin-header" onclick="displayNoneSub(this)">Sellers</h2>
        <table>
          <thead>
            <tr>
              <th style="width: 35%">Name</th>
              <th style="width: 20%">Username</th>
              <th style="width: 10%">Account Type</th>
              <th style="width: 20%">Account Creation Date</th>
              <th style="width: 5%">&nbsp;</th>
              <th style="width: 10%">&nbsp;</th>
            </tr>
            <?php
              $i=0;
              foreach ($templateVars[1] as $user) {
                if ($user['account'] == 'Seller') {
                  echo '<tr>';
                  echo '<td>' . $user['name'] . '</td>';
                  echo '<td>' . $user['username'] . '</td>';
                  echo '<td>' . $user['account'] . '</td>';
                  echo '<td>' . $user['creation'] . '</td>';
                  echo '<td><a style="float: right" href="/admin/user/edit?id=' . $user['id'] . '">Edit</a></td>';
                  if ($user['id'] != 1 && $user['id'] != $_SESSION['id']) {
                    echo '<td><form class="search" method="post" action="/admin/user/delete">
                    <input type="hidden" name="id" value="' . $user['id'] . '" />
                    <input type="submit" name="submit" value="Delete" />
                    </form></td>';
                  } else {
                    echo '<td></td>';
                  }
                  echo '</tr>';
                  $i++;
                }
              }
              if ($i==0) {
                echo '<tr>';
                echo '<td>No Users in this Category</td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
              }
            ?>
          </thead>
        </table>
      </div>

      </br>
      <div>
        <h2 class="admin-header" onclick="displayNoneSub(this)">Buyers</h2>
        <table>
          <thead>
            <tr>
              <th style="width: 35%">Name</th>
              <th style="width: 20%">Username</th>
              <th style="width: 10%">Account Type</th>
              <th style="width: 20%">Account Creation Date</th>
              <th style="width: 5%">&nbsp;</th>
              <th style="width: 10%">&nbsp;</th>
            </tr>
            <?php
              $i=0;
              foreach ($templateVars[1] as $user) {
                if ($user['account'] == 'Buyer') {
                  echo '<tr>';
                  echo '<td>' . $user['name'] . '</td>';
                  echo '<td>' . $user['username'] . '</td>';
                  echo '<td>' . $user['account'] . '</td>';
                  echo '<td>' . $user['creation'] . '</td>';
                  echo '<td><a style="float: right" href="/admin/user/edit?id=' . $user['id'] . '">Edit</a></td>';
                  if ($user['id'] != 1 && $user['id'] != $_SESSION['id']) {
                    echo '<td><form class="search" method="post" action="/admin/user/delete">
                    <input type="hidden" name="id" value="' . $user['id'] . '" />
                    <input type="submit" name="submit" value="Delete" />
                    </form></td>';
                  } else {
                    echo '<td></td>';
                  }
                  echo '</tr>';
                  $i++;
                }
              }
              if ($i==0) {
                echo '<tr>';
                echo '<td>No Users in this Category</td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '</tr>';
              }
            ?>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
