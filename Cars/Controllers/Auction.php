<?php
namespace Cars\Controllers;
class Auction {
  private $auctionsTable;
	private $categoriesTable;
  private $usersTable;
  private $locationsTable;
  private $artworkTable;

	public function __construct($categoriesTable, $auctionsTable, $usersTable, $locationsTable, $artworkTable) {
		$this->categoriesTable = $categoriesTable;
		$this->auctionsTable = $auctionsTable;
    $this->usersTable = $usersTable;
    $this->locationsTable = $locationsTable;
    $this->artworkTable = $artworkTable;
	}

  public function auctionList() {
    $categories = $this->getCategories();



    if (isset($_GET['month'])) {

    } else {
      $auctionThisList = $this->auctionsTable->findBetween('date', date('Y-m-d'), date('Y-m-d', strtotime('+30 days')));
      $auctionThis = $this->auctionMonth($auctionThisList);
      $auctionLastList = $this->auctionsTable->findBetween('date', date('Y-m-d', strtotime('-30 days')), date('Y-m-d'));
      $auctionLast = $this->auctionMonth($auctionLastList);
    }

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
    $vars[3] = $auctionThis;
    $vars[4] = $auctionLast;

    if (isset($_GET['location'])) {
      $vars[5] = $this->locationsTable->find('location_id', $_GET['location'])[0]['name'];
    }

    return [
      'template' => 'auction.html.php',
      'variables' => $vars,
      'categories' => $categories,
      'title' => 'Fotheby\'s Auction House - Auctions'
    ];
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

  function auctionMonth($auctionList) {
    $auctionVariables = [];
    $auctions = [];
    $i=0;

    foreach ($auctionList as $auctionItem) {
      if (isset($_GET['location'])) {
        if ($_GET['location'] == $auctionItem['location_id']) {
          $auctionVariables = [
            'id' => $auctionItem['auction_id'],
            'location' => $this->locationsTable->find('location_id', $auctionItem['location_id'])[0]['name'],
            'date' => strtotime($auctionItem['date']),
            'image' => $auctionItem['image'],
            'name' => $auctionItem['name']
          ];
          $auctions[$i++] = $auctionVariables;
        }
      } else {
        $auctionVariables = [
          'id' => $auctionItem['auction_id'],
          'location' => $this->locationsTable->find('location_id', $auctionItem['location_id'])[0]['name'],
          'date' => strtotime($auctionItem['date']),
          'image' => $auctionItem['image'],
          'name' => $auctionItem['name']
        ];
        $auctions[$i++] = $auctionVariables;
      }

    }

    return $auctions;
  }

  public function artList() {
    $categories = $this->getCategories();

    $auctionList = $this->auctionsTable->find('auction_id', $_GET['id']);
    $auctionDetails = $this->auctionMonth($auctionList);

    $artworkList = $this->artworkTable->find('next_auction', $_GET['id']);
    $artworkDetails = $this->getArtwork($artworkList);

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
    $vars[3] = $auctionDetails[0];
    $vars[4] = $artworkDetails;

    return [
      'template' => 'auctionLot.html.php',
      'variables' => $vars,
      'categories' => $categories,
      'title' => 'Fotheby\'s Auction House - Auction Lot'
    ];
  }

  function admin() {
    $categories = $this->getCategories();

    $auctionsList = $this->sortASC($this->auctionsTable->findAll(), 'date');//Sort('date', 'ASC');
    $upcomingAuctionDetails = [];
    $previousAuctionDetails = [];
    $i=0;
    $j=0;

    foreach ($auctionsList as $auction) {
      $auctionVariables = [
        'id' => $auction['auction_id'],
        'location' => $this->locationsTable->find('location_id', $auction['location_id'])[0]['name'],
        'date' => strtotime($auction['date'])
      ];
      if ($auctionVariables['date'] > strtotime(date('Y-m-d H:i'))) {
        $upcomingAuctionDetails[$i++] = $auctionVariables;
      } else {
        $previousAuctionDetails[$j++] = $auctionVariables;
      }
    }

    $vars = [];
    $vars[0] = $upcomingAuctionDetails;
    $vars[1] = array_reverse($previousAuctionDetails);


    return [
      'template' => 'admin/auctions.html.php',
      'variables' => $vars,
      'categories' => $categories,
      'title' => 'Fotheby\'s Auction House - Auctions'
    ];
  }

  function add() {
    $categories = $this->getCategories();

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getArtwork($this->artworkTable->findAll());
    $vars[2] = $this->locationsTable->findAll();

    return [
      'template' => 'admin/auctionsAdd.html.php',
      'variables' => $vars,
      'categories' => $categories,
      'title' => 'Fotheby\'s Auction House - Add Auction'
    ];
  }

  function edit() {
    $categories = $this->getCategories();

    $auction = $this->auctionsTable->find('auction_id', $_GET['id'])[0];
    $auctionDetails = [
      'id' => $auction['auction_id'],
      'name' => $auction['name'],
      'category_id' => $auction['category_id'],
      'date' => date('Y-m-d', strtotime($auction['date'])),
      'hour' => date('H', strtotime($auction['date'])),
      'minute' => date('i', strtotime($auction['date'])),
      'location_id' => $auction['location_id'],
      'image' => $auction['image']
    ];

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getArtwork($this->artworkTable->findAll());
    $vars[2] = $this->locationsTable->findAll();
    $vars[3] = $auctionDetails;

    return [
      'template' => 'admin/auctionsEdit.html.php',
      'variables' => $vars,
      'categories' => $categories,
      'title' => 'Fotheby\'s Auction House - Add Auction'
    ];
  }

  function save() {
    $auction = $_POST['auction'];
    $auction['date'] = date('Y-m-d H:i', strtotime($_POST['date'].' '.$_POST['hour'].':'.$_POST['minute']));
    $auction['image'] = $_FILES['files']['name'][0];


    if (!file_exists($_FILES['files']['tmp_name'][0]) || !is_uploaded_file($_FILES['files']['tmp_name'][0]))   {
      unset($auction['image']);
    }

    foreach($_FILES['files']['tmp_name'] as $key=>$tmp_name){
	    $temp = $_FILES['files']['tmp_name'][$key];
      $fileName = $_FILES['files']['name'][0];

	    if(empty($temp)) {
	        break;
	    }

	    move_uploaded_file($temp, '../public/images/auctions/'.$fileName);
    }

    $this->auctionsTable->save($auction);

    if (isset($auction['auction_id'])) {
      $auctionID = $auction['auction_id'];
    } else {
      $auctionID = $this->auctionsTable->getLastInsertID();
    }

    foreach ($_POST['art'] as $key) {
      if ($key['selected'] == 'yes') {
        $artUpdate = [
          'artwork_id' => $key['id'],
          'next_auction' => $auctionID,
          'previous_auction' => $this->artworkTable->find('artwork_id', $key['id'])[0]['next_auction']
        ];
        $this->artworkTable->save($artUpdate);
      }
    }

    header('location: /admin/auction');
  }

  function getArtwork($artworkList) {
    $artworkData = [];
    $k=0;

    foreach($artworkList as $artwork) {
      $artworkVariables = [
        'name'=> $artwork['name'],
        'id' => $artwork['artwork_id'],
        'artist' => $artwork['artist'],
        'number_of_images' => $artwork['number_of_images'],
        'year' => $artwork['year'],
        'category_id' => $artwork['category_id'],
        'next_auction' => $artwork['next_auction']
      ];

      $artworkData[$k++] = $artworkVariables;

    }

    return $artworkData;
  }

  function delete() {
		$this->auctionsTable->delete($_POST['id']);
		header('location: /admin/auction');
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
}
?>
