<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h1>Auctions</h1>

      <a class="new" href="/admin/auction/add">Add new auction</a>

      <p>
        </br>
      </p>

      <h2>Upcoming</h2>

      <table>
        <thead>
          <tr>
            <th style="width: 20%">Date</th>
            <th style="width: 15%">Time</th>
            <th style="width: 50%">Location</th>
            <th style="width: 5%">&nbsp;</th>
            <th style="width: 10%">&nbsp;</th>
          </tr>
          <?php
          $i=0;
          foreach ($templateVars[0] as $auction) {
            echo '<tr>';
            echo '<td>' . date('d/m/Y', $auction['date']) . '</td>';
            echo '<td>' . date('H:i', $auction['date']) . '</td>';
            echo '<td>' . $auction['location'] . '</td>';
            echo '<td><a style="float: right" href="/admin/auction/edit?id=' . $auction['id'] . '">Edit</a></td>';
            echo '<td><form class="search" method="post" action="/admin/auction/delete">
            <input type="hidden" name="id" value="' . $auction['id'] . '" />
            <input type="submit" name="submit" value="Delete" />
            </form></td>';
            echo '</tr>';
            $i++;
          }
          ?>
        </thead>
      </table>

      </br>
      <h2>Previous</h2>

      <table>
        <thead>
          <tr>
            <th style="width: 20%">Date</th>
            <th style="width: 15%">Time</th>
            <th style="width: 50%">Location</th>
            <th style="width: 5%">&nbsp;</th>
            <th style="width: 10%">&nbsp;</th>
          </tr>
          <?php
          $i=0;
          foreach ($templateVars[1] as $auction) {
            echo '<tr>';
            echo '<td>' . date('d/m/Y', $auction['date']) . '</td>';
            echo '<td>' . date('H:i', $auction['date']) . '</td>';
            echo '<td>' . $auction['location'] . '</td>';
            echo '<td><a style="float: right" href="/admin/auction/edit?id=' . $auction['id'] . '">Edit</a></td>';
            echo '<td><form class="search" method="post" action="/admin/auction/delete">
            <input type="hidden" name="id" value="' . $auction['id'] . '" />
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
