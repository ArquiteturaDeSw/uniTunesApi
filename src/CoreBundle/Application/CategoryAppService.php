<?php

namespace CoreBundle\Application;

    class CategoryAppService extends AppServiceBase
    {
        function Get() // : List<Category> 
        {
            #return $this->_ctx->Categories->Where($x => !$x.Deleted)->ToList();
        }

        function Create($name) // : void
        {
            $this->_ctx->Categories->Add(new Category($name));
            $this->_ctx->SaveChanges();
        }

        function Remove($id) // : void
        {
            $category = $this->_ctx->Categories->Find($id);
            $category->Deleted = true;
            $this->_ctx->SaveChanges();
        }
    }
?>