<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h1>Artwork</h1>

      <p>
        </br>
      </p>

      <div>
        <h2 class="admin-header" onclick="displayNone(this)">Ready to go to Auction</h2>
        <p>
          </br>
        </p>
        <?php foreach ($templateVars[0] as $category) { ?>
          <div>
            <h3 class="admin-header" onclick="displayNoneSub(this)"><?=$category['name']?></h3>
            <table>
              <thead>
                <tr>
                  <th style="width: 35%">Name</th>
                  <th style="width: 50%">Status</th>
                  <th style="width: 5%">&nbsp;</th>
                  <th style="width: 10%">&nbsp;</th>
                </tr>
                <?php
                $i=0;
                foreach ($templateVars[3] as $artwork) {
                  if ($artwork['category_id'] == $category['id']) {
                    echo '<tr>';
                    echo '<td>' . $artwork['name'] . '</td>';
                    echo '<td>' . $artwork['status'] . '</td>';
                    echo '<td><a style="float: right" href="/admin/artwork/edit?id=' . $artwork['id'] . '">Edit</a></td>';
                    echo '<td><form class="search" method="post" action="/admin/artwork/delete">
                    <input type="hidden" name="id" value="' . $artwork['id'] . '" />
                    <input type="submit" name="submit" value="Delete" />
                    </form></td>';
                    echo '</tr>';
                    $i++;
                  }
                }
                ?>
              </thead>
            </table>
            <p>
              </br>
            </p>
          </div>
        <?php } ?>
      </div>

      <div>
        <h2 class="admin-header" onclick="displayNone(this)">Pending Evaluation</h2>
        <p>
          </br>
        </p>
        <?php foreach ($templateVars[0] as $category) { ?>
          <div>
            <h3 class="admin-header" onclick="displayNoneSub(this)"><?=$category['name']?></h3>
            <table>
              <thead>
                <tr>
                  <th style="width: 35%">Name</th>
                  <th style="width: 50%">Status</th>
                  <th style="width: 5%">&nbsp;</th>
                  <th style="width: 10%">&nbsp;</th>
                </tr>
                <?php
                $i=0;
                foreach ($templateVars[4] as $artwork) {
                  if ($artwork['category_id'] == $category['id']) {
                    echo '<tr>';
                    echo '<td>' . $artwork['name'] . '</td>';
                    echo '<td>' . $artwork['status'] . '</td>';
                    echo '<td><a style="float: right" href="/admin/artwork/edit?id=' . $artwork['id'] . '">Edit</a></td>';
                    echo '<td><form class="search" method="post" action="/admin/artwork/delete">
                    <input type="hidden" name="id" value="' . $artwork['id'] . '" />
                    <input type="submit" name="submit" value="Delete" />
                    </form></td>';
                    echo '</tr>';
                    $i++;
                  }
                }
                ?>
              </thead>
            </table>
            <p>
              </br>
            </p>
          </div>
        <?php } ?>
      </div>


      <div>
        <h2 class="admin-header" onclick="displayNone(this)">Sold</h2>
        <p>
          </br>
        </p>
        <?php foreach ($templateVars[0] as $category) { ?>
          <div>
            <h3 class="admin-header" onclick="displayNoneSub(this)"><?=$category['name']?></h3>
            <table>
              <thead>
                <tr>
                  <th style="width: 35%">Name</th>
                  <th style="width: 50%">Status</th>
                  <th style="width: 5%">&nbsp;</th>
                  <th style="width: 10%">&nbsp;</th>
                </tr>
                <?php
                $i=0;
                foreach ($templateVars[5] as $artwork) {
                  if ($artwork['category_id'] == $category['id']) {
                    echo '<tr>';
                    echo '<td>' . $artwork['name'] . '</td>';
                    echo '<td>' . $artwork['status'] . '</td>';
                    echo '<td><a style="float: right" href="/admin/artwork/edit?id=' . $artwork['id'] . '">Edit</a></td>';
                    echo '<td><form class="search" method="post" action="/admin/artwork/delete">
                    <input type="hidden" name="id" value="' . $artwork['id'] . '" />
                    <input type="submit" name="submit" value="Delete" />
                    </form></td>';
                    echo '</tr>';
                    $i++;
                  }
                }
                ?>
              </thead>
            </table>
            <p>
              </br>
            </p>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</div>
