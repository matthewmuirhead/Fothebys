<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="/style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville" rel="stylesheet">
		<script type="text/javascript" src="/main.js"></script>
    <link rel="shortcut icon" href="/images/logo.png"/><!-- Favicon -->
		<title><?=$title?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
	<body>
    <div class="header">
			<div class="header-left">
				<a href="/" class="header-img"><img src="/images/logo.png" alt="Fotheby's Auction House Logo"></a>
			</div>
      <div class="header-info">
        <div class="nav-top">
					<div class="header-right">
						<form class="search hide-search" action="/search" method="post">
							<label class="fa fa-search"></label>
							<input type="text" name="search" value="">
							<input type="submit" name="submit" value="Search" />
						</form>
	          <div class="user">
	            <?php
	              if (isset($_SESSION['id'])) {
	                ?><a href="/profile"><p>Logged in as: <?=$_SESSION['user']?></p></a>
									<?php if ($_SESSION['account'] == 'Admin') { ?>
										<a href="/admin"><strong>Admin</strong></a>
									<?php } ?>
	                <a href="/logout"><strong>Logout</strong></a><?php
	              } else {
	                ?>
										<div class="login-popup">
											<p class="" onclick="myFunction(this)">Login</p>
											<div class="login-popup-form" id="login-popup-form">
												<form class="login-form" action="/login" method="post">
													<span><label style="width:auto">Username: </label><input type="text" name="username" value=""></span>
													<span><label style="width:auto">Password: </label><input type="password" name="password" value=""></span>
													<input type="submit" name="submit" value="Login">
												</form>
											</div>
										</div>
									<?php
	              }
	            ?>
	          </div>
					</div>
        </div>

        <ul class="nav-links">
          <li class="nav-button"><a href="/">Home</a></li>
          <li class="nav-button"><a href="/artwork">Catalogue</a>
            <ul>
							<?php
								foreach ($categories as $key) {
									?>
										<a href="/artwork?category=<?=$key['id']?>"><li><?=$key['name']?></li></a>
									<?php
								}
							?>
            </ul>
          </li>
					<li class="nav-button"><a href="/auction">Auctions</a></li>
          <li class="nav-button"><a href="/sell">Sell</a></li>
        </ul>
      </div>
    </div>
    <main>

      <?=$output?>
    </main>

    <footer>
      &copy; Fotheby's Auction House
    </footer>


  </body>
</html>


<script>
  document.getElementById("login-popup").addEventListener('onclick', (event) => {
		console.log(document.getElementById('login-popup-form').style.display);
		document.getElementById('login-popup-form').style.display = "flex";
		console.log(document.getElementById('login-popup-form').style.display);
  });
</script>
