<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h1>Artwork</h1>
      <h2>Pending Evaluation</h2>
      <p>
        </br>
      </p>
      <?php foreach ($templateVars[0] as $category) { ?>
        <h3><?=$category['name']?></h3>
        <table>
          <thead>
            <tr>
              <th style="width: 30%">Name</th>
              <th style="width: 25%">Status</th>
              <th style="width: 45%">&nbsp;</th>
            </tr>
            <?php
            $i=0;
            foreach ($templateVars[3] as $artwork) {
              if ($artwork['category_id'] == $category['id']) {
                echo '<tr>';
                echo '<td>' . $artwork['name'] . '</td>';
                echo '<td>' . $artwork['status'] . '</td>';
                echo '<td><form class="search" method="post" action="">
                <input type="hidden" name="art[artwork_id]" value="' . $artwork['id'] . '" />
                <input type="hidden" name="art[status]" value="Ready" />
                <input type="hidden" name="art[valuation_date]" value="'.date('Y-m-d').'" />
                <input type="hidden" name="art[valuation_by]" value="'.$_SESSION['id'].'" />
                <label>Bid Start Price:</label><input type="text" name="art[start_amount]" />
                <label>Estimated Value:</label><input type="text" name="art[estimated_amount]" />
                <input type="submit" name="submit" value="Submit Valuation" />
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
      <?php } ?>
    </div>
  </div>
</div>
