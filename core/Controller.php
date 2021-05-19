<?php


class Controller
{

    /**
     * @param $modelName
     * @return false
     */
    public function loadModel($modelName)
    {
        $modelName .= 'Model';
        if (!file_exists('models/'.$modelName.'.php')) {
            return false;
        }
        require ('models/'.$modelName.'.php');
        $this->{$modelName} = new $modelName();
    }

    /**
     * @param $viewName
     * @param array $data
     * @return false
     */
    public function loadView($viewName, $data = [])
    {
        if (!file_exists('views/'.$viewName.'.php')) {
            return false;
        }

        extract($data);
        require ('views/'.$viewName.'.php');
    }
}