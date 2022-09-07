<?php

namespace App\Console\Commands;

use App\Services\File\FileManager;
use App\Services\File\FileParseService;
use Illuminate\Console\Command;

class ParseFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:file {--file=} {--unique-combinations=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will parse multiple formats of file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try{
            $parsingFilePath = $this->option('file');
            $uniqueCombinationFileName = str_replace('.csv', '',  $this->option('unique-combinations'));

            $uploadedFile = FileManager::createUploadedFileObject(storage_path() . '/app/' . $parsingFilePath);

            $parsedData = FileParseService::parse($uploadedFile, true);
            $filePath = FileManager::makeUniqueCSVFile($parsedData, $uniqueCombinationFileName);

            if($filePath){
                print_r('Please check your unique file from this path: ' . $filePath . PHP_EOL);
            }
            
            return;
        }
        catch (\Exception $e) {
            print_r("===========================================================================================" . PHP_EOL);
            print_r($e->getMessage() . PHP_EOL);
            print_r("===========================================================================================" . PHP_EOL);
        }
    }
}
