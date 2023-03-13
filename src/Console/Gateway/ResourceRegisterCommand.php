<?php

namespace  Techindeck\LaravelModuleGenerator\Console\Gateway;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class ResourceRegisterCommand extends Command
{


    private $stubPath = '/../../resources/stubs/modules.stub';


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
     * Return the stub file path
     * @return string
     *
     */
    public function getStubPath()
    {
        return __DIR__ . $this->stubPath;
    }

    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getContents($stub)
    {
        $contents = file_get_contents($stub);
        $contents = $contents . $this->processRegisterer();

        return $contents;
    }





    /**
     * Append the new api resource to the api list
     *
     * @param $stub
     */
    public function processRegisterer()
    {
        return "\nRoute::apiResource('" . strtolower(Pluralizer::plural($this->argument('name'))) . "', " .
        '\\App\\Modules\\' . $this->getSingularClassName($this->argument('name')) . '\\Gateway\\' . $this->getSingularClassName($this->argument('name')) . "Gateway::class);\n";
        // $text = "<?php\n\n use Illuminate\Support\Facades\Route;\n\n\n Route::apiResource('" . strtolower(Pluralizer::plural($this->argument('name'))) . "', " .
        //     '\\App\\Modules\\' . $this->getSingularClassName($this->argument('name')) . '\\Gateway\\' . $this->getSingularClassName($this->argument('name')) . "Gateway::class);\n";
        // file_put_contents($stub, $text, FILE_APPEND | LOCK_EX);
    }


    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {

        return base_path('routes/modules-api.php');
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getApiFilePath()
    {

        return base_path('routes/api.php');
    }


    /**
     * Build the directory for the class if necessary.
     *
     * @param  string  $path
     * @return string
     */
    protected function makeDirectory($path)
    {

        if (!$this->files->isDirectory($path)) {
            $this->files->makeDirectory($path, 0777, true, true);
        }

        return $path;
    }

    /**
     * Execute the console command.
     *
     *
     */
    public function handle()
    {
        // $path = $this->getSourceFilePath();
        // $this->processRegisterer($this->getSourceFilePath());
        // $this->info("File : {$path} updated");

        $path = $this->getSourceFilePath();

        if (!$this->files->exists($path)) {
            $this->makeDirectory(dirname($path));
            $contents = $this->getContents($this->getStubPath());
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $contents = $this->getContents($path);
            $this->files->put($path, $contents);
            $this->info("File : {$path} already exits");
        }
    }
}
