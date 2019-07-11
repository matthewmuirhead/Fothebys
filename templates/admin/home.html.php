<div class="width80">
  <div class="homepage-info">
    <?php
      require 'menu.html.php';
    ?>
    <div class="main-text">
      <h2>Welcome <?=$_SESSION['user']?></h2>
      <p>You are now logged in | <a href="/logout">Logout?</a></p>


      <div class="card-row" style="height:auto; margin-top:10px;">
        <a href="/admin/artwork">
          <div class="card" style="height:383px;">
            <div class="card-img-container">
              <img src="/images/banners/img1.jpg" alt="Calender" class="card-img">
            </div>
            <div class="card-content" style="height:100px;">
              <h2 style="margin:5px;">Artwork</h2>
              <p>
                Manage artwork listed on site.
              </p>
            </div>
            <a href="/admin/artwork" class="card-more"><button type="button" name="button">View Details</button></a>
          </div>
        </a>
        <a href="/admin/auction">
          <div class="card" style="height:383px;">
            <div class="card-img-container">
              <img src="/images/banners/img2.jpg" alt="Calender" class="card-img">
            </div>
            <div class="card-content" style="height:100px;">
              <h2 style="margin:5px;">Auctions</h2>
              <p>
                Manage auctions.
              </p>
            </div>
            <a href="/admin/auction" class="card-more"><button type="button" name="button">View Details</button></a>
          </div>
        </a>
        <a href="/admin/category">
          <div class="card" style="height:383px;">
            <div class="card-img-container">
              <img src="/images/banners/img3.jpg" alt="Calender" class="card-img">
            </div>
            <div class="card-content" style="height:100px;">
              <h2 style="margin:5px;">Categories</h2>
              <p>
                Manage categories for artwork.
              </p>
            </div>
            <a href="/admin/category" class="card-more"><button type="button" name="button">View Details</button></a>
          </div>
        </a>
      </div>

      <div class="card-row" style="height:auto; margin-top:10px;">
        <a href="/admin/user">
          <div class="card" style="height:383px;">
            <div class="card-img-container">
              <img src="/images/banners/img4.jpg" alt="Calender" class="card-img">
            </div>
            <div class="card-content" style="height:100px;">
              <h2 style="margin:5px;">Users</h2>
              <p>
                Manage the system users.
              </p>
            </div>
            <a href="/admin/user" class="card-more"><button type="button" name="button">View Details</button></a>
          </div>
        </a>

        <a href="/admin/valuations">
          <div class="card" style="height:383px;">
            <div class="card-img-container">
              <img src="/images/banners/img5.jpg" alt="Calender" class="card-img">
            </div>
            <div class="card-content" style="height:100px;">
              <h2 style="margin:5px;">Valuations</h2>
              <p>
                Submit valuations on artwork.
              </p>
            </div>
            <a href="/admin/valuations" class="card-more"><button type="button" name="button">View Details</button></a>
          </div>
        </a>
        <a href="/logout">
          <div class="card" style="height:383px;">
            <div class="card-img-container">
              <img src="/images/banners/img6.jpg" alt="Calender" class="card-img">
            </div>
            <div class="card-content" style="height:100px;">
              <h2 style="margin:5px;">Logout</h2>
            </div>
            <a href="/logout" class="card-more"><button type="button" name="button">View Details</button></a>
          </div>
        </a>
      </div>
    </div>
  </div>
</div>
