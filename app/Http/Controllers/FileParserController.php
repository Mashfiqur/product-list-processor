<?php

namespace App\Http\Controllers;

use App\Http\Requests\ParseFileRequest;
use App\Services\File\FileManager;
use App\Services\File\FileParseService;
use Illuminate\Http\Request;

class FileParserController extends Controller
{
    public function __construct()
    {
        
    }

    public function parseFile(ParseFileRequest $request){
        
        if($request->validated()){
            $parsedData = FileParseService::parse($request->validated()['file']);
            $filePath = FileManager::makeUniqueCSVFile($parsedData, $request->validated()['unique_file_name']);

            if($filePath){
                return response()->download($filePath);
            }
        }
    }
}
