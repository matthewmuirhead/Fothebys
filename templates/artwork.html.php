<div class="width80">
  <?php
  if (isset($_GET['category'])) {
    echo '<h1 style="margin:1em;">All Artwork Pieces in '.$templateVars[4].'</h1>';
  } else if (isset($_GET['artist'])) {
    echo '<h1 style="margin:1em;">All Artwork Pieces made by '.$_GET['artist'].' sorted by Category </h1>';
  } else {
    echo '<h1 style="margin:1em;">All Artwork Pieces sorted by Category</h1>';
  }
  ?>

  <div class="scrolling-img">
    <div class="wrap2">
      <div class="group">
        <input type="radio" class="slide" name="test" id="0" value="0" checked="">
        <label for="2" class="previous">&lt;</label>
        <label for="1" class="next">&gt;</label>
        <div class="content">
          <a href=""><img src="images/banners/img1.jpg"></a>
        </div>
      </div>
      <div class="group">
        <input type="radio" class="slide" name="test" id="1" value="1">
        <label for="0" class="previous">&lt;</label>
        <label for="2" class="next">&gt;</label>
        <div class="content">
          <a href=""><img src="images/banners/img2.jpg"></a>
        </div>
      </div>
      <div class="group">
        <input type="radio" class="slide" name="test" id="2" value="2">
        <label for="1" class="previous">&lt;</label>
        <label for="0" class="next">&gt;</label>
        <div class="content">
          <a href=""><img src="images/banners/img3.jpg"></a>
        </div>
      </div>
    </div>
  </div>
  <div class="homepage-info">
    <?php
      require 'sidebar.html.php';
    ?>
      <div class="main-text">
        <?php
        $category=0;
          foreach ($templateVars[0] as $key) {
            if (isset($_GET['category'])) {
              $category = $_GET['category'];
            } else {
              $category = $key['id'];
            }
            if ($category == $key['id']) {
              echo '<h1>'.$key['name'].'</h1>';
            }
                $i=0;
                foreach ($templateVars[3] as $artwork) {
                  if ($artwork['status'] == 'Ready') {
                    if ($artwork['category_id'] == $category && $category == $key['id']) {
                      if ($i%3==0 && $i!=0) {
                        ?>
                          </div>
                          <div class="card-row" style="height:auto; margin-top:10px;">
                          <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="art-card">
                            <div class="card-img-container">
                              <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                            </div>
                            <div class="art-card-content">
                              <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                              <p>
                                <strong>Starting Bid: </strong>
                                £<?=$artwork['start_price']?>
                              </p>
                              <p>
                                  <?php
                                  if ($artwork['auction_id'] != '-1') {
                                    echo '<strong>Next Auction: </strong>';
                                    // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                                    echo 'In: ';
                                    echo $artwork['auction_location'];
                                    echo ' On: ';
                                    echo date('d/m/Y', $artwork['auction_date']);
                                    echo ' At: ';
                                    echo date('H:i', $artwork['auction_date']);//.'</a>';
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
                      } else if ($i%3!=0) {
                        ?>
                        <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="art-card">
                          <div class="card-img-container">
                            <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                          </div>
                          <div class="art-card-content">
                            <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                            <p>
                              <strong>Starting Bid: </strong>
                              £<?=$artwork['start_price']?>
                            </p>
                            <p>
                                <?php
                                if ($artwork['auction_id'] != '-1') {
                                  echo '<strong>Next Auction: </strong>';
                                  // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                                  echo 'In: ';
                                  echo $artwork['auction_location'];
                                  echo ' On: ';
                                  echo date('d/m/Y', $artwork['auction_date']);
                                  echo ' At: ';
                                  echo date('H:i', $artwork['auction_date']);//.'</a>';
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
                      } else {
                        ?>
                          <div class="card-row" style="height:auto; margin-top:10px;">
                            <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="art-card">
                              <div class="card-img-container">
                                <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                              </div>
                              <div class="art-card-content">
                                <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                                <p>
                                  <strong>Starting Bid: </strong>
                                  £<?=$artwork['start_price']?>
                                </p>
                                <p>
                                    <?php
                                    if ($artwork['auction_id'] != '-1') {
                                      echo '<strong>Next Auction: </strong>';
                                      // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                                      echo 'In: ';
                                      echo $artwork['auction_location'];
                                      echo ' On: ';
                                      echo date('d/m/Y', $artwork['auction_date']);
                                      echo ' At: ';
                                      echo date('H:i', $artwork['auction_date']);//.'</a>';
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
                      $i++;
                      ?>


                      <?php
                    }
                  }

                }
              if ($i==0 && $category == $key['id']) {
                echo '<p>No Artwork</p>';
              } else if ($category == $key['id']) {
                echo '</div>';
              }
          }

          ?>
      </div>
    </div>
</div>
