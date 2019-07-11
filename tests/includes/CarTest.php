<?php
  require 'Cars/Controllers/Car.php';



  class CarTest extends  \PHPUnit\Framework\TestCase {
    protected function setUp() {
      $carMock = $this->getMockBuilder(Car::class)
        ->disableOriginalConstructor()
        ->getMock();
    }

    public function testAddCar() {
      require 'database.php';
      $carsTable = new \CSY2028\DatabaseTable($pdo, 'cars', 'id');
      $carController = new \Cars\Controllers\Car($carsTable, $manufacturersTable);

      $article = [
        'name' => 'Test',
      ];
      $result = $carController->saveCar($article);
      $this->assertTrue($result);
    }
  }
?>
