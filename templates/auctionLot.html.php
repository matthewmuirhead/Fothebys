<div class="width80">
  <div class="homepage-info">
    <?php
      require 'sidebar.html.php';
    ?>
    <div class="main-text">
      <h1>Auction Title:</h1>
      <h2><?=$templateVars[3]['name']?></h2>
      <div class="auction-image-container">
        <img src="/images/auctions/<?=$templateVars[3]['image']?>" alt="Auction Image" class="auction-image">
      </div>
      <div class="row" style="height:auto; justify-content:space-between; padding-top:1em; padding-bottom:1em;">
        <h2>Location: <?=$templateVars[3]['location']?></h2>
        <h2>Date: <?=date('d/m/Y', $templateVars[3]['date'])?></h2>
        <h2>Start Time: <?=date('H:i', $templateVars[3]['date'])?></h2>
      </div>
      <div>
        <?php
          $i=-1;
          foreach ($templateVars[4] as $art) {
            $i++;
            if ($i%3==0 && $i!=0) {
              ?>
                </div>
                <div class="card-row" style="height:auto; margin-top:10px; justify-content:center;">
                <a href="/artwork/artItem?id=<?=$art['id']?>" class="art-card" style="height:400px !important;">
                  <!-- <div class="auction-card"> -->
                  <h3 style="margin-top:5px; margin-bottom:15px;">Piece Name: <?=$art['name']?></h3>
                    <div class="card-img-container">
                      <img src="/images/artwork/<?=$art['id']?>[0].jpg" alt="" class="card-img">
                    </div>
                    <div class="art-card-content" style="height: 100px !important; margin-top:10px;">
                      <p>Artist: <?=$art['artist']?></p>
                      <p>Year: <?=$art['year']?></p>
                    </div>
                  <!-- </div> -->
                </a>

              <?php
            } else if ($i%3!=0) {
              ?>
              <a href="/artwork/artItem?id=<?=$art['id']?>" class="art-card" style="height:400px !important;">
                <!-- <div class="auction-card"> -->
                <h3 style="margin-top:5px; margin-bottom:15px;">Piece Name: <?=$art['name']?></h3>
                  <div class="card-img-container" style="height:300px">
                    <img src="/images/artwork/<?=$art['id']?>[0].jpg" alt="" class="card-img">
                  </div>
                  <div class="art-card-content" style="height: 100px !important; margin-top:10px;">
                    <p>Artist: <?=$art['artist']?></p>
                    <p>Year: <?=$art['year']?></p>
                  </div>
                <!-- </div> -->
              </a>
              <?php
            } else {
              ?>
                <div class="card-row" style="height:auto; margin-top:10px; justify-content:center;">
                  <a href="/artwork/artItem?id=<?=$art['id']?>" class="art-card" style="height:400px !important;">
                    <!-- <div> -->
                    <h3 style="margin-top:5px; margin-bottom:15px;">Piece Name: <?=$art['name']?></h3>
                      <div class="card-img-container">
                        <img src="/images/artwork/<?=$art['id']?>[0].jpg" alt="" class="card-img">
                      </div>
                      <div class="art-card-content" style="height: 100px !important; margin-top:10px;">
                        <p>Artist: <?=$art['artist']?></p>
                        <p>Year: <?=$art['year']?></p>
                      </div>
                    <!-- </div> -->
                  </a>
              <?php
            }
          }
          if ($i==-1) {
            echo '<p>No Items in this auction</p>';
          } else {
            echo '</div>';
          }
        ?>
      </div>

    </div>
  </div>
</div>
