<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h1>Categories</h1>

      <a class="new" href="/admin/category/add">Add new category</a>

      <p>
        </br>
      </p>

      <table>
        <thead>
          <tr>
            <th style="width: 35%">Name</th>
            <th style="width: 50%">Description</th>
            <th style="width: 5%">&nbsp;</th>
            <th style="width: 10%">&nbsp;</th>
          </tr>
          <?php
          $i=0;
          foreach ($templateVars as $category) {
            echo '<tr>';
            echo '<td>' . $category['name'] . '</td>';
            echo '<td>' . $category['description'] . '</td>';
            echo '<td><a style="float: right" href="/admin/category/edit?id=' . $category['id'] . '">Edit</a></td>';
            echo '<td><form class="search" method="post" action="/admin/category/delete">
            <input type="hidden" name="id" value="' . $category['id'] . '" />
            <input type="submit" name="submit" value="Delete" />
            </form></td>';
            echo '</tr>';
            $i++;
          }
          ?>
        </thead>
      </table>
    </div>
  </div>
</div>
