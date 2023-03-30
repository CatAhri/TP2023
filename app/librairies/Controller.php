<?php
//Controller de haut niveau

//Pour test enlever abstract et taper dans terminal php controller.php
abstract class Controller{
    public function loadModel(string $model){
        require_once(APPROOT . 'models/' . $model . '.php');
        return new $model();
    }

    public function render($vue, array $data = []){
        //var_dump($data);
        extract($data);
        echo"<h1> ******************* </h1>";
        //var_dump($articles);
        require_once(APPROOT . 'views/' . strtolower(get_class($this)) . '/'. $vue . '.php');
    }
}