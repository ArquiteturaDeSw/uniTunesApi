<?php

namespace UniTunes\Core\Application;

    class MediaAppService
    {
        private $_ctx; //IDbContext
        private $_factory; //MediaFactory
        
        function __construct($ctx)
        {
            $this->_ctx = $ctx;
            $this->_factory = new MediaFactory();
        }

        function Get($id) // : Media
        {
            return $this->_ctx->Medias->Find($id);
        }

        function Create($name
                      , $description
                      , $authorId
                      , $imagepath
                      , $price
                      , $categoryId
                      , $duration = null
                      , $urlFeed = ""
                      , $quality = 0
                      , $pages = 0
                      , $isAvailable = true)
        {
            $media = $this->_factory.GetInstance($this->_ctx, $name, $description, $authorId, $imagepath, $price, $isAvailable, $categoryId, $duration, $urlFeed, $quality, $pages);
            $this->_ctx->Medias->Add($media);
            $this->_ctx->SaveChanges();
        }

        function GetAll() // : IEnumerable<Media>
        {
            return $this->_ctx->Medias->Where($x => !$x->Deleted)->ToList();
        }

        function Remover($mediaId) // : void
        {
            $media =$this->_ctx->Medias->Find($mediaId);
            $this->_ctx->Medias->Remove($media);
            $this->_ctx->SaveChanges();
        }

        function Editar($mediaId, $name, $description, $price) // : void
        {
            $media = $this->_ctx->Medias->Find($mediaId);

            $media->Name = $name;
            $media->Price = $price;
            $media->Description = $description;

            $this->_ctx->SaveChanges();
        }

        function Buy($userId, $mediaId) // : void
        {
            throw new NotImplementedException();
        }

        function GetPurchaseByDate(DateTime datetime) // : List<Purchase>
        {
            throw new NotImplementedException();
        }

        function GetPurchaseByRange(DateTime begin, DateTime end) // : List<Purchase>
        {
            throw new NotImplementedException();
        }

        function GetTotalRevanue() // : decimal
        {
            throw new NotImplementedException();
        }
    }

?>