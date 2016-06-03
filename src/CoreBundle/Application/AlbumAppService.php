<?php

namespace CoreBundle\Application;

    class AlbumAppService
    {
        private $_ctx;
        
        function __construct($ctx)
        {
            $this->_ctx = $ctx;
        }

        function GetAllAlbums() // : List<Album>
        {
            #return $this->_ctx->Albums->Where($x => !$x->Deleted)->OrderByDescending($x => $x->CreationDate)->ToList();
        }

        function GetNewstAlbums() // : List<Album>
        {
            #throw new System.NotImplementedException();
        }

        function GetRecentAlbums() // : List<Album>
        {
            #throw new System.NotImplementedException();
        }
    }
?>