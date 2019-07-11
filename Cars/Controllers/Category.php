<?php
namespace Cars\Controllers;
class Category {
  private $categoriesTable;

	public function __construct($categoriesTable) {
    $this->categoriesTable = $categoriesTable;
	}

  public function list() {
    $categories = $this->getCategories();

    return [
      'template' => '/admin/categories.html.php',
			'title' => 'Fotheby\'s Auction House - Log In',
			'categories' => $categories,
			'variables' => $categories
		];
  }

  function add(){
		$categories = $this->getCategories();

		return [
      'template' => '/admin/categoriesAdd.html.php',
			'title' => 'Fotheby\'s Auction House - Category Add',
			'categories' => $categories,
			'variables' => []
		];
	}

	function edit(){
		$categories = $this->getCategories();

		$vars = [];
		$vars[0] = $categories;
		$vars[1] = $this->categoriesTable->find('category_id', $_GET['id'])[0];

		return [
      'template' => '/admin/categoriesEdit.html.php',
			'title' => 'Fotheby\'s Auction House - Category Edit',
			'categories' => $categories,
			'variables' => $vars
		];
	}

	function save() {
		$category = $_POST['category'];
		$this->categoriesTable->save($category);
		header('location: /admin/categories');
	}

	function delete() {
		$this->categoriesTable->delete($_POST['id']);
		header('location: /admin/categories');
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
        'description' => $category['description']
      ];
      $categories[$j++] = $categoryVariables;
    }
    return $categories;
  }
}
?>
