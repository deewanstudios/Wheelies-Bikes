<?php

class App
{
    protected $controller = null;

    protected $method = null;

    protected $params = array();
    // protected $subcontroller = null;

    /**
     * __construct.
     */
    public function __construct()
    {
        // create array with URL parts in $url
        $this->parseUrl();

        // check for controller: no controller given ? then load start-page
        if (!$this->controller) {
            include_once APP . 'home.php';
            $page = new Home();
            $page->index();
        } elseif (file_exists(APP . $this->controller . '.php')) {
            // here we did check for controller: does such a controller exist ?

            // if so, then load this file and create this controller
            // example: if controller would be "car", then this line would translate into:
            // $this->car = new car();
            include_once APP . $this->controller . '.php';
            $this->controller = new $this->controller($param = null, $param2 = null);

            // check for method: does such a method exist in the controller ?
            if (method_exists($this->controller, $this->method)) {
                if (!empty($this->params)) {
                    // Call the method and pass arguments to it
                    call_user_func_array(array(
                        $this->controller,
                        $this->method,
                    ), $this->params);
                } else {
                    // If no parameters are given, just call the method without parameters, like
                    // $this->home->method();
                    $this->controller->{$this->method}();
                }
            } else {
                if (strlen($this->method) == 0) {
                    // no action defined: call the default index() method of a selected controller
                    $this->controller->index();
                }
            }
        } elseif (file_exists(APP . 'productlist.php')) {
            include_once APP . 'productlist.php';
            array_unshift($this->params, $this->method);
            $this->controller = new ProductList($this->controller, $this->params);
            // var_dump($this->controller);
            $this->controller->index();
        } elseif (file_exists(APP . 'product.php')) {
            include_once APP . 'product.php';
            array_unshift($this->params, $this->method, $this->controller);
            $this->controller = new Product($this->params);
            // var_dump($this->controller);
            // $this->controller = new Product($this->controller, $this->params);
            $this->controller->index();
        } elseif (file_exists(APP . 'productenquiry.php')) {
            include_once APP . 'productenquiry.php';
            array_unshift($this->params, $this->controller);
            $this->controller = new Enquire($this->params);
            // $this->controller = new Product($this->controller, $this->params);
            $this->controller->index();
        }
        /* var_dump($this->params);
    var_dump($this->controller); */
    }

    /**
     * parseUrl.
     */
    protected function parseUrl()
    {
        if (isset($_GET['url'])) {
            // $url = explode('/', filter_var(rtrim($_GET['url'], '/'),
            // FILTER_SANITIZE_URL));
            // return $url;
            // echo "<pre>";
            // var_dump($url);
            // echo "</pre>";

            // split URL
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            //
            // $url = array_slice($url, -4, 4);

            // var_dump($url);

            // Put URL parts into according properties
            // By the way, the syntax here is just a short form of if/else, called "Ternary
            // Operators"
            // @see http://davidwalsh.name/php-shorthand-if-else-ternary-operators
            $this->controller = isset($url[0]) ? $url[0] : null;
            $this->method = isset($url[1]) ? $url[1] : null;

            // Remove controller and action from the split URL
            unset($url[0], $url[1]);

            // Rebase array keys and store the URL params
            $this->params = array_values($url);

            return $url;
        }
    }
}
