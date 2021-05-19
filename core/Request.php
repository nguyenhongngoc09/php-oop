<?php


class Request
{
    public $controller = 'defaultController';
    public $action = 'index';

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->getSystemParams();
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function post($name)
    {
        return $_POST[$name] ?? null;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function get($name)
    {
        return $_GET[$name] ?? null;
    }

    /**
     * Get system params
     */
    private function getSystemParams()
    {
        if ($this->get('controller') != null) {
            $this->controller = $this->get('controller') . 'Controller';
        }

        if ($this->get('action') != null) {
            $this->action = $this->get('action');
        }
    }
}