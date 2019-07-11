<?php
namespace Cars\Controllers;
class Commission {
  private $commissionsTable;

  public function __construct($commissionsTable) {
    $this->commissionsTable = $commissionsTable;
  }

  public function submit() {
    $this->commissionsTable->save($_POST['bid']);
    header('location: /artwork/artItem?id='.$_POST['bid']['artwork_id'].'&success='.$_POST['bid']['amount']);
  }
}
