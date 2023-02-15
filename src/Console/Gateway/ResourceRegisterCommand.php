<?php

namespace  Techindeck\LaravelModuleGenerator\Console\Gateway;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class ResourceRegisterCommand extends Command
{


    /**
     * Filesystem instance
     * @var Filesystem
     */
    protected $files;

    /**
     * Create a new command instance.
     * @param Filesystem $files
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();

        $this->files = $files;
    }


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:resource {name : resource module registerer}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a gateway registered to the API list for a specified module';




    /**
     * Return the Singular Capitalize Name
     * @param $name
     * @return string
     */
    public function getSingularClassName($name)
    {
        return ucwords(Pluralizer::singular($name));
    }


    /**
     * Append the new api resource to the api list
     *
     * @param $stub
     */
    public function processRegisterer($stub)
    {
        $text = "Route::apiResource('" . strtolower(Pluralizer::plural($this->argument('name'))) . "', " .
            '\\App\\Modules\\' . $this->getSingularClassName($this->argument('name')) . '\\Gateway\\' . $this->getSingularClassName($this->argument('name')) . "Gateway::class);\n";
        file_put_contents($stub, $text, FILE_APPEND | LOCK_EX);
    }


    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {

        return base_path('routes') . '\\' . 'api.php';
    }


    /**
     * Execute the console command.
     *
     *
     */
    public function handle()
    {
        $path = $this->getSourceFilePath();
        $this->processRegisterer($this->getSourceFilePath());
        $this->info("File : {$path} updated");
    }
}
