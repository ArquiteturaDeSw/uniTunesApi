<?php

namespace CoreBundle\Entity;

    abstract class Media extends Entity
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

    abstract class Audible extends Media
    {
        //public TimeSpan Duration { get; set; }
        //TODO: Descobrir como é TimeSpan no PHP
    }

    class Music extends Audible
    {
    }

    class PodCast extends Audible
    {
        public $UrlFeed;
    }

    class Video extends Audible
    {
        public $Quality;
    }

    class Book extends Media
    {
        public $Pages;
    }
?>