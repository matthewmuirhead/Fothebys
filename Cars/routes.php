<?php
namespace Cars;
class Routes implements \CSY2028\Routes {
  public function getRoutes() {
    require '../database.php';
    $usersTable = new \CSY2028\DatabaseTable($pdo, 'users', 'user_id');
    $categoriesTable = new \CSY2028\DatabaseTable($pdo, 'categories', 'category_id');
    $commissionsTable = new \CSY2028\DatabaseTable($pdo, 'commissions', 'commission_id');
    $artworkTable = new \CSY2028\DatabaseTable($pdo, 'artwork', 'artwork_id');
    $auctionsTable = new \CSY2028\DatabaseTable($pdo, 'auctions', 'auction_id');
    $locationsTable = new \CSY2028\DatabaseTable($pdo, 'locations', 'location_id');

    $homeController = new \Cars\Controllers\Home($categoriesTable, $artworkTable, $auctionsTable, $usersTable, $locationsTable);
    $userController = new \Cars\Controllers\User($usersTable, $categoriesTable, $artworkTable, $locationsTable, $auctionsTable);
    $categoryController = new \Cars\Controllers\Category($categoriesTable);
    $artworkController = new \Cars\Controllers\Artwork($categoriesTable, $artworkTable, $auctionsTable, $usersTable, $locationsTable);
    $auctionController = new \Cars\Controllers\Auction($categoriesTable, $auctionsTable, $usersTable, $locationsTable, $artworkTable);
    $commissionController = new \Cars\Controllers\Commission($commissionsTable);

    $routes = [
      '' => [
        'GET' => [
          'controller' => $homeController,
          'function' => 'home'
        ]
      ],
      'login' => [
        'POST' => [
          'controller' => $userController,
          'function' => 'loginSubmit'
        ]
      ],
      'logout' => [
        'GET' => [
          'controller' => $userController,
          'function' => 'logout'
        ]
      ],
      'search' => [
        'POST' => [
          'controller' => $artworkController,
          'function' => 'search'
        ]
      ],
      'admin' => [
        'GET' => [
          'controller' => $userController,
          'function' => 'adminHome'
        ]
      ],
      'artwork' => [
        'GET' => [
          'controller' => $artworkController,
          'function' => 'artwork'
        ]
      ],
      'sell' => [
        'GET' => [
          'controller' => $artworkController,
          'function' => 'add'
        ],
        'POST' => [
          'controller' => $artworkController,
          'function' => 'addArtSubmit'
        ],
        'login' => true
      ],
      'auction' => [
        'GET' => [
          'controller' => $auctionController,
          'function' => 'auctionList'
        ]
      ],
      'auction/artwork' => [
        'GET' => [
          'controller' => $auctionController,
          'function' => 'artList'
        ]
      ],
      'artwork/artItem' => [
        'GET' => [
          'controller' => $artworkController,
          'function' => 'artItem'
        ],
        'POST' => [
          'controller' => $commissionController,
          'function' => 'submit'
        ],
      ],
      'admin/user' => [
        'GET' => [
          'controller' => $userController,
          'function' => 'list'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/user/add' => [
        'GET' => [
          'controller' => $userController,
          'function' => 'add'
        ],
        'POST' => [
          'controller' => $userController,
          'function' => 'save'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/user/edit' => [
        'GET' => [
          'controller' => $userController,
          'function' => 'edit'
        ],
        'POST' => [
          'controller' => $userController,
          'function' => 'save'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/user/delete' => [
        'POST' => [
          'controller' => $userController,
          'function' => 'delete'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/category' => [
        'GET' => [
          'controller' => $categoryController,
          'function' => 'list'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/category/add' => [
        'GET' => [
          'controller' => $categoryController,
          'function' => 'add'
        ],
        'POST' => [
          'controller' => $categoryController,
          'function' => 'save'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/category/edit' => [
        'GET' => [
          'controller' => $categoryController,
          'function' => 'edit'
        ],
        'POST' => [
          'controller' => $categoryController,
          'function' => 'save'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/category/delete' => [
        'POST' => [
          'controller' => $categoryController,
          'function' => 'delete'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/artwork' => [
        'GET' => [
          'controller' => $artworkController,
          'function' => 'list'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/artwork/edit' => [
        'GET' => [
          'controller' => $artworkController,
          'function' => 'edit'
        ],
        'POST' => [
          'controller' => $commissionController,
          'function' => 'save'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/artwork/delete' => [
        'POST' => [
          'controller' => $artworkController,
          'function' => 'delete'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/valuations' => [
        'GET' => [
          'controller' => $artworkController,
          'function' => 'valuation'
        ],
        'POST' => [
          'controller' => $artworkController,
          'function' => 'valuationSubmit'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/auction' => [
        'GET' => [
          'controller' => $auctionController,
          'function' => 'admin'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/auction/add' => [
        'GET' => [
          'controller' => $auctionController,
          'function' => 'add'
        ],
        'POST' => [
          'controller' => $auctionController,
          'function' => 'save'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/auction/edit' => [
        'GET' => [
          'controller' => $auctionController,
          'function' => 'edit'
        ],
        'POST' => [
          'controller' => $auctionController,
          'function' => 'save'
        ],
        'login' => true,
        'admin' => true,
      ],
      'admin/auction/delete' => [
        'POST' => [
          'controller' => $auctionController,
          'function' => 'delete'
        ],
        'login' => true,
        'admin' => true,
      ],
      'profile' => [
        'GET' => [
          'controller' => $userController,
          'function' => 'profile'
        ],
        'POST' => [
          'controller' => $userController,
          'function' => 'save'
        ],
        'login' => true,
        'admin' => true,
      ],
    ];
    return $routes;
  }

  public function checkLogin() {
    if (!isset($_SESSION['loggedin'])) {
      header('location: /');
    }
  }
}
