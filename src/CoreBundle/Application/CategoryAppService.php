<?php

namespace UniTunes\Core\Application;

    class CategoryAppService
    {
        private $_ctx;

        function __construct($ctx)
        {
            $this->_ctx = $ctx;
        }

        function Get() // : List<Category> 
        {
            return $this->_ctx->Categories->Where($x => !$x.Deleted)->ToList();
        }

        function Create($name) // : void
        {
            $this->_ctx->Categories->Add(new Category($name));
            $this->_ctx->SaveChanges();
        }

        function Remove($id) // : void
        {
            $category = $this->_ctx->Categories->Find($id);
            $category->Deleted = $true;
            $this->_ctx->SaveChanges();
        }
    }
?>