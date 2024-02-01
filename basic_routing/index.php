<?php
declare(strict_types=1);

class RouteNotFoundException extends \Exception {
    protected $message = '404 Not Found';
}
class Router {
    private array $routes;
    public function register(string $requestMethod, string $route, callable|array $action): self {
        $this->routes[$requestMethod][$route] = $action;
        return $this;
    }
    public function get(string $route, callable|array $action): self {
        return $this->register('get', $route, $action);
    }
    public function post(string $route, callable|array $action): self {
        return $this->register('post', $route, $action);
    }
    public function routes() {
        return $this->routes;
    }
    public function resolve(string $requestUri, string $requestMethod) {
        $route = explode('?', $requestUri)[0];
        $action = $this->routes[$requestMethod][$route] ?? null;
        if (!$action) {
            throw new RouteNotFoundException();
        }
        if (is_callable($action)) {
            return call_user_func($action);
        }
        if (is_array($action)) {
            [$class, $method] = $action;
            if (class_exists($class)) {
                $class = new $class();
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
        throw new RouteNotFoundException();
    }
}
class Invoice {
    public function index(): string {
        return 'Invoice';
    }
    public function create(): string {
        return 'Create Invoice';
    }
    public function store(): string {
        return 'Store Invoice';
    }
}
class Home {
    public function index(): string {
        echo '<pre>'; var_dump($_GET); echo '</pre>';
        echo '<pre>'; var_dump($_POST); echo '</pre>';
        return '<h1>Home</h1><form action="/" method="post"><label>Amout</label><input type="text" name="amount"></form>';
        setcookie('userName', 'Ivan', time() + (24 * 60 * 60));
        var_dump($_COOKIE);
//        return View::make('index', $_GET)->render();
    }
}
define('STORAGE_PATH', __DIR__ . '/../storage');
class Image {
    public function index(): string {
        return <<<FORM
<form action="/upload" method="post" enctype="multipart/form-data">
<input type="file" name="receipt">
<button type="submit">Upload</button>
</form
FORM;
    }

    public function upload() {
//        echo '<pre>'; var_dump($_FILES); echo '</pre>';
//        echo '<pre>'; var_dump(pathinfo($_FILES['receipt']['tmp_name'])); echo '</pre>';
        $filePath = STORAGE_PATH . '/' . $_FILES['receipt']['name'];
        move_uploaded_file($_FILES['receipt']['tmp_name'], $filePath);
    }
}

$router = new Router();
$router->register('get', '/', function () {
        echo 'Home';
    }
);
$router->register('get', '/invoices', function () {
        echo 'Invoices';
    }
);
$router->register('get', '/home',[Home::class, 'index'])
    ->register('get', '/invoice',[Invoice::class, 'index'])
    ->register('post', '/invoice/create',[Invoice::class, 'create'])
    ->register('get', '/invoice/store',[Invoice::class, 'store']);
//echo $router->resolve($_SERVER['REQUEST_URI'], strtolower($_SERVER['REQUEST_METHOD']));

echo '<pre>';
print_r($_SERVER);
echo '</pre>';
