<?php

namespace App\Services\File;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileManager
{
    public static function makeUniqueCSVFile(array $data, string $fileName)
    {
        if(!$fileName){
            return;
        }
        
        try {
            if (count($data)) {
                $path = Storage::path($fileName . '.csv');

                $fileOpen = fopen($path, 'w');

                $headerRow = array_merge(array_keys(current($data)[0]), [
                    'count'
                ]);

                //Write Header Row into CSV file
                fputcsv($fileOpen, $headerRow);

                //Write Produt Row with count into CSV file
                foreach ($data as $products) {
                    if ($productCount = count($products)) {
                        $productRow = array_merge(array_values($products[0]), [
                            $productCount
                        ]);
                        fputcsv($fileOpen, $productRow);
                    }
                }

                fclose($fileOpen);

                return $path;
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * This function will create UploadedFile object from file path
     *
     */
    public static function createUploadedFileObject($path){
  
        if(!$path){
            return;
        }
        
        $pathParts = pathinfo($path);

        if($pathParts['extension'] == 'csv'){
            $pathParts['extension'] = 'text/csv';
        }
        elseif($pathParts['extension'] == 'tsv'){
            $pathParts['extension'] = 'text/tab-separated-values';
        }
        
        $file = new UploadedFile(
            $pathParts['dirname'] . '/' . $pathParts['basename'],
            $pathParts['basename'],
            $pathParts['extension'],
            filesize($path),
            true,
            TRUE
        );
  
        return $file;
    }
}