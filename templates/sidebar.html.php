<div class="sidebar">
  <strong><h2>Categories</h2></strong>
  <a href="/artwork" style="padding:0.2em">Show All</a>
  <?php
    foreach ($templateVars[0] as $key) {
      ?>
        <a href="/artwork?category=<?=$key['id']?>" style="padding:0.2em"><?=$key['name']?></a>
      <?php
    }
  ?>

  <p></br></br></p>

  <strong><h2>Artists</h2></strong>
  <a href="/artwork" style="padding:0.2em">Show All</a>
  <?php
    foreach ($templateVars[1] as $key) {
      ?>
        <a href="/artwork?artist=<?=$key['name']?>" style="padding:0.2em"><?=$key['name']?></a>
      <?php
    }
  ?>

  <p></br></br></p>

  <strong><h2>Locations</h2></strong>
  <a href="/auction" style="padding:0.2em">Show All</a>
  <?php
    foreach ($templateVars[2] as $key) {

      ?>
        <a href="/auction?location=<?=$key['id']?>" style="padding:0.2em"><?=$key['name']?></a>
      <?php
    }
  ?>
</div>
