<?php

namespace CoreBundle\Domain;

    class MediaFactory
    {
        function GetInstance($ctx
                           , $name
                           , $description
                           , $authorId
                           , $imagepath
                           , $price
                           , $isAvailable
                           , $categoryId
                           , $duration = null //TimeSpan? 
                           , $urlFeed = ""
                           , $quality = 0
                           , $pages = 0) // : Media
        {
            $media = null;
            
            //if (duration.HasValue && string.IsNullOrWhiteSpace(urlFeed))
            if($duration != null && trim($duration) != "")
            {
                #$media = new Music { Duration = duration.Value };
                $media = new Music();
                $media->Duration = $duration;
            }
            else if ($urlFeed != null && trim($urlFeed) != "")
            {
                #$media = new PodCast { Duration = duration.Value, UrlFeed = urlFeed };
                $media = new PodCast();
                $media->Duration = $duration;
                $media->UrlFeed = $urlFeed;
            }
            else if ($pages != 0)
            {
                #$media = new Book { Pages = pages };
                $media = new Book();
                $media->Pages = $pages;
            }
            else if ($quality != 0)
            {
                //media = new Video { Quality = quality };
                $media = new Video();
                $media->Quality = $quality;
            }
            else
            {
                throw new Exception("Invalid media type.");
            }

            $media->Name = $name;
            $media->Description = $description;
            $media->ImagePath = $imagepath;
            $media->Price = $price;
            $media->IsAvailable = $isAvailable;
            $media->Category = $ctx->Categories->Find($categoryId);
            $media->Author->Add($ctx->Users->Find($authorId));

            return $media;
        }
    }

?>