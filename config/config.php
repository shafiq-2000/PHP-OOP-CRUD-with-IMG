<?php

class connnection
{

    protected $con;
    public function __construct()
    {
        $this->con = new mysqli("localhost", "root", "", "taskmanager");  //oop style 

        //Procedural Style:avabe dilew hobe
        //$this->con = mysqli_connect("localhost", "root", "", "taskmanager");
    }
}
