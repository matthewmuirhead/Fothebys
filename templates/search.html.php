<div class="width80">
  <h1 style="margin:1em;">Search Results</h1>
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
        <h1 style="margin:0.5em;">Advanced Search</h1>
        <form class="" action="" method="post">
          <span><label>Name:</label><input type="text" name="name" value="<?=$templateVars[4]?>"></span>
          <span><label>Artist:</label><input type="text" name="artist" value="<?php if (isset($_POST['artist'])) echo $_POST['artist']?>"></span>
          <span>
            <label>Category:</label>
            <select name="category">
              <option value="0">All</option>
              <?php
                if (isset($_POST['category'])) {
                  foreach ($templateVars[0] as $category) {
                    ?>
                      <option value="<?=$category['id']?>" <?php if ($_POST['category'] == $category['id']) echo 'selected'?>><?=$category['name']?></option>
                    <?php
                  }
                } else {
                  foreach ($templateVars[0] as $category) {
                    ?>
                      <option value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php
                  }
                }
              ?>
            </select>
          </span>
          <span>
            <label>Location:</label>
            <select name="location">
              <option value="0">All</option>
              <?php
                if (isset($_POST['location'])) {
                  foreach ($templateVars[2] as $category) {
                    ?>
                      <option value="<?=$category['id']?>" <?php if ($_POST['location'] == $category['id']) echo 'selected'?>><?=$category['name']?></option>
                    <?php
                  }
                } else {
                  foreach ($templateVars[2] as $category) {
                    ?>
                      <option value="<?=$category['id']?>"><?=$category['name']?></option>
                    <?php
                  }
                }
              ?>
            </select>
          </span>
          <span>
            <label>Price: </label>
            <label style="width:auto; margin-left:5px">Minimum: (£)</label>
            <input type="number" name="min" value="<?php if (isset($_POST['min'])) { echo $_POST['min']; } else {echo '0';}?>" required>
            <label style="width:auto; margin-left:5px">Maximum: (£)</label>
            <input type="number" name="max" value="<?php if (isset($_POST['max'])) { echo $_POST['max']; } else {echo '99999999999';}?>" max="99999999999" required></span>
          <span>
            <label>Auction Date: </label>
            <label style="width:auto; margin-left:5px">Start:</label>
            <input type="date" name="start" min='1970-01-01' value="<?php if (isset($_POST['start'])) echo $_POST['start']?>">
            <label style="width:auto; margin-left:5px">End:</label>
            <input type="date" name="end" value="<?php if (isset($_POST['end'])) echo $_POST['end']?>">
          </span>
          <input type="submit" name="submit" value="Search">
        </form>
        <h1 style="margin:0.5em;">Results</h1>
        <span>
          <label>Sort By:</label>
          <select id="sort-order" style="font-size:1em; "class="" name="">
            <option value="name-asc">Name &#x2191</option>
            <option value="name-desc" selected>Name &#x2193</option>
            <option value="name-asc">Value &#x2191</option>
            <option value="name-desc">Value &#x2193</option>
            <option value="name-asc">Year &#x2191</option>
            <option value="name-desc">Year &#x2193</option>
            <option value="name-asc">Artist &#x2191</option>
            <option value="name-desc">Artist &#x2193</option>
            <option value="name-asc">Location &#x2191</option>
            <option value="name-desc">Location &#x2193</option>
          </select>
        </span>

        <div id="data">

        </div>

      </div>
    </div>
</div>


<script type="text/javascript">
  function change() {
    var e = document.getElementById("sort-order");
    var strUser = e.options[e.selectedIndex].index;

    if (strUser == 0) {
      art.sort(function(a, b) {
        var nameA = a.name.toUpperCase();
        var nameB = b.name.toUpperCase();
        if (nameA > nameB) {
          return -1;
        }
        if (nameA < nameB) {
          return 1;
        }

        // names must be equal
        return 0;
      });
    } else if (strUser == 1) {
      art.sort(function(a, b) {
        var nameA = a.name.toUpperCase();
        var nameB = b.name.toUpperCase();
        if (nameA < nameB) {
          return -1;
        }
        if (nameA > nameB) {
          return 1;
        }

        // names must be equal
        return 0;
      });
    } else if (strUser == 2) {
      art.sort(function(a, b) {
        return a.start_price - b.start_price;
      });
    } else if (strUser == 3) {
      art.sort(function(a, b) {
        return b.start_price - a.start_price;
      });
    } else if (strUser == 4) {
      art.sort(function(a, b) {
        return a.year - b.year;
      });
    } else if (strUser == 5) {
      art.sort(function(a, b) {
        return b.year - a.year;
      });
    } else if (strUser == 6) {
      art.sort(function(a, b) {
        var nameA = a.artist.toUpperCase();
        var nameB = b.artist.toUpperCase();
        if (nameA > nameB) {
          return -1;
        }
        if (nameA < nameB) {
          return 1;
        }

        // names must be equal
        return 0;
      });
    } else if (strUser == 7) {
      art.sort(function(a, b) {
        var nameA = a.artist.toUpperCase();
        var nameB = b.artist.toUpperCase();
        if (nameA < nameB) {
          return -1;
        }
        if (nameA > nameB) {
          return 1;
        }

        // names must be equal
        return 0;
      });
    } else if (strUser == 8) {
      art.sort(function(a, b) {
        var nameA = a.location.toUpperCase();
        var nameB = b.location.toUpperCase();
        if (nameA > nameB) {
          return -1;
        }
        if (nameA < nameB) {
          return 1;
        }

        // names must be equal
        return 0;
      });
    } else if (strUser == 9) {
      art.sort(function(a, b) {
        var nameA = a.location.toUpperCase();
        var nameB = b.location.toUpperCase();
        if (nameA < nameB) {
          return -1;
        }
        if (nameA > nameB) {
          return 1;
        }

        // names must be equal
        return 0;
      });
    }

    console.log(art);

    var htmlCode = '';

    var category = 0;
    for (var i=0; i<categories.length; i++) {
      category = categories[i]['id'];

      htmlCode += '<h1>'+categories[i]['name']+'</h1>';
      var j=0;
      for (var k=0; k<art.length; k++) {
        if (art[k]['status'] == 'Ready') {
          if (art[k]['category_id'] == category && category == categories[i]['id']) {
            if (j%3==0 && j!=0) {
              htmlCode += '</div>';
              htmlCode += '<div class="card-row" style="height:auto; margin-top:10px;">';

              htmlCode += '<a href="/artwork/artItem?id='+art[k]['id']+'" class="art-card">';
              htmlCode += '<div class="card-img-container">';
              htmlCode += '<img src="/images/artwork/'+art[k]['id']+'[0].jpg" alt="" class="card-img">';
              htmlCode += '</div>';
              htmlCode += '<div class="art-card-content">';
              htmlCode += '<h2 style="margin:5px;"><strong>Name: </strong>'+art[k]['name']+'</h2>';
              htmlCode += '<p>';
              htmlCode += '<strong>Starting Bid: </strong>';
              htmlCode += '£'+art[k]['start_price'];
              htmlCode += '</p>';
              htmlCode += '<p>';

              if (art[k]['auction_id'] != '-1') {
                htmlCode += '<strong>Next Auction: </strong>';
                        // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                htmlCode += 'In: ';
                htmlCode += art[k]['auction_location'];
                htmlCode += ' On: ';
                htmlCode += art[k]['date'];
                htmlCode += ' At: ';
                htmlCode += art[k]['time'];//.'</a>';
              } else {
                htmlCode += '<strong>Next Auction: </strong>';
                htmlCode += 'No Auction Date Set';
              }

              htmlCode += '</p>';
              htmlCode += '</div>';
              htmlCode += '<div class="card-more">';
              htmlCode += '<button type="button" name="button">View Art Item</button>';
              htmlCode += '</div>';
              htmlCode += '</a>';
            } else if (j%3!=0) {
              htmlCode += '<a href="/artwork/artItem?id='+art[k]['id']+'" class="art-card">';
              htmlCode += '<div class="card-img-container">';
              htmlCode += '<img src="/images/artwork/'+art[k]['id']+'[0].jpg" alt="" class="card-img">';
              htmlCode += '</div>';
              htmlCode += '<div class="art-card-content">';
              htmlCode += '<h2 style="margin:5px;"><strong>Name: </strong>'+art[k]['name']+'</h2>';
              htmlCode += '<p>';
              htmlCode += '<strong>Starting Bid: </strong>';
              htmlCode += '£'+art[k]['start_price'];
              htmlCode += '</p>';
              htmlCode += '<p>';

              if (art[k]['auction_id'] != '-1') {
                htmlCode += '<strong>Next Auction: </strong>';
                        // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                htmlCode += 'In: ';
                htmlCode += art[k]['auction_location'];
                htmlCode += ' On: ';
                htmlCode += art[k]['date'];
                htmlCode += ' At: ';
                htmlCode += art[k]['time'];//.'</a>';
              } else {
                htmlCode += '<strong>Next Auction: </strong>';
                htmlCode += 'No Auction Date Set';
              }

              htmlCode += '</p>';
              htmlCode += '</div>';
              htmlCode += '<div class="card-more">';
              htmlCode += '<button type="button" name="button">View Art Item</button>';
              htmlCode += '</div>';
              htmlCode += '</a>';
            } else {
              htmlCode += '<div class="card-row" style="height:auto; margin-top:10px;">';

              htmlCode += '<a href="/artwork/artItem?id='+art[k]['id']+'" class="art-card">';
              htmlCode += '<div class="card-img-container">';
              htmlCode += '<img src="/images/artwork/'+art[k]['id']+'[0].jpg" alt="" class="card-img">';
              htmlCode += '</div>';
              htmlCode += '<div class="art-card-content">';
              htmlCode += '<h2 style="margin:5px;"><strong>Name: </strong>'+art[k]['name']+'</h2>';
              htmlCode += '<p>';
              htmlCode += '<strong>Starting Bid: </strong>';
              htmlCode += '£'+art[k]['start_price'];
              htmlCode += '</p>';
              htmlCode += '<p>';

              if (art[k]['auction_id'] != '-1') {
                htmlCode += '<strong>Next Auction: </strong>';
                        // echo '<a href="/artwork/bid?artwork='.$artwork['auction_id'].'">';
                htmlCode += 'In: ';
                htmlCode += art[k]['auction_location'];
                htmlCode += ' On: ';
                htmlCode += art[k]['date'];
                htmlCode += ' At: ';
                htmlCode += art[k]['time'];//.'</a>';
              } else {
                htmlCode += '<strong>Next Auction: </strong>';
                htmlCode += 'No Auction Date Set';
              }

              htmlCode += '</p>';
              htmlCode += '</div>';
              htmlCode += '<div class="card-more">';
              htmlCode += '<button type="button" name="button">View Art Item</button>';
              htmlCode += '</div>';
              htmlCode += '</a>';
            }
            j++;
          }
        }
      }
      if (j==0 && category == categories[i]['id']) {
        htmlCode += '<p>No Artwork</p>';
      } else if (category == categories[i]['id']) {
        htmlCode += '</div>';
      }
    }
    console.log(htmlCode);
    document.getElementById('data').innerHTML = htmlCode;
  }

  function myLoadEvent() {
    document.getElementById("sort-order").addEventListener('change', change);
    change();
  }

  var art = <?=json_encode($templateVars[3])?>;
  console.log(art);
  var categories = <?=json_encode($templateVars[0])?>;
  document.addEventListener('DOMContentLoaded', myLoadEvent);
</script>
