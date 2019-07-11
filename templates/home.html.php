<div class="width80">
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
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sit amet consectetur nulla. Morbi neque lacus, ultricies nec est vel, malesuada blandit quam. Nullam ultricies pharetra ex et tristique. Vestibulum lobortis augue non magna pulvinar, quis feugiat diam sodales. Etiam ornare augue ante, eget sagittis nisi finibus eget. Aliquam commodo dolor quam, vitae rutrum enim pretium at. Nulla nec nulla interdum, varius sapien non, porttitor urna. Etiam porttitor, nulla et suscipit porta, nunc arcu commodo erat, et interdum ligula eros sit amet nisl.
        </p>
        <div class="card-row" style="height:auto; margin-top:10px;">
          <?php
            if (isset($templateVars[4]['id'])) {
              ?>
              <a href="/auction/artwork?id=<?=$templateVars[4]['id']?>" class="card">
                <div class="card-img-container">
                  <img src="/images/auctions/<?=$templateVars[4]['image']?>" alt="" class="card-img">
                </div>
                <div class="card-content">
                  <h2 style="margin:5px;">Next Auction</h2>
                  <p>
                    <strong>Location: </strong>
                    <?=$templateVars[4]['location']?>
                  </p>
                  <p>
                    <strong>Date: </strong>
                    <?=date('d/m/Y', strtotime($templateVars[4]['date']))?>
                  </p>
                  <p>
                    <strong>Time: </strong>
                    <?=date('H:i', strtotime($templateVars[4]['date']))?>
                  </p>
                </div>
                <div class="card-more">
                  <button type="button" name="button">View more</button>
                </div>
              </a>
              <?php
            }
          ?>

          <?php
            if (isset($templateVars[3]['id'])) {
              ?>
              <a href="/artwork/artItem?id=<?=$templateVars[3]['id']?>" class="card">
                <div class="card-img-container">
                  <img src="/images/artwork/<?=$templateVars[3]['id']?>[0].jpg" alt="" class="card-img">
                </div>
                <div class="card-content">
                  <h2 style="margin:5px;">Top Pieces</h2>
                  <p>
                    <strong>Name: </strong>
                    <?=$templateVars[3]['name']?>
                  </p>
                  <p>
                    <strong>Category: </strong>
                    <?=$templateVars[3]['category']?>
                  </p>
                  <p>
                    <strong>Starting Bid: </strong>
                    £<?=$templateVars[3]['start_price']?>
                  </p>

                  <p>
                      <?php

                      if ($templateVars[3]['auction_id'] != '-1') {
                        echo '<strong>Next Auction: </strong>';
                        echo '<a href="/auction?id='.$templateVars[3]['auction_id'].'">';
                        echo 'In: ';
                        echo $templateVars[3]['auction_location'];
                        echo ' On: ';
                        echo date('d/m/Y', strtotime($templateVars[3]['auction_date']));
                        echo ' At: ';
                        echo date('H:i', strtotime($templateVars[3]['auction_date']));
                        echo '</a>';
                      } else {
                        echo '<strong>Next Auction: </strong>';
                        echo 'No Auction Date Set';
                      }
                      ?>

                  </p>
                </div>
                <div class="card-more">
                  <button type="button" name="button">View more</button>
                </div>
              </a>
              <?php
            }
          ?>

          <a href="" class="card">
            <div class="card-img-container">
              <img src="/images/banners/img6.jpg" alt="Calender" class="card-img">
            </div>
            <div class="card-content">
              <h2 style="margin:5px;">About Us</h2>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam urna orci, mattis sit amet dolor sit amet, consequat tempor augue. Praesent ut leo quis lorem laoreet elementum vestibulum nec orci.
              </p>
            </div>
            <div class="card-more">
              <button type="button" name="button">View more</button>
            </div>
          </a>
        </div>
      </div>
    </div>
</div>
