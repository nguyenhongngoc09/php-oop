<?php

class Core
{
    protected $currentController = 'PagesController';
    protected $currentMethod = 'index';
    protected $params = array();

    /**
     * Core constructor.
     */
    public function __construct()
    {
        $urlParams = $this->getUrlParams();

        // Load controller
        if(file_exists('../app/controllers/'. ucwords($urlParams[0]) .'Controller.php')) {
            $this->currentController = ucwords($urlParams[0]) .'Controller';
            unset($urlParams[0]);
        }

        require_once '../app/controllers/'. $this->currentController .'.php';
        $this->currentController = new $this->currentController;

        // Get the method
        if (isset($urlParams[1])) {
            if (method_exists($this->currentController, $urlParams[1])) {
                $this->currentMethod = $urlParams[1];
                unset($urlParams[1]);
            }
        }

        // Get the params
        $this->params = $urlParams ? array_values($urlParams) : [];

        // Call a callback with array of params
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    /**
     * Get current URL params
     *
     * @return array
     * @throws
     **/
    public function getUrlParams()
    {
        if (isset($_SERVER['REQUEST_URI'])) {
            $url = trim($_SERVER['REQUEST_URI'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);

            return explode('/', $url);
        }

        return [];
    }
}