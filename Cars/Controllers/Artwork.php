<?php
namespace Cars\Controllers;
class Artwork {
  private $auctionsTable;
	private $artworkTable;
	private $categoriesTable;
  private $usersTable;
  private $locationsTable;

	public function __construct($categoriesTable, $artworkTable, $auctionsTable, $usersTable, $locationsTable) {
		$this->categoriesTable = $categoriesTable;
		$this->auctionsTable = $auctionsTable;
    $this->artworkTable = $artworkTable;
    $this->usersTable = $usersTable;
    $this->locationsTable = $locationsTable;
	}

	public function artwork() {
    $categories = $this->getCategories();

    $artworkVariables = [];
    $artwork = [$artworkVariables];

    if (isset($_GET['category'])) {
      $artworkList = $this->artworkTable->find('category_id',$_GET['category']);//,'category_id','ASC');
      $artwork = $this->artworkList($artworkList, 'Ready');
    } else if (isset($_GET['artist'])) {
      $artworkList = $this->artworkTable->find('artist',$_GET['artist']);
      $artwork = $this->artworkList($artworkList, 'Ready');
    } else {
      $artworkList = $this->artworkTable->findAll();
      $artwork = $this->artworkList($artworkList, 'Ready');
    }

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
    $vars[3] = $artwork;

    if (isset($_GET['category'])) {
      $vars[4] = $this->categoriesTable->find('category_id', $_GET['category'])[0]['name'];
    }

    return [
			'template' => 'artwork.html.php',
			'variables' => $vars,
      'categories' => $categories,
			'title' => 'Fotheby\'s Auction House - Artwork'
		];
	}

  public function search() {
    $categories = $this->getCategories();

    $artwork = [];

    if (isset($_POST['search'])) {
      $artworkList = $this->artworkTable->findLike('name', $_POST['search']);
      $artwork = $this->artworkList($artworkList, 'Ready');
    } else {
      $artworkList = $this->artworkTable->findSearch($_POST['name'], $_POST['artist'], $_POST['min'], $_POST['max']);
      $artworkData = [];
      $k=0;

      foreach($artworkList as $artwork) {
        if(isset($artwork['next_auction'])) {
          $auctionDetails = $this->auctionsTable->find('auction_id', $artwork['next_auction']);
          if (sizeof($auctionDetails) > 0) {
            $auctionDate = date('Y-m-d', strtotime($auctionDetails[0]['date']));
            $location = $auctionDetails[0]['location_id'];
          } else {
            $auctionDate = date('Y-m-d', -1);
            $location = '-1';
          }
        }

        $continue = true;
        if ($_POST['location'] > 0 && $_POST['location'] != $location) {
          $continue = false;
        }
        if ($_POST['category'] > 0 && $_POST['category'] != $artwork['category_id']) {
          $continue = false;
        }
        if ($artwork['status'] == 'Ready' && $continue == true) {
          if (trim($_POST['start']) !== "" && trim($_POST['end']) !== "") {
            if (date('Y-m-d', strtotime($_POST['start'])) < $auctionDate && date('Y-m-d', strtotime($_POST['end'])) > $auctionDate) {
              $artworkData[$k++] = $this->artworkDetails($artwork, $location);
            }
          } else if (trim($_POST['start']) !== "") {
            if (date('Y-m-d', strtotime($_POST['start'])) < $auctionDate) {
              $artworkData[$k++] = $this->artworkDetails($artwork, $location);
            }
          } else if (trim($_POST['end']) !== "") {
            if (date('Y-m-d', strtotime($_POST['end'])) > $auctionDate) {
              $artworkData[$k++] = $this->artworkDetails($artwork, $location);
            }
          } else {
            $artworkData[$k++] = $this->artworkDetails($artwork, $location);
          }
        }

      }

      $artwork = $artworkData;
    }

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
    $vars[3] = $artwork;

    if (isset($_POST['search'])) {
      $vars[4] = $_POST['search'];
    } else {
      $vars[4] = $_POST['name'];
    }

    return [
			'template' => 'search.html.php',
			'variables' => $vars,
      'categories' => $categories,
			'title' => 'Fotheby\'s Auction House - Artwork'
		];
	}

  function artworkDetails($artwork) {
    $artworkVariables = [
      'start_price' => $artwork['estimated_amount'],
      'name'=> $artwork['name'],
      'id' => $artwork['artwork_id'],
      'status' => $artwork['status'],
      'artist' => $artwork['artist'],
      'year' => $artwork['year'],
      'number_of_images' => $artwork['number_of_images'],
      'category_id' => $artwork['category_id'],
      'auction_id' => '-1',
      'auction_location' => '',
      'auction_date' => '',
      'location_id' => '',
      'location' => ''
    ];

    if(isset($artwork['next_auction'])) {
      $auctionDetails = $this->auctionsTable->find('auction_id', $artwork['next_auction']);
      foreach ($auctionDetails as $key) {
        $location = $this->locationsTable->find('location_id', $key['location_id'])[0];
        $artworkVariables['auction_id'] = $key['auction_id'];
        $artworkVariables['auction_location'] = $this->locationsTable->find('location_id', $key['location_id'])[0]['name'];
        $artworkVariables['auction_date'] = strtotime($key['date']);
        $artworkVariables['date'] = date('d/m/Y', strtotime($key['date']));
        $artworkVariables['time'] = date('H:i', strtotime($key['date']));
        $artworkVariables['location_id'] = $location['location_id'];
        $artworkVariables['location'] = $location['name'];
      }
    }

    return $artworkVariables;
  }

  function artworkList($artworkList, $status) {
    $artworkData = [];
    $k=0;

    foreach($artworkList as $artwork) {
      if ($artwork['status'] == $status) {
        $artworkData[$k++] = $this->artworkDetails($artwork);
      }
    }

    return $artworkData;
  }

  public function artItem() {
    $categories = $this->getCategories();

    $artItem = $this->artworkTable->find('artwork_id', $_GET['id'])[0];
    $artItem['category'] = $this->categoriesTable->find('category_id', $artItem['category_id'])[0]['name'];

    $similarList = $this->artworkTable->find('artist', $artItem['artist']);
    $similarItems = [];

    $i=0;
    foreach ($similarList as $art) {
      if ($art['artwork_id'] != $artItem['artwork_id'] && $art['category_id'] == $artItem['category_id']) {
        $similarItems[$i++] = $this->artworkDetails($art);
      }
    }

    shuffle($similarItems);

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
    $vars[3] = $artItem;
    $vars[4] = $similarItems;

    return [
			'template' => 'artItem.html.php',
			'variables' => $vars,
      'categories' => $categories,
			'title' => 'Fotheby\'s Auction House - Art Item'
		];
  }

  public function list() {
    $categories = $this->getCategories();

    $artworkList = $this->artworkTable->findAll();//Sort('category_id','ASC');

    $artworkList = $this->sortASC($artworkList, 'category_id');

    $artworkPending = $this->artworkList($artworkList, 'Pending Valuation');
    $artworkReady = $this->artworkList($artworkList, 'Ready');
    $artworkSold = $this->artworkList($artworkList, 'Sold');

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
    $vars[3] = $artworkReady;
    $vars[4] = $artworkPending;
    $vars[5] = $artworkSold;

    return [
			'template' => 'admin/artwork.html.php',
			'variables' => $vars,
      'categories' => $categories,
			'title' => 'Fotheby\'s Auction House - Artwork'
		];
  }

  function sortASC($sortList, $field) {
    $sortKey = array();
    foreach ($sortList as $key => $row) {
      $sortKey[$key] = $row[$field];
    }
    array_multisort($sortKey, SORT_ASC, $sortList);
    return $sortList;
  }

  function sortDESC($sortList, $field) {
    $sortKey = array();
    foreach ($sortList as $key => $row) {
      $sortKey[$key] = $row[$field];
    }
    array_multisort($sortKey, SORT_DESC, $sortList);
    return $sortList;
  }

  public function valuation() {
    $categories = $this->getCategories();

    $artworkList = $this->sortDESC($this->artworkTable->findAll(), 'category_id');
    $artworkPending = $this->artworkList($artworkList, 'Pending Valuation');

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
    $vars[3] = $artworkPending;

    return [
			'template' => 'admin/valuation.html.php',
			'variables' => $vars,
      'categories' => $categories,
			'title' => 'Fotheby\'s Auction House - Valuations'
		];
  }

  function add(){
		$categories = $this->getCategories();

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();

		return [
      'template' => '/sell.html.php',
			'title' => 'Fotheby\'s Auction House - Category Add',
			'categories' => $categories,
			'variables' => $vars
		];
	}

	function edit(){
		$categories = $this->getCategories();

		$vars = [];
		$vars[0] = $categories;
		$vars[1] = $this->artworkTable->find('artwork_id', $_GET['id'])[0];
    $vars[2] = $this->usersTable->find('account_type', 'Seller');
    $vars[3] = $this->usersTable->find('account_type', 'Buyer');
    $vars[4] = $this->usersTable->find('account_type', 'Admin');

		return [
      'template' => '/admin/artworkEdit.html.php',
			'title' => 'Fotheby\'s Auction House - Artwork Edit',
			'categories' => $categories,
			'variables' => $vars
		];
	}

  public function addArtSubmit() {
    echo 'art';

		$this->artworkTable->save($_POST['artwork']);

		//http://www.javascripthive.info/php/php-multiple-files-upload-validation/

		$i=0;

		foreach($_FILES['files']['tmp_name'] as $key=>$tmp_name){
	    $temp = $_FILES['files']['tmp_name'][$key];

			$fileName = $this->artworkTable->getLastInsertID() . '[' . $i++ . '].jpg';
	    if(empty($temp)) {
	        break;
	    }

	    move_uploaded_file($temp, '../public/images/artwork/'.$fileName);
		}

		$art = [
			'artwork_id' => $this->artworkTable->getLastInsertID(),
			'number_of_images' => $i
		];

		$this->saveArt($art);
	}

	function save() {
		$artwork = $_POST['artwork'];
		$this->artworkTable->save($artwork);
		header('location: /admin/artwork');
	}

  function valuationSubmit() {
		$artwork = $_POST['art'];
		$this->artworkTable->save($artwork);
		header('location: /admin/artwork');
	}

  public function saveArt($art) {
		$this->artworkTable->save($art);
		header('location: /');
	}

	function delete() {
		$this->artworkTable->delete($_POST['id']);
		header('location: /admin/artwork');
	}

  function getCategories() {
    $categoryVariables = [];
    $categories = [$categoryVariables];
    $j=0;

    $categoryList = $this->categoriesTable->findAll();
    foreach ($categoryList as $category) {
      $categoryVariables = [
        'id' => $category['category_id'],
        'name' => $category['name'],
        'description' => $category['description'],
        'one' => $category['extra_one_name'],
        'two' => $category['extra_two_name'],
        'three' => $category['extra_three_name'],
        'four' => $category['extra_four_name'],
        'one_desc' => $category['extra_one_desc'],
        'two_desc' => $category['extra_two_desc'],
        'three_desc' => $category['extra_three_desc'],
        'four_desc' => $category['extra_four_desc']
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
