<?php

namespace UniTunes\Core\Application;

    class BookMarkAppService
    {
        private $_ctx;
        
        function __construct($ctx)
        {
            $this->_ctx = $ctx;
        }

        function Get($userId) // : List<BookMarkList>
        {
            return $this->_ctx->BookMarkLists.Where(x => !x->Deleted)->ToList();
        }

        function Create($userId, $name)// : void
        {
            $user = $this->_ctx->Users->Find($userId);
            $this->_ctx->BookMarkLists->Add(new BookMarkList($name, $user));
            $this->_ctx->SaveChanges();
        }

        function Remove($bookMarkListId) // : void
        {
            $bookMarkList = $this->_ctx->BookMarkLists->Find($bookMarkListId);
            foreach ($bookMarkList->Items as $item)
            {
                $item->Deleted = $true;
            }
            bookMarkList->Deleted = true;
            $this->_ctx->SaveChanges();
        }

        function Edit($bookMarkListId, $newName) // : void
        {
            throw new System.NotImplementedException();
        }

        function AddItem($bookMarkListId, $mediaId) // : void
        {
            $b = $this->_ctx->BookMarkLists->Find($bookMarkListId);
            $i = $this->_ctx->Medias->Find($mediaId);
            $b->Items->Add($i);
            $this->_ctx->SaveChanges();
        }

        function RemoveItem($bookMarkListId, $mediaId) // : void
        {
            throw new System.NotImplementedException();
        }
    }
?>