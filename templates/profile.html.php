<div class="width80">
  <div class="homepage-info">
    <?php
      require 'sidebar.html.php';
    ?>
    <div class="main-text">
      <h2 style="padding-bottom:0.4em">My Profile</h2>
      <div class="auction-image-container">
        <img src="images/randombanner.php" class="auction-image"/>
      </div>

      <p>
        </br>
        First Name: <?=$templateVars[3]['first_name']?>
      </p>
      <p>
        Surname: <?=$templateVars[3]['surname']?>
      </p>

      <p>
        </br>
        Account Type: <?=$templateVars[3]['account_type']?>
      </p>
      <p>
        Account Creation: <?=date('d/m/Y', strtotime($templateVars[3]['account_creation']))?>
      </p>
      <p>
        </br>
        Username: <?=$templateVars[3]['username']?>
        </br></br>
      </p>

      <h3>Update Login Details: </h3>
      <form class="input-form" action="" method="POST">
        <input type="hidden" name="user[user_id]" value="<?=$_SESSION['id']?>" />
        <span>
          <label>Username:</label><input type="text" name="artwork[artist]" required/>
          <label>Password:</label><input type="password" name="artwork[status]" required/>
        </span>
        <input type="submit" name="submit" value="Update" />
      </form>

      <div style="margin:1em;">
        <h2 class="admin-header" onclick="displayNoneCardTitle(this)">Selling</h2>
        <div class="card-header display-none">
          <?php
          $category=0;
            foreach ($templateVars[0] as $key) {
              if (isset($_GET['category'])) {
                $category = $_GET['category'];
              } else {
                $category = $key['id'];
              }
              if ($category == $key['id']) {
                echo '<div>';
                echo '<h3 class="admin-header" style="margin:0.6em;" onclick="displayNoneCard(this)">'.$key['name'].'</h3>';
              }
              $i=0;
              foreach ($templateVars[5] as $artwork) {
                if ($artwork['category_id'] == $category && $category == $key['id']) {
                  if ($i%3==0 && $i!=0) {
                    ?>
                      </div>
                      <div class="card-row display-none" style="height:auto; margin-top:10px;">
                        <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                          <div class="card-img-container">
                            <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                          </div>
                          <div class="card-content">
                            <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                            <p>
                              <strong>Artist: </strong>
                              <?=$artwork['artist']?>
                            </p>
                            <p>
                              <strong>Year: </strong>
                              <?=$artwork['year']?>
                            </p>
                            <p>
                              <strong>Starting Bid: </strong>
                              £<?=$artwork['start_price']?>
                            </p>
                            <p>
                              <strong>Estimated Sale Price: </strong>
                              £<?=$artwork['estimated_amount']?>
                            </p>
                            <p>
                              <strong>Next up for Auction: </strong>
                              <?php
                                if ($artwork['auction_id'] != '-1') {
                                  echo 'In: ';
                                  echo $artwork['auction_location'];
                                  echo ' On: ';
                                  echo date('d/m/Y', $artwork['auction_date']);
                                  echo ' At: ';
                                  echo date('H:i', $artwork['auction_date']);
                                } else {
                                  echo 'Not selected for auction';
                                }
                              ?>
                            </p>
                          </div>
                          <button type="button" name="button" class="lot-view-button">View Details</button>
                        </a>
                    <?php
                  } else if ($i%3!=0) {
                    ?>
                    <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                      <div class="card-img-container">
                        <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                      </div>
                      <div class="card-content">
                        <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                        <p>
                          <strong>Artist: </strong>
                          <?=$artwork['artist']?>
                        </p>
                        <p>
                          <strong>Year: </strong>
                          <?=$artwork['year']?>
                        </p>
                        <p>
                          <strong>Starting Bid: </strong>
                          £<?=$artwork['start_price']?>
                        </p>
                        <p>
                          <strong>Estimated Sale Price: </strong>
                          £<?=$artwork['estimated_amount']?>
                        </p>
                        <p>
                          <strong>Next up for Auction: </strong>
                          <?php
                            if ($artwork['auction_id'] != '-1') {
                              echo 'In: ';
                              echo $artwork['auction_location'];
                              echo ' On: ';
                              echo date('d/m/Y', $artwork['auction_date']);
                              echo ' At: ';
                              echo date('H:i', $artwork['auction_date']);
                            } else {
                              echo 'Not selected for auction';
                            }
                          ?>
                        </p>
                      </div>
                      <button type="button" name="button" class="lot-view-button">View Details</button>
                    </a>
                    <?php
                  } else {
                    ?>
                      <div class="card-row display-none" style="height:auto; margin-top:10px;">
                        <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                          <div class="card-img-container">
                            <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                          </div>
                          <div class="card-content">
                            <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                            <p>
                              <strong>Artist: </strong>
                              <?=$artwork['artist']?>
                            </p>
                            <p>
                              <strong>Year: </strong>
                              <?=$artwork['year']?>
                            </p>
                            <p>
                              <strong>Starting Bid: </strong>
                              £<?=$artwork['start_price']?>
                            </p>
                            <p>
                              <strong>Estimated Sale Price: </strong>
                              £<?=$artwork['estimated_amount']?>
                            </p>
                            <p>
                              <strong>Next up for Auction: </strong>
                              <?php
                                if ($artwork['auction_id'] != '-1') {
                                  echo 'In: ';
                                  echo $artwork['auction_location'];
                                  echo ' On: ';
                                  echo date('d/m/Y', $artwork['auction_date']);
                                  echo ' At: ';
                                  echo date('H:i', $artwork['auction_date']);
                                } else {
                                  echo 'Not selected for auction';
                                }
                              ?>
                            </p>
                          </div>
                          <button type="button" name="button" class="lot-view-button">View Details</button>
                        </a>
                    <?php
                  }
                  $i++;
                }
              }
              if ($i==0 && $category == $key['id']) {
                echo '<p class="no-cards display-none">No Artwork</p>';
              } else if ($category == $key['id']) {
                echo '</div>';
              }

              if ($category == $key['id']) {
                echo '</div>';
              }
            }

            ?>
        </div>
      </div>

      <div style="margin:1em;">
        <h2 class="admin-header" onclick="displayNoneCardTitle(this)">Sold</h2>
        <div class="card-header display-none">
          <?php
          $category=0;
            foreach ($templateVars[0] as $key) {
              if (isset($_GET['category'])) {
                $category = $_GET['category'];
              } else {
                $category = $key['id'];
              }
              if ($category == $key['id']) {
                echo '<div>';
                echo '<h3 class="admin-header" style="margin:0.6em;" onclick="displayNoneCard(this)">'.$key['name'].'</h3>';
              }
              $i=0;
              foreach ($templateVars[5] as $artwork) {
                if ($artwork['category_id'] == $category && $category == $key['id']) {
                  if ($i%3==0 && $i!=0) {
                    ?>
                      </div>
                      <div class="card-row display-none" style="height:auto; margin-top:10px;">
                        <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                          <div class="card-img-container">
                            <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                          </div>
                          <div class="card-content">
                            <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                            <p>
                              <strong>Artist: </strong>
                              <?=$artwork['artist']?>
                            </p>
                            <p>
                              <strong>Year: </strong>
                              <?=$artwork['year']?>
                            </p>
                            <p>
                              <strong>Starting Bid: </strong>
                              £<?=$artwork['start_price']?>
                            </p>
                            <p>
                              <strong>Estimated Sale Price: </strong>
                              £<?=$artwork['estimated_amount']?>
                            </p>
                            <p>
                              <strong>Next up for Auction: </strong>
                              <?php
                                if ($artwork['auction_id'] != '-1') {
                                  echo 'In: ';
                                  echo $artwork['auction_location'];
                                  echo ' On: ';
                                  echo date('d/m/Y', $artwork['auction_date']);
                                  echo ' At: ';
                                  echo date('H:i', $artwork['auction_date']);
                                } else {
                                  echo 'Not selected for auction';
                                }
                              ?>
                            </p>
                          </div>
                          <button type="button" name="button" class="lot-view-button">View Details</button>
                        </a>
                    <?php
                  } else if ($i%3!=0) {
                    ?>
                    <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                      <div class="card-img-container">
                        <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                      </div>
                      <div class="card-content">
                        <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                        <p>
                          <strong>Artist: </strong>
                          <?=$artwork['artist']?>
                        </p>
                        <p>
                          <strong>Year: </strong>
                          <?=$artwork['year']?>
                        </p>
                        <p>
                          <strong>Starting Bid: </strong>
                          £<?=$artwork['start_price']?>
                        </p>
                        <p>
                          <strong>Estimated Sale Price: </strong>
                          £<?=$artwork['estimated_amount']?>
                        </p>
                        <p>
                          <strong>Next up for Auction: </strong>
                          <?php
                            if ($artwork['auction_id'] != '-1') {
                              echo 'In: ';
                              echo $artwork['auction_location'];
                              echo ' On: ';
                              echo date('d/m/Y', $artwork['auction_date']);
                              echo ' At: ';
                              echo date('H:i', $artwork['auction_date']);
                            } else {
                              echo 'Not selected for auction';
                            }
                          ?>
                        </p>
                      </div>
                      <button type="button" name="button" class="lot-view-button">View Details</button>
                    </a>
                    <?php
                  } else {
                    ?>
                      <div class="card-row display-none" style="height:auto; margin-top:10px;">
                        <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                          <div class="card-img-container">
                            <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                          </div>
                          <div class="card-content">
                            <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                            <p>
                              <strong>Artist: </strong>
                              <?=$artwork['artist']?>
                            </p>
                            <p>
                              <strong>Year: </strong>
                              <?=$artwork['year']?>
                            </p>
                            <p>
                              <strong>Starting Bid: </strong>
                              £<?=$artwork['start_price']?>
                            </p>
                            <p>
                              <strong>Estimated Sale Price: </strong>
                              £<?=$artwork['estimated_amount']?>
                            </p>
                            <p>
                              <strong>Next up for Auction: </strong>
                              <?php
                                if ($artwork['auction_id'] != '-1') {
                                  echo 'In: ';
                                  echo $artwork['auction_location'];
                                  echo ' On: ';
                                  echo date('d/m/Y', $artwork['auction_date']);
                                  echo ' At: ';
                                  echo date('H:i', $artwork['auction_date']);
                                } else {
                                  echo 'Not selected for auction';
                                }
                              ?>
                            </p>
                          </div>
                          <button type="button" name="button" class="lot-view-button">View Details</button>
                        </a>
                    <?php
                  }
                  $i++;
                }
              }
              if ($i==0 && $category == $key['id']) {
                echo '<p class="no-cards display-none">No Artwork</p>';
              } else if ($category == $key['id']) {
                echo '</div>';
              }

              if ($category == $key['id']) {
                echo '</div>';
              }
            }

            ?>
        </div>
      </div>

      <div style="margin:1em;">
        <h2 class="admin-header" onclick="displayNoneCardTitle(this)">Bought</h2>
        <div class="card-header display-none">
          <?php
          $category=0;
            foreach ($templateVars[0] as $key) {
              if (isset($_GET['category'])) {
                $category = $_GET['category'];
              } else {
                $category = $key['id'];
              }
              if ($category == $key['id']) {
                echo '<div>';
                echo '<h3 class="admin-header" style="margin:0.6em;" onclick="displayNoneCard(this)">'.$key['name'].'</h3>';
              }
              $i=0;
              foreach ($templateVars[5] as $artwork) {
                if ($artwork['category_id'] == $category && $category == $key['id']) {
                  if ($i%3==0 && $i!=0) {
                    ?>
                      </div>
                      <div class="card-row display-none" style="height:auto; margin-top:10px;">
                        <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                          <div class="card-img-container">
                            <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                          </div>
                          <div class="card-content">
                            <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                            <p>
                              <strong>Artist: </strong>
                              <?=$artwork['artist']?>
                            </p>
                            <p>
                              <strong>Year: </strong>
                              <?=$artwork['year']?>
                            </p>
                            <p>
                              <strong>Starting Bid: </strong>
                              £<?=$artwork['start_price']?>
                            </p>
                            <p>
                              <strong>Estimated Sale Price: </strong>
                              £<?=$artwork['estimated_amount']?>
                            </p>
                            <p>
                              <strong>Next up for Auction: </strong>
                              <?php
                                if ($artwork['auction_id'] != '-1') {
                                  echo 'In: ';
                                  echo $artwork['auction_location'];
                                  echo ' On: ';
                                  echo date('d/m/Y', $artwork['auction_date']);
                                  echo ' At: ';
                                  echo date('H:i', $artwork['auction_date']);
                                } else {
                                  echo 'Not selected for auction';
                                }
                              ?>
                            </p>
                          </div>
                          <button type="button" name="button" class="lot-view-button">View Details</button>
                        </a>
                    <?php
                  } else if ($i%3!=0) {
                    ?>
                    <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                      <div class="card-img-container">
                        <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                      </div>
                      <div class="card-content">
                        <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                        <p>
                          <strong>Artist: </strong>
                          <?=$artwork['artist']?>
                        </p>
                        <p>
                          <strong>Year: </strong>
                          <?=$artwork['year']?>
                        </p>
                        <p>
                          <strong>Starting Bid: </strong>
                          £<?=$artwork['start_price']?>
                        </p>
                        <p>
                          <strong>Estimated Sale Price: </strong>
                          £<?=$artwork['estimated_amount']?>
                        </p>
                        <p>
                          <strong>Next up for Auction: </strong>
                          <?php
                            if ($artwork['auction_id'] != '-1') {
                              echo 'In: ';
                              echo $artwork['auction_location'];
                              echo ' On: ';
                              echo date('d/m/Y', $artwork['auction_date']);
                              echo ' At: ';
                              echo date('H:i', $artwork['auction_date']);
                            } else {
                              echo 'Not selected for auction';
                            }
                          ?>
                        </p>
                      </div>
                      <button type="button" name="button" class="lot-view-button">View Details</button>
                    </a>
                    <?php
                  } else {
                    ?>
                      <div class="card-row display-none" style="height:auto; margin-top:10px;">
                        <a href="/artwork/artItem?id=<?=$artwork['id']?>" class="card" style="margin-top:10px;">
                          <div class="card-img-container">
                            <img src="/images/artwork/<?=$artwork['id']?>[0].jpg" alt="" class="card-img">
                          </div>
                          <div class="card-content">
                            <h2 style="margin:5px;"><strong>Name: </strong><?=$artwork['name']?></h2>
                            <p>
                              <strong>Artist: </strong>
                              <?=$artwork['artist']?>
                            </p>
                            <p>
                              <strong>Year: </strong>
                              <?=$artwork['year']?>
                            </p>
                            <p>
                              <strong>Starting Bid: </strong>
                              £<?=$artwork['start_price']?>
                            </p>
                            <p>
                              <strong>Estimated Sale Price: </strong>
                              £<?=$artwork['estimated_amount']?>
                            </p>
                            <p>
                              <strong>Next up for Auction: </strong>
                              <?php
                                if ($artwork['auction_id'] != '-1') {
                                  echo 'In: ';
                                  echo $artwork['auction_location'];
                                  echo ' On: ';
                                  echo date('d/m/Y', $artwork['auction_date']);
                                  echo ' At: ';
                                  echo date('H:i', $artwork['auction_date']);
                                } else {
                                  echo 'Not selected for auction';
                                }
                              ?>
                            </p>
                          </div>
                          <button type="button" name="button" class="lot-view-button">View Details</button>
                        </a>
                    <?php
                  }
                  $i++;
                }
              }
              if ($i==0 && $category == $key['id']) {
                echo '<p class="no-cards display-none">No Artwork</p>';
              } else if ($category == $key['id']) {
                echo '</div>';
              }

              if ($category == $key['id']) {
                echo '</div>';
              }
            }

            ?>
        </div>
      </div>
    </div>
  </div>
</div>
