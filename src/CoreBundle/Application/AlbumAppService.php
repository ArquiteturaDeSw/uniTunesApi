<?php

namespace CoreBundle\Application;

    class AlbumAppService extends AppServiceBase
    {
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