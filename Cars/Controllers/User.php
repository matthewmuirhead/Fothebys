<?php
namespace Cars\Controllers;
class User {
	private $usersTable;
  private $categoriesTable;
	private $auctionsTable;
	private $locationsTable;
	private $artworkTable;

	public function __construct($usersTable, $categoriesTable, $artworkTable, $locationsTable, $auctionsTable) {
		$this->usersTable = $usersTable;
    $this->categoriesTable = $categoriesTable;
		$this->artworkTable = $artworkTable;
		$this->locationsTable = $locationsTable;
		$this->auctionsTable = $auctionsTable;
	}

  public function register() {

  }

  public function login() {
		$categories = $this->getCategories();

    return [
      'template' => '/login.html.php',
			'title' => 'Fotheby\'s Auction House - Log In',
			'categories' => $categories,
			'variables' => []
		];
  }

  function loginSubmit() {
    $stmt = $this->usersTable->findAll();
		$found = false;
    foreach ($stmt as $row) {
      if ($row['username'] == $_POST['username'] && $row['password'] == password_verify($_POST['password'], $row['password'])) {
        $_SESSION['loggedin'] = 'logged in';
				$_SESSION['id'] = $row['user_id'];
				$_SESSION['user'] = $row['first_name'].' '.$row['surname'];
				$_SESSION['account'] = $row['account_type'];
				$found = true;
				if ($_SESSION['account'] == 'Admin') {
					header('location: /admin');
				} else {
					header('location: /');
				}

      }
    }
		if ($found == false) {
			header('location: /login');
		}
  }

  public function logout() {
    unset($_SESSION['loggedin']);
    session_destroy();

    header('location: /');
  }

  function adminHome() {
		$categories = $this->getCategories();

    return [
      'template' => '/admin/home.html.php',
			'title' => 'Fotheby\'s Auction House - Admin Home',
			'categories' => $categories,
			'variables' => []
		];
  }

	function list() {
		$categories = $this->getCategories();

		$usersVariables = [];
		$users = [$usersVariables];
		$i=0;

		$userList = $this->usersTable->findAll();
		foreach ($userList as $user) {
			$usersVariables = [
				'id' => $user['user_id'],
				'name' => $user['first_name'] . ' ' . $user['surname'],
				'username' => $user['username'],
				'account' => $user['account_type'],
				'creation' => date('d/m/Y', strtotime($user['account_creation']))
			];
			$users[$i++] = $usersVariables;
		}

		$vars = [];
		$vars[0] = $categories;
		$vars[1] = $users;

		return [
      'template' => '/admin/users.html.php',
			'title' => 'Fotheby\'s Auction House - Users',
			'categories' => $categories,
			'variables' => $vars
		];
	}

	function add(){
		$categories = $this->getCategories();

		return [
      'template' => '/admin/usersAdd.html.php',
			'title' => 'Fotheby\'s Auction House - User Add',
			'categories' => $categories,
			'variables' => []
		];
	}

	function edit(){
		$categories = $this->getCategories();

		$vars = [];
		$vars[0] = $categories;
		$vars[1] = $this->usersTable->find('user_id', $_GET['id'])[0];

		return [
      'template' => '/admin/usersEdit.html.php',
			'title' => 'Fotheby\'s Auction House - User Edit',
			'categories' => $categories,
			'variables' => $vars
		];
	}

	function profile() {
		$categories = $this->getCategories();

		$vars = [];
		$vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
		$vars[3] = $this->usersTable->find('user_id', $_SESSION['id'])[0];
		$vars[4] = $this->artworkList($this->artworkTable->find('seller', $_SESSION['id']), 'Sold');
		$vars[5] = $this->artworkList($this->artworkTable->find('seller', $_SESSION['id']), 'Ready');
		$vars[6] = $this->artworkList($this->artworkTable->find('buyer', $_SESSION['id']), 'Sold');

		return [
      'template' => '/profile.html.php',
			'title' => 'Fotheby\'s Auction House - My Profile',
			'categories' => $categories,
			'variables' => $vars
		];
	}

	function artworkList($artworkList, $status) {
    $artworkData = [];
    $k=0;

    foreach($artworkList as $artwork) {
      if ($artwork['status'] == $status) {
        $artworkVariables = [
          'start_price' => $artwork['start_amount'],
					'estimated_amount' => $artwork['estimated_amount'],
          'name'=> $artwork['name'],
          'id' => $artwork['artwork_id'],
          'status' => $artwork['status'],
          'number_of_images' => $artwork['number_of_images'],
          'category_id' => $artwork['category_id'],
          'auction_id' => '-1',
          'auction_location' => '',
          'auction_date' => '',
					'sold_amount' => $artwork['sold_amount'],
					'artist' => $artwork['artist'],
					'year' => $artwork['year']
        ];

        if(isset($artwork['next_auction'])) {
          $auctionDetails = $this->auctionsTable->find('auction_id', $artwork['next_auction']);
          foreach ($auctionDetails as $key) {
            $artworkVariables['auction_id'] = $key['auction_id'];
            $artworkVariables['auction_location'] = $this->locationsTable->find('location_id', $key['location_id'])[0]['name'];
            $artworkVariables['auction_date'] = strtotime($key['date']);
          }
        }

        $artworkData[$k++] = $artworkVariables;
      }
    }

    return $artworkData;
  }

	function save() {
		$user = $_POST['user'];
		$user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
		$this->usersTable->save($user);
		header('location: /admin/user');
	}

	function delete() {
		$this->usersTable->delete($_POST['id']);
		header('location: /admin/user');
	}

	function getCategories() {
    $categoryVariables = [];
    $categories = [$categoryVariables];
    $j=0;

    $categoryList = $this->categoriesTable->findAll();
    foreach ($categoryList as $category) {
      $categoryVariables = [
        'id' => $category['category_id'],
        'name' => $category['name']
      ];
      $categories[$j++] = $categoryVariables;
    }
    return $categories;
  }

	function getSellers() {
    $userVariables = [];
    $users = [];
    $userList = $this->artworkTable->findRowCount('artist', 'DESC');
    $t=0;
    foreach ($userList as $user) {
      // if ($user['account_type'] == 'Seller') {
        $userVariables = [
          'name' => $user['artist'],
  		  ];
        $users[$t++] = $userVariables;
      // }
    }

    return $users;
  }

	function getLocations() {
    $locationVariables = [];
    $locations = [];
    $locationList = $this->locationsTable->findAll();
    $t=0;
    foreach ($locationList as $location) {
      $locationVariables = [
        'name' => $location['name'],
        'id' => $location['location_id']
      ];
      $locations[$t++] = $locationVariables;
    }

    return $locations;
  }
}
