<?php
    // This is the base controller
    //This loads the models and views

Class Controller{
    // Load model
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';

        // Instantiate the model
        return new $model();

    }

    public function view($view, $data = [])
    {
        // Check for the view file
        if(file_exists('../app/views/' . $view . '.php')){
            require_once '../app/views/' . $view . '.php';
        } else {
            die('View does not exists');
        }
    }
}