<?php
  require 'Cars/Controllers/Article.php';

  class ArticleTest extends  \PHPUnit\Framework\TestCase {
    public function testAdd() {
      $article = [
        'title' => 'Test',
        'text' => 'Testing',
        'publish_date' => '2018-04-04'
      ];
      $result = addSave($article);
      $this->assertTrue($result);
    }
  }
?>
