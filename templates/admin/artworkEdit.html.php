<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h2>Update Artwork</h2>

      <form class="input-form" action="" method="POST">
        <span><input type="hidden" name="artwork[artwork_id]" value="<?=$templateVars[1]['artwork_id']?>" /></span>
        <span><label>Name:</label><input type="text" name="artwork[name]" required value="<?=$templateVars[1]['name']?>" /></span>

        <span>
          <label>Category:</label><select id="sell-category" name="artwork[category_id]" required>
            <?php
              foreach ($templateVars[0] as $category) {
                ?>
                  <option value="<?=$category['id']?>" <?php if ($category['id'] == $templateVars[1]['category_id']) echo 'selected' ?>><?=$category['name']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span><label>Artist:</label><input type="text" name="artwork[artist]" required value="<?=$templateVars[1]['artist']?>" /></span>
        <span><label>Year:</label><input type="text" name="artwork[year]" required value="<?=$templateVars[1]['year']?>" /></span>

        <span>
          <label>Status:</label>
          <select id="sell-category" name="artwork[status]" required>
            <option value="Pending Valuation" <?php if ('Pending Valuation' == $templateVars[1]['status']) echo 'selected' ?>>Pending Valuation</option>
            <option value="Ready" <?php if ('Ready' == $templateVars[1]['status']) echo 'selected' ?>>Ready</option>
            <option value="Sold" <?php if ('Sold' == $templateVars[1]['status']) echo 'selected' ?>>Sold</option>
          </select>
        </span>

        <span><label>Start Amount:</label><input type="text" name="artwork[start_amount]" required value="<?=$templateVars[1]['start_amount']?>"/></span>
        <span><label>Estimated Amount:</label><input type="text" name="artwork[estimated_amount]" required value="<?=$templateVars[1]['estimated_amount']?>"/></span>

        <span>
          <label>Valuation By:</label>
          <select name="artwork[valuation_by]" required>
            <?php
              foreach ($templateVars[4] as $category) {
                ?>
                  <option value="<?=$category['user_id']?>" <?php if ($category['user_id'] == $templateVars[1]['valuation_by']) echo 'selected' ?>><?=$category['first_name']?> <?=$category['surname']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span><label>Valuation Date:</label><input type="date" name="artwork[valuation_date]" required value="<?=$templateVars[1]['valuation_date']?>"/></span>

        <span>
          <label>Seller:</label>
          <select name="artwork[seller]" required>
            <?php
              foreach ($templateVars[2] as $category) {
                ?>
                  <option value="<?=$category['user_id']?>" <?php if ($category['user_id'] == $templateVars[1]['seller']) echo 'selected' ?>><?=$category['first_name']?> <?=$category['surname']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span>
          <label>Buyer:</label>
          <select name="artwork[buyer]" required>
            <option value="0">Not Sold</option>
            <?php
              foreach ($templateVars[3] as $category) {
                ?>
                  <option value="<?=$category['user_id']?>" <?php if ($category['user_id'] == $templateVars[1]['buyer']) echo 'selected' ?>><?=$category['first_name']?> <?=$category['surname']?></option>
                <?php
              }
            ?>
          </select>
        </span>

        <span><label>Sold Amount:</label><input type="text" name="artwork[sold_amount]" required value="<?=$templateVars[1]['sold_amount']?>"/></span>

        <span>
          <label id="extra-one-label" <?php if (!isset($templateVars[0][0]['one'])) echo 'style="display:none;"'?>><?=$templateVars[0][0]['one']?>:</label>
            <input id="extra-one-input" type="text" name="artwork[extra_one]" <?php if (!isset($templateVars[0][0]['one'])){ echo 'style="display:none;"';} else { echo 'required';}?> value="<?=$templateVars[1]['extra_one']?>"/>
        </span>

        <span>
          <label id="extra-two-label" <?php if (!isset($templateVars[0][0]['two'])) echo 'style="display:none;"'?>><?=$templateVars[0][0]['two']?>:</label>
            <input id="extra-two-input" type="text" name="artwork[extra_two]" <?php if (!isset($templateVars[0][0]['two'])){ echo 'style="display:none;"';} else { echo 'required';}?> value="<?=$templateVars[1]['extra_two']?>"/>
        </span>

        <span>
          <label id="extra-three-label" <?php if (!isset($templateVars[0][0]['three'])) echo 'style="display:none;"'?>><?=$templateVars[0][0]['three']?>:</label>
            <input id="extra-three-input" type="text" name="artwork[extra_three]" <?php if (!isset($templateVars[0][0]['three'])){ echo 'style="display:none;"';} else { echo 'required';}?> value="<?=$templateVars[1]['extra_three']?>"/>
        </span>

        <span>
          <label id="extra-four-label" <?php if (!isset($templateVars[0][0]['four'])) echo 'style="display:none;"'?>><?=$templateVars[0][0]['four']?>:</label>
            <input id="extra-four-input" type="text" name="artwork[extra_four]" <?php if (!isset($templateVars[0][0]['four'])){ echo 'style="display:none;"';} else { echo 'required';}?> value="<?=$templateVars[1]['extra_four']?>"/>
        </span>

        <span><label>Image:</label><input type="file" name="files[]" multiple="multiple" /></span>
        <input type="submit" name="submit" value="Edit Artwork" />
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
      document.getElementById("extra-one-label").style = 'display:inline;';
      document.getElementById("extra-one-input").style = 'display:inline;';
      document.getElementById("extra-one-input").required = true;
      document.getElementById("extra-one-label").innerHTML = categories[strUser]['one'].concat(':');
    }
    if (categories[strUser]['two'] == null) {
      document.getElementById("extra-two-label").style = 'display:none;';
      document.getElementById("extra-two-input").style = 'display:none;';
      document.getElementById("extra-two-input").required = false;
    } else {
      document.getElementById("extra-two-label").style = 'display:inline;';
      document.getElementById("extra-two-input").style = 'display:inline;';
      document.getElementById("extra-two-input").required = true;
      document.getElementById("extra-two-label").innerHTML = categories[strUser]['two'].concat(':');
    }
    if (categories[strUser]['three'] == null) {
      document.getElementById("extra-three-label").style = 'display:none;';
      document.getElementById("extra-three-input").style = 'display:none;';
      document.getElementById("extra-three-input").required = false;
    } else {
      document.getElementById("extra-three-label").style = 'display:inline;';
      document.getElementById("extra-three-input").style = 'display:inline;';
      document.getElementById("extra-three-input").required = true;
      document.getElementById("extra-three-label").innerHTML = categories[strUser]['three'].concat(':');
    }
    if (categories[strUser]['four'] == null) {
      document.getElementById("extra-four-label").style = 'display:none;';
      document.getElementById("extra-four-input").style = 'display:none;';
      document.getElementById("extra-four-input").required = false;
    } else {
      document.getElementById("extra-four-label").style = 'display:inline;';
      document.getElementById("extra-four-input").style = 'display:inline;';
      document.getElementById("extra-four-input").required = true;
      document.getElementById("extra-four-label").innerHTML = categories[strUser]['four'].concat(':');
    }
  });
</script>
