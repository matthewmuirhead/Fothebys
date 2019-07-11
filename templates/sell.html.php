<div class="width80">
  <div class="homepage-info">
    <?php
      require 'sidebar.html.php';
    ?>
    <div class="main-text">
      <h2>Sell Artwork with us</h2>
      <p>
        Fill out the required details and we will be in touch about a valuation of your artwork
      </p>

      <form class="input-form" action="" method="POST" enctype="multipart/form-data">
        <span><label>Name:</label><input type="text" name="artwork[name]" required/></span>

        <span>
          <label>Category:</label><select id="sell-category" name="artwork[category_id]" required>
            <?php
              foreach ($templateVars[0] as $category) {
                ?>
                  <option value="<?=$category['id']?>"><?=$category['name']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span><label>Artist:</label><input type="text" name="artwork[artist]" required/></span>
        <span><label>Year:</label><input type="text" name="artwork[year]" required/></span>

        <span>
          <label id="extra-one-label" <?php if (!isset($templateVars[0][0]['one'])) echo 'style="display:none;"'?>><?=$templateVars[0][0]['one']?>:</label>
            <input id="extra-one-input" type="text" name="artwork[extra_one]" <?php if (!isset($templateVars[0][0]['one'])){ echo 'style="display:none;"';} else { echo 'required';}?>/>
        </span>

        <span>
          <label id="extra-two-label" <?php if (!isset($templateVars[0][0]['two'])) echo 'style="display:none;"'?>><?=$templateVars[0][0]['two']?>:</label>
            <input id="extra-two-input" type="text" name="artwork[extra_two]" <?php if (!isset($templateVars[0][0]['two'])){ echo 'style="display:none;"';} else { echo 'required';}?>/>
        </span>

        <span>
          <label id="extra-three-label" <?php if (!isset($templateVars[0][0]['three'])) echo 'style="display:none;"'?>><?=$templateVars[0][0]['three']?>:</label>
            <input id="extra-three-input" type="text" name="artwork[extra_three]" <?php if (!isset($templateVars[0][0]['three'])){ echo 'style="display:none;"';} else { echo 'required';}?>/>
        </span>

        <span>
          <label id="extra-four-label" <?php if (!isset($templateVars[0][0]['four'])) echo 'style="display:none;"'?>><?=$templateVars[0][0]['four']?>:</label>
            <input id="extra-four-input" type="text" name="artwork[extra_four]" <?php if (!isset($templateVars[0][0]['four'])){ echo 'style="display:none;"';} else { echo 'required';}?>/>
        </span>

        <span><label>Image:</label><input type="file" name="files[]" multiple="multiple" /></span>

        <input type="hidden" name="artwork[status]" required value="Pending Valuation"/>
        <input type="hidden" name="artwork[seller]" required value="<?=$_SESSION['id']?>"/>
        <input type="submit" name="submit" value="Submit" />
      </form>
    </div>
  </div>
</div>


<script>
  var categories = <?=json_encode($templateVars[0])?>;
  document.getElementById("sell-category").addEventListener('change', (event) => {
    var e = document.getElementById("sell-category");
    var strUser = e.options[e.selectedIndex].index;

    if (categories[strUser]['one'] == null) {
      document.getElementById("extra-one-label").style = 'display:none;';
      document.getElementById("extra-one-input").style = 'display:none;';
      document.getElementById("extra-one-input").required = false;
    } else {
      document.getElementById("extra-one-label").style = 'display:inline-block;';
      document.getElementById("extra-one-input").style = 'display:inline-block;';
      document.getElementById("extra-one-input").required = true;
      document.getElementById("extra-one-label").innerHTML = categories[strUser]['one'].concat(':');
    }
    if (categories[strUser]['two'] == null) {
      document.getElementById("extra-two-label").style = 'display:none;';
      document.getElementById("extra-two-input").style = 'display:none;';
      document.getElementById("extra-two-input").required = false;
    } else {
      document.getElementById("extra-two-label").style = 'display:inline-block;';
      document.getElementById("extra-two-input").style = 'display:inline-block;';
      document.getElementById("extra-two-input").required = true;
      document.getElementById("extra-two-label").innerHTML = categories[strUser]['two'].concat(':');
    }
    if (categories[strUser]['three'] == null) {
      document.getElementById("extra-three-label").style = 'display:none;';
      document.getElementById("extra-three-input").style = 'display:none;';
      document.getElementById("extra-three-input").required = false;
    } else {
      document.getElementById("extra-three-label").style = 'display:inline-block;';
      document.getElementById("extra-three-input").style = 'display:inline-block;';
      document.getElementById("extra-three-input").required = true;
      document.getElementById("extra-three-label").innerHTML = categories[strUser]['three'].concat(':');
    }
    if (categories[strUser]['four'] == null) {
      document.getElementById("extra-four-label").style = 'display:none;';
      document.getElementById("extra-four-input").style = 'display:none;';
      document.getElementById("extra-four-input").required = false;
    } else {
      document.getElementById("extra-four-label").style = 'display:inline-block;';
      document.getElementById("extra-four-input").style = 'display:inline-block;';
      document.getElementById("extra-four-input").required = true;
      document.getElementById("extra-four-label").innerHTML = categories[strUser]['four'].concat(':');
    }
  });
</script>
