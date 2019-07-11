<?php
namespace CSY2028;
class EntryPoint {
  private $routes;
  public function __construct(\CSY2028\Routes $routes) {
    $this->routes = $routes;
  }

  public function run() {
    $route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');
    $routes = $this->routes->getRoutes();
    $method = $_SERVER['REQUEST_METHOD'];

    if (isset($routes[$route]['login'])) {
      $this->routes->checkLogin();
    }
    if (isset($routes[$route]['admin'])) {
      if (!isset($_SESSION['loggedin'])) {
        header('location: /');
      } else {
        if ($_SESSION['account'] != 'Admin') {
          header('location: /');
        }
      }
    }

    if (!isset($routes[$route][$method]['controller'])) {
      header('location: /');
    }
    $controller = $routes[$route][$method]['controller'];
    $functionName = $routes[$route][$method]['function'];
    $page = $controller->$functionName();
    $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
    $title = $page['title'];
    $categories = $page['categories'];
    require '../templates/layout.html.php';
  }

  public function loadTemplate($fileName, $templateVars) {
    extract($templateVars);
    ob_start();
    require $fileName;
    $contents = ob_get_clean();
    return $contents;
  }
}
