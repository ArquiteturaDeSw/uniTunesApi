<?php

namespace CoreBundle\Entity;

    abstract class Media implements Entity
    {
        public $Name;
        public $Description;
        public $uthor;
        public $ImagePath;
        public $Price;
        public $IsAvailable;
        public $Category;

        function __construct()
        {
            $this->Author = array(); //List<User>
        }
    }

    abstract class Audible implements Media
    {
        //public TimeSpan Duration { get; set; }
        //TODO: Descobrir como é TimeSpan no PHP
    }

    class Music implements Audible
    {
    }

    class PodCast implements Audible
    {
        public $UrlFeed;
    }

    class Video implements Audible
    {
        public $Quality;
    }

    class Book implements Media
    {
        public $Pages;
    }
?>