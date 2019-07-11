<div class="width80">
  <div class="homepage-info">
    <?php
      require 'sidebar.html.php';
    ?>
    <div class="main-text">
      <div class="row" style="height:300px; align-items:flex-start;">
        <div class="art-item-image-container">
          <?php
          for ($i=0; $i<$templateVars[3]['number_of_images']; $i++) {
            if (file_exists('images/artwork/' . $templateVars[3]['artwork_id'] . '[' . $i . '].jpg')) {
              if ($i==0) {
                echo '<a href="/images/artwork/' . $templateVars[3]['artwork_id'] . '[' . $i . '].jpg" class="art-item-image-main"><img src="/images/artwork/' . $templateVars[3]['artwork_id'] . '[' . $i . '].jpg" class="art-item-image-main"/></a>';
              } else {
                echo '<a href="/images/artwork/' . $templateVars[3]['artwork_id'] . '[' . $i . '].jpg" class="art-item-image"><img src="/images/artwork/' . $templateVars[3]['artwork_id'] . '[' . $i . '].jpg" class="art-item-image"/></a>';
              }
            }
          }
          ?>
        </div>

        <div class="art-item-details">
          <h2><?=$templateVars[3]['name']?></h2>
          <p>This item is in <?=$templateVars[3]['category']?> and was made by <?=$templateVars[3]['artist']?>, in <?=$templateVars[3]['year']?></br></br></p>

          <?php
            foreach ($templateVars[0] as $category) {
              if ($category['id'] == $templateVars[3]['category_id']) {
                echo '<p>';
                echo $category['one_desc'].$templateVars[3]['extra_one'].'</br>';
                echo $category['two_desc'].$templateVars[3]['extra_two'].'</br>';
                echo $category['three_desc'].$templateVars[3]['extra_three'].'</br>';
                echo $category['four_desc'].$templateVars[3]['extra_four'].'</br>';
                echo '</p>';
              }
            }
          ?>

          <p>
            Starting Price: £<?=$templateVars[3]['start_amount']?>
          </br>
            Estimated Sale Price: £<?=$templateVars[3]['estimated_amount']?>
          </br>
          </br>
          </p>

          <?php
            if (isset($_SESSION['loggedin'])) {
              ?>
              <form class="search" style="justify-content:flex-start" action="" method="post">
                <label>Amount: (£)</label><input type="text" name="bid[amount]">
                <input type="hidden" name="bid[buyer_id]" value="<?=$_SESSION['id']?>">
                <input type="hidden" name="bid[artwork_id]" value="<?=$_GET['id']?>">
                <input type="submit" name="submit" value="Submit">
              </form>
              <?php
              if (isset($_GET['success'])) {
                echo '</br>Bid of £'.$_GET['success'].' placed successfully!';
              }
            } else {
              echo '<p>Please login to place a commission bid</p>';
            }
          ?>

        </div>
      </div>

      <h2 style="border-top-width:2px; border-top-style: solid; margin-top:15px; padding-top:15px;">Similar items</h2>
      <div class="card-row" style="height:auto; margin-top:10px;">
        <?php
          if (isset($templateVars[4][0])) {
            ?>
            <a href="/artwork/artItem?id=<?=$templateVars[4][0]['id']?>" class="art-card">
              <div class="card-img-container">
                <img src="/images/artwork/<?=$templateVars[4][0]['id']?>[0].jpg" alt="" class="card-img">
              </div>
              <div class="art-card-content">
                <h2 style="margin:5px;"><strong>Name: </strong><?=$templateVars[4][0]['name']?></h2>
                <p>
                  <strong>Starting Bid: </strong>
                  £<?=$templateVars[4][0]['start_price']?>
                </p>
                <p>
                    <?php
                    if ($templateVars[4][0]['auction_id'] != '-1') {
                      echo '<strong>Next Auction: </strong>';
                      // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                      echo 'In: ';
                      echo $templateVars[4][0]['auction_location'];
                      echo ' On: ';
                      echo date('d/m/Y', $templateVars[4][0]['auction_date']);
                      echo ' At: ';
                      echo date('H:i', $templateVars[4][0]['auction_date']);//.'</a>';
                    } else {
                      echo '<strong>Next Auction: </strong>';
                      echo 'No Auction Date Set';
                    }
                    ?>
                </p>
              </div>
              <div class="card-more">
                <button type="button" name="button">View Art Item</button>
              </div>
            </a>
            <?php
          }
        ?>
        <?php
          if (isset($templateVars[4][1])) {
            ?>
            <a href="/artwork/artItem?id=<?=$templateVars[4][1]['id']?>" class="art-card">
              <div class="card-img-container">
                <img src="/images/artwork/<?=$templateVars[4][1]['id']?>[0].jpg" alt="" class="card-img">
              </div>
              <div class="art-card-content">
                <h2 style="margin:5px;"><strong>Name: </strong><?=$templateVars[4][1]['name']?></h2>
                <p>
                  <strong>Starting Bid: </strong>
                  £<?=$templateVars[4][1]['start_price']?>
                </p>
                <p>
                    <?php
                    if ($templateVars[4][1]['auction_id'] != '-1') {
                      echo '<strong>Next Auction: </strong>';
                      // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                      echo 'In: ';
                      echo $templateVars[4][1]['auction_location'];
                      echo ' On: ';
                      echo date('d/m/Y', $templateVars[4][1]['auction_date']);
                      echo ' At: ';
                      echo date('H:i', $templateVars[4][1]['auction_date']);//.'</a>';
                    } else {
                      echo '<strong>Next Auction: </strong>';
                      echo 'No Auction Date Set';
                    }
                    ?>
                </p>
              </div>
              <div class="card-more">
                <button type="button" name="button">View Art Item</button>
              </div>
            </a>
            <?php
          }
        ?>
        <?php
          if (isset($templateVars[4][2])) {
            ?>
            <a href="/artwork/artItem?id=<?=$templateVars[4][2]['id']?>" class="art-card">
              <div class="card-img-container">
                <img src="/images/artwork/<?=$templateVars[4][2]['id']?>[0].jpg" alt="" class="card-img">
              </div>
              <div class="art-card-content">
                <h2 style="margin:5px;"><strong>Name: </strong><?=$templateVars[4][2]['name']?></h2>
                <p>
                  <strong>Starting Bid: </strong>
                  £<?=$templateVars[4][2]['start_price']?>
                </p>
                <p>
                    <?php
                    if ($templateVars[4][2]['auction_id'] != '-1') {
                      echo '<strong>Next Auction: </strong>';
                      // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                      echo 'In: ';
                      echo $templateVars[4][2]['auction_location'];
                      echo ' On: ';
                      echo date('d/m/Y', $templateVars[4][2]['auction_date']);
                      echo ' At: ';
                      echo date('H:i', $templateVars[4][2]['auction_date']);//.'</a>';
                    } else {
                      echo '<strong>Next Auction: </strong>';
                      echo 'No Auction Date Set';
                    }
                    ?>
                </p>
              </div>
              <div class="card-more">
                <button type="button" name="button">View Art Item</button>
              </div>
            </a>
            <?php
          }
        ?>

      </div>
    </div>
  </div>
</div>
