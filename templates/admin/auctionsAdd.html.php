<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h2>Add Auction</h2>

      <form class="input-form" action="" method="POST" enctype="multipart/form-data">
        <span><label>Name:</label><input type="text" name="auction[name]" required/></span>

        <span>
          <label>Location:</label><select name="auction[location_id]" required>
            <?php
              foreach ($templateVars[2] as $location) {
                ?>
                  <option value="<?=$location['location_id']?>"><?=$location['name']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span><label>Date:</label><input type="date" name="date" required/></span>

        <span>
          <label>Time:</label><select name="hour" required>
            <?php
              for ($i=0; $i<24; $i++) {
                if ($i<10) {
                  ?>
                    <option value="0<?=$i?>">0<?=$i?></option>
                  <?php
                } else {
                  ?>
                    <option value="<?=$i?>"><?=$i?></option>
                  <?php
                }

              }
            ?>
          </select>:<select name="minute" required>
            <option value="00">00</option>
            <option value="00">15</option>
            <option value="00">30</option>
            <option value="00">45</option>
          </select>
        </span>

        <span>
          <label>Category:</label><select id="sell-category" name="auction[category_id]" required>
            <?php
              foreach ($templateVars[0] as $category) {
                ?>
                  <option value="<?=$category['id']?>"><?=$category['name']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span><label>Image:</label><input type="file" name="files[]" /></span>

        <input type="submit" name="submit" value="Add Auction" />
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
        if (row%3==0 && row!=0) {
          htmlCode += '</div>';
          htmlCode += '<div class="card-row" style="height:auto; margin-top:10px; justify-content:center;">';
          htmlCode += '<div class="art-card" style="height:400px !important; cursor: pointer;" onclick="selectArt(this)">';
          htmlCode += '<input type="hidden" name="art['+row+'][id]" value="' + artwork[i]['id'] + '"/>';
          htmlCode += '<input type="hidden" name="art['+row+'][selected]" value="no"/>';
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
          htmlCode += '<div class="art-card" style="height:400px !important; cursor: pointer;" onclick="selectArt(this)">';
          htmlCode += '<input type="hidden" name="art['+row+'][id]" value="' + artwork[i]['id'] + '"/>';
          htmlCode += '<input type="hidden" name="art['+row+'][selected]" value="no"/>';
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
          htmlCode += '<div class="art-card" style="height:400px !important; cursor: pointer;" onclick="selectArt(this)">';
          htmlCode += '<input type="hidden" name="art['+row+'][id]" value="' + artwork[i]['id'] + '"/>';
          htmlCode += '<input type="hidden" name="art['+row+'][selected]" value="no"/>';
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
