<?php
namespace Cars\Controllers;
class Home {
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

	public function home() {
    $categories = $this->getCategories();

    $auctionVariables = [];
    $auctionList = $this->sortDESC($this->auctionsTable->findAll(), 'date');
    foreach ($auctionList as $auction) {
      $currTime = 0;
      if (date('Y-m-d') < date('Y-m-d', strtotime($auction['date'])) && $currTime == 0) {
        $currTime = $auction['date'];

        $auctionVariables = [
  				'location' => $this->locationsTable->find('location_id', $auction['location_id'])[0]['name'],
          'date' => $auction['date'],
          'id' => $auction['auction_id'],
          'image' => $auction['image']
  			];
      }
		}

    $artworkVariables = [];
    $artworkList = $this->artworkTable->findAll();
    $maxPrice = 0;
    foreach ($artworkList as $artwork) {
      if ($maxPrice < $artwork['estimated_amount']) {
        $maxPrice = $artwork['estimated_amount'];
        $categoryDetails = $this->categoriesTable->find('category_id', $artwork['category_id']);

        $artworkVariables = [
  				'start_price' => $artwork['start_amount'],
          'name'=> $artwork['name'],
          'id' => $artwork['artwork_id'],
          'number_of_images' => $artwork['number_of_images'],
          'category' => $categoryDetails[0]['name'],
          'auction_id' => '-1',
          'auction_location' => '',
          'auction_date' => ''
  			];

        if(isset($artwork['next_auction'])) {
          $auctionDetails = $this->auctionsTable->find('auction_id', $artwork['next_auction']);
          foreach ($auctionDetails as $key) {
            $artworkVariables['auction_id'] = $key['auction_id'];
            $artworkVariables['auction_location'] = $this->locationsTable->find('location_id', $key['location_id'])[0]['name'];
            $artworkVariables['auction_date'] = $key['date'];
          }
        }
      }
		}

    $vars = [];
    $vars[0] = $categories;
    $vars[1] = $this->getSellers();
    $vars[2] = $this->getLocations();
    $vars[3] = $artworkVariables;
    $vars[4] = $auctionVariables;

    return [
			'template' => 'home.html.php',
			'variables' => $vars,
      'categories' => $categories,
			'title' => 'Fotheby\'s Auction House - Home'
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
