<?php

class book
{
    private $id = 0;
    private $title = "";
    private $auther = "";
    private $price = "";
    private $img = "";
    public function __construct($id, $title, $auther, $price,$img)
    {
        $this->id = $id;
        $this->title = $title;
        $this->auther = $auther;
        $this->price = $price;
        $this->img = $img;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setTitle($title)
    {
        $this->title = $title;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setAuther($auther)
    {
        $this->auther = $auther;
    }
    public function getAuther()
    {
        return $this->auther;
    }
    public function setPrice($price)
    {
        $this->price = $price;
    }
    public function getPrice()
    {
        return $this->price;
    }
    public function setImg($img)
    {
        $this->img = $img;
    }
    public function getImg()
    {
        return $this->img;
    }
}

