<?php

namespace App\Services\File;

use Illuminate\Http\UploadedFile;

class FileParseService
{
    public static function parse(UploadedFile $file, bool $fromCommandLine = false)
    {
        if(!$file){
            return;
        }
        
        //Get file Mime type to run the parser
        $clientMimeType = $file->getClientMimeType();

        switch ($clientMimeType) {
            case 'text/csv':
                $products = (new ParseTextFile)->parse($file, ",", $fromCommandLine);
                break;
            case 'text/tab-separated-values':
                $products = (new ParseTextFile)->parse($file, "\t", $fromCommandLine);
                break;
            default:
                $products = null;
        }
       
        return $products;
    }

}