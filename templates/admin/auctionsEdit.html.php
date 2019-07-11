<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h2>Edit Auction</h2>

      <form class="input-form" action="" method="POST" enctype="multipart/form-data">
        <span><label>Name:</label><input type="text" name="auction[name]" required value="<?=$templateVars[3]['name']?>"/></span>
        <span>
          <label>Location:</label><select name="auction[location_id]" required>
            <?php
              foreach ($templateVars[2] as $location) {
                ?>
                  <option value="<?=$location['location_id']?>" <?php if ($templateVars[3]['location_id'] == $location['location_id']) echo 'selected'?>><?=$location['name']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span><label>Date:</label><input type="date" name="date" required value="<?=$templateVars[3]['date']?>"/></span>

        <span>
          <label>Time:</label><select name="hour" required>
            <?php
              for ($i=0; $i<24; $i++) {
                if ($i<10) {
                  ?>
                    <option value="0<?=$i?>" <?php if ($templateVars[3]['hour'] == '0'.$i) echo 'selected'?>>0<?=$i?></option>
                  <?php
                } else {
                  ?>
                    <option value="<?=$i?>" <?php if ($templateVars[3]['hour'] == $i) echo 'selected'?>><?=$i?></option>
                  <?php
                }

              }
            ?>
          </select>:<select name="minute" required>
            <option value="00" <?php if ($templateVars[3]['minute'] == '00') echo 'selected'?>>00</option>
            <option value="00" <?php if ($templateVars[3]['minute'] == '15') echo 'selected'?>>15</option>
            <option value="00" <?php if ($templateVars[3]['minute'] == '30') echo 'selected'?>>30</option>
            <option value="00" <?php if ($templateVars[3]['minute'] == '45') echo 'selected'?>>45</option>
          </select>
        </span>

        <span>
          <label>Category:</label><select id="sell-category" name="auction[category_id]" required>
            <?php
              foreach ($templateVars[0] as $category) {
                ?>
                  <option value="<?=$category['id']?>" <?php if ($templateVars[3]['category_id'] == $category['id']) echo 'selected'?>><?=$category['name']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span><label>Image:</label><input type="file" name="files[]" value="/images/auctions/<?=$templateVars[3]['image']?>"/></span>

        <input type="hidden" name="auction[auction_id]" required value="<?=$templateVars[3]['id']?>"/>
        <input type="submit" name="submit" value="Edit Auction" />
        <div id="artwork">

        </div>
      </form>
    </div>
  </div>
</div>


<script>

  function change() {
    var e = document.getElementById("sell-category");
    var strUser = e.options[e.selectedIndex].index;

    var htmlCode = "";
    var row = 0;
    for (var i=0; i<artwork.length; i++) {
      if (artwork[i]['category_id'] == categories[strUser]['id']) {
        console.log(artwork[i]['next_auction']);
        if (row%3==0 && row!=0) {
          htmlCode += '</div>';
          htmlCode += '<div class="card-row" style="height:auto; margin-top:10px; justify-content:center;">';
          htmlCode += '<div class="art-card';
          if (artwork[i]['next_auction'] == '<?=$_GET['id']?>') {
            htmlCode += ' art-selected';
          }
          htmlCode += '" style="height:400px !important; cursor: pointer;" onclick="selectArt(this)">';
          htmlCode += '<input type="hidden" name="art['+row+'][id]" value="' + artwork[i]['id'] + '"/>';
          htmlCode += '<input type="hidden" name="art['+row+'][selected]" value="';
          if (artwork[i]['next_auction'] == '<?=$_GET['id']?>') {
            htmlCode += 'yes"/>';
          } else {
            htmlCode += 'no"/>';
          }
          htmlCode += '<h3 style="margin-top:5px; margin-bottom:15px;">Piece Name:' + artwork[i]['name'] + '</h3>';
          htmlCode += '<div class="card-img-container">';
          htmlCode += '<img src="/images/artwork/' + artwork[i]['id'] + '[0].jpg" alt="" class="card-img">';
          htmlCode += '</div>';
          htmlCode += '<div class="art-card-content" style="height: 100px !important; margin-top:10px;">';
          htmlCode += '<p>Artist: ' + artwork[i]['artist'] + '</p>';
          htmlCode += '<p>Year: ' + artwork[i]['year'] + '</p>';
          htmlCode += '</div>';
          htmlCode += '</div>';
        } else if (row%3!=0) {
          htmlCode += '<div class="art-card';
          if (artwork[i]['next_auction'] == '<?=$_GET['id']?>') {
            htmlCode += ' art-selected';
          }
          htmlCode += '" style="height:400px !important; cursor: pointer;" onclick="selectArt(this)">';
          htmlCode += '<input type="hidden" name="art['+row+'][id]" value="' + artwork[i]['id'] + '"/>';
          htmlCode += '<input type="hidden" name="art['+row+'][selected]" value="';
          if (artwork[i]['next_auction'] == '<?=$_GET['id']?>') {
            htmlCode += 'yes"/>';
          } else {
            htmlCode += 'no"/>';
          }
          htmlCode += '<h3 style="margin-top:5px; margin-bottom:15px;">Piece Name:' + artwork[i]['name'] + '</h3>';
          htmlCode += '<div class="card-img-container">';
          htmlCode += '<img src="/images/artwork/' + artwork[i]['id'] + '[0].jpg" alt="" class="card-img">';
          htmlCode += '</div>';
          htmlCode += '<div class="art-card-content" style="height: 100px !important; margin-top:10px;">';
          htmlCode += '<p>Artist: ' + artwork[i]['artist'] + '</p>';
          htmlCode += '<p>Year: ' + artwork[i]['year'] + '</p>';
          htmlCode += '</div>';
          htmlCode += '</div>';
        } else {
          htmlCode += '<div class="card-row" style="height:auto; margin-top:10px; justify-content:center;">';
          htmlCode += '<div class="art-card';
          if (artwork[i]['next_auction'] == '<?=$_GET['id']?>') {
            htmlCode += ' art-selected';
          }
          htmlCode += '" style="height:400px !important; cursor: pointer;" onclick="selectArt(this)">';
          htmlCode += '<input type="hidden" name="art['+row+'][id]" value="' + artwork[i]['id'] + '"/>';
          htmlCode += '<input type="hidden" name="art['+row+'][selected]" value="';
          if (artwork[i]['next_auction'] == '<?=$_GET['id']?>') {
            htmlCode += 'yes"/>';
          } else {
            htmlCode += 'no"/>';
          }
          htmlCode += '<h3 style="margin-top:5px; margin-bottom:15px;">Piece Name:' + artwork[i]['name'] + '</h3>';
          htmlCode += '<div class="card-img-container">';
          htmlCode += '<img src="/images/artwork/' + artwork[i]['id'] + '[0].jpg" alt="" class="card-img">';
          htmlCode += '</div>';
          htmlCode += '<div class="art-card-content" style="height: 100px !important; margin-top:10px;">';
          htmlCode += '<p>Artist: ' + artwork[i]['artist'] + '</p>';
          htmlCode += '<p>Year: ' + artwork[i]['year'] + '</p>';
          htmlCode += '</div>';
          htmlCode += '</div>';
        }
        row++;
      }
    }
    if (row==0) {
      htmlCode = '<p>No Artwork</p>';
    } else {
      htmlCode += '</div>';
    }

    var artDiv = document.getElementById("artwork");

    while (artDiv.firstChild) {
      artDiv.removeChild(artDiv.firstChild);
    }

    console.log(document.getElementById("artwork").children);
    document.getElementById("artwork").innerHTML = htmlCode;
  }




  function myLoadEvent() {
    document.getElementById("sell-category").addEventListener('change', change);
    change();
  }

  var categories = <?=json_encode($templateVars[0])?>;
  var artwork = <?=json_encode($templateVars[1])?>;
  document.addEventListener('DOMContentLoaded', myLoadEvent);
</script>
