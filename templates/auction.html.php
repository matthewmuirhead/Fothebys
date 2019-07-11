<div class="width80">
  <h1 style="margin:1em;">Auctions</h1>
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
          if (isset($_GET['location'])) {
            echo '<h1>'.$templateVars[5].' Auctions</h1>';
          } else {
            echo '<h1>All Auctions</h1>';
          }
        ?>

        <h2>Upcoming</h2>
        <?php
          $i=0;
          foreach ($templateVars[3] as $auction) {
            if ($i%3==0 && $i!=0) {
              ?>
                </div>
                <div class="card-row" style="height:auto; margin-top:10px;">
                <a href="auction/artwork?id=<?=$auction['id']?>" class="art-card">
                <!-- <div class="auction-card"> -->
                  <div class="card-img-container">
                    <img src="/images/auctions/<?=$auction['image']?>" alt="" class="card-img">
                  </div>
                  <div class="auction-card-content">
                    <h3 style="margin:5px;"><strong>Location: </strong><?=$auction['location']?></h3>

                    <p>
                      <strong>Date: </strong><?=date('d/m/Y', $auction['date'])?>
                    </p>
                    <p>
                      <strong>Time: </strong><?=date('H:i', $auction['date'])?>
                    </p>
                  </div>
                  <button type="button" name="button" class="lot-view-button">View Auction Lots</button>
                  <!-- <form class="button-float" action="auction/artwork" method="post">
                    <input type="hidden" name="id" value="<?=$auction['id']?>">
                    <input type="submit" name="submit" value="View Auction Lots">
                  </form> -->
                <!-- </div> -->
                </a>
              <?php
            } else if ($i%3!=0) {
              ?>
              <a href="auction/artwork?id=<?=$auction['id']?>" class="art-card">
              <!-- <div class="auction-card"> -->
                <div class="card-img-container">
                  <img src="/images/auctions/<?=$auction['image']?>" alt="" class="card-img">
                </div>
                <div class="auction-card-content">
                  <h3 style="margin:5px;"><strong>Location: </strong><?=$auction['location']?></h3>

                  <p>
                    <strong>Date: </strong><?=date('d/m/Y', $auction['date'])?>
                  </p>
                  <p>
                    <strong>Time: </strong><?=date('H:i', $auction['date'])?>
                  </p>
                </div>
                <button type="button" name="button" class="lot-view-button">View Auction Lots</button>
                <!-- <form class="button-float" action="auction/artwork" method="post">
                  <input type="hidden" name="id" value="<?=$auction['id']?>">
                  <input type="submit" name="submit" value="View Auction Lots">
                </form> -->
              <!-- </div> -->
              </a>
              <?php
            } else {
              ?>
                <div class="card-row" style="height:auto; margin-top:10px;">
                  <a href="auction/artwork?id=<?=$auction['id']?>" class="art-card">
                  <!-- <div class="auction-card"> -->
                    <div class="card-img-container">
                      <img src="/images/auctions/<?=$auction['image']?>" alt="" class="card-img">
                    </div>
                    <div class="auction-card-content">
                      <h3 style="margin:5px;"><strong>Location: </strong><?=$auction['location']?></h3>

                      <p>
                        <strong>Date: </strong><?=date('d/m/Y', $auction['date'])?>
                      </p>
                      <p>
                        <strong>Time: </strong><?=date('H:i', $auction['date'])?>
                      </p>
                    </div>
                    <button type="button" name="button" class="lot-view-button">View Auction Lots</button>
                    <!-- <form class="button-float" action="auction/artwork" method="post">
                      <input type="hidden" name="id" value="<?=$auction['id']?>">
                      <input type="submit" name="submit" value="View Auction Lots">
                    </form> -->
                  <!-- </div> -->
                  </a>
              <?php
            }
            $i++;
          }
          if ($i==0) {
            echo '<p>No Auctions</p>';
          } else {
            echo '</div>';
          }
        ?>
        <h2>Last 30 Days</h2>
        <?php
          $i=0;
          foreach ($templateVars[4] as $auction) {
            if ($i%3==0 && $i!=0) {
              ?>
                </div>
                <div class="card-row" style="height:auto; margin-top:10px;">
                <a href="auction/artwork?id=<?=$auction['id']?>" class="art-card">
                <!-- <div class="auction-card"> -->
                  <div class="card-img-container">
                    <img src="/images/auctions/<?=$auction['image']?>" alt="" class="card-img">
                  </div>
                  <div class="auction-card-content">
                    <h3 style="margin:5px;"><strong>Location: </strong><?=$auction['location']?></h3>

                    <p>
                      <strong>Date: </strong><?=date('d/m/Y', $auction['date'])?>
                    </p>
                    <p>
                      <strong>Time: </strong><?=date('H:i', $auction['date'])?>
                    </p>
                  </div>
                  <button type="button" name="button" class="lot-view-button">View Auction Lots</button>
                  <!-- <form class="button-float" action="auction/artwork" method="post">
                    <input type="hidden" name="id" value="<?=$auction['id']?>">
                    <input type="submit" name="submit" value="View Auction Lots">
                  </form> -->
                <!-- </div> -->
                </a>
              <?php
            } else if ($i%3!=0) {
              ?>
              <a href="auction/artwork?id=<?=$auction['id']?>" class="art-card">
              <!-- <div class="auction-card"> -->
                <div class="card-img-container">
                  <img src="/images/auctions/<?=$auction['image']?>" alt="" class="card-img">
                </div>
                <div class="auction-card-content">
                  <h3 style="margin:5px;"><strong>Location: </strong><?=$auction['location']?></h3>

                  <p>
                    <strong>Date: </strong><?=date('d/m/Y', $auction['date'])?>
                  </p>
                  <p>
                    <strong>Time: </strong><?=date('H:i', $auction['date'])?>
                  </p>
                </div>
                <button type="button" name="button" class="lot-view-button">View Auction Lots</button>
                <!-- <form class="button-float" action="auction/artwork" method="post">
                  <input type="hidden" name="id" value="<?=$auction['id']?>">
                  <input type="submit" name="submit" value="View Auction Lots">
                </form> -->
              <!-- </div> -->
              </a>
              <?php
            } else {
              ?>
                <div class="card-row" style="height:auto; margin-top:10px;">
                  <a href="auction/artwork?id=<?=$auction['id']?>" class="art-card">
                  <!-- <div class="auction-card"> -->
                    <div class="card-img-container">
                      <img src="/images/auctions/<?=$auction['image']?>" alt="" class="card-img">
                    </div>
                    <div class="auction-card-content">
                      <h3 style="margin:5px;"><strong>Location: </strong><?=$auction['location']?></h3>

                      <p>
                        <strong>Date: </strong><?=date('d/m/Y', $auction['date'])?>
                      </p>
                      <p>
                        <strong>Time: </strong><?=date('H:i', $auction['date'])?>
                      </p>
                    </div>
                    <button type="button" name="button" class="lot-view-button">View Auction Lots</button>
                    <!-- <form class="button-float" action="auction/artwork" method="post">
                      <input type="hidden" name="id" value="<?=$auction['id']?>">
                      <input type="submit" name="submit" value="View Auction Lots">
                    </form> -->
                  <!-- </div> -->
                  </a>
              <?php
            }
            $i++;
          }
          if ($i==0) {
            echo '<p>No Auctions</p>';
          } else {
            echo '</div>';
          }
        ?>

      </div>
    </div>
</div>
