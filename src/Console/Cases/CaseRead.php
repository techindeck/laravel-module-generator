<?php

namespace Techindeck\LaravelModuleGenerator\Console\Cases;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class CaseRead extends Command
{

    private  $action = 'Read';

    private $stubPath = '/../../resources/stubs/case.read.stub';


    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:case-read {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new case for read use case';


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
     **
     * Map the stub variables present in stub to its value
     *
     * @return array
     *
     */
    public function getStubVariables()
    {
        return [
            'NAMESPACE'         => 'App\\Modules',
            'MODULE_NAME'       => $this->getSingularClassName($this->argument('name')),
            'MODULE_REF'        => lcfirst($this->getSingularClassName($this->argument('name'))),
            'CASE'              => $this->action,
            'CASE_LWC'          => strtolower($this->action),
        ];
    }

    /**
     * Get the stub path and the stub variables
     *
     * @return bool|mixed|string
     *
     */
    public function getSourceFile()
    {
        return $this->getStubContents($this->getStubPath(), $this->getStubVariables());
    }


    /**
     * Replace the stub variables(key) with the desire value
     *
     * @param $stub
     * @param array $stubVariables
     * @return bool|mixed|string
     */
    public function getStubContents($stub, $stubVariables = [])
    {
        $contents = file_get_contents($stub);

        foreach ($stubVariables as $search => $replace) {
            $contents = str_replace('$' . $search . '$', $replace, $contents);
        }

        return $contents;
    }

    /**
     * Get the full path of generate class
     *
     * @return string
     */
    public function getSourceFilePath()
    {
        $name = $this->getSingularClassName($this->argument('name'));

        return base_path('App/Modules') . '/' . $name . '/' . 'Cases/' . $this->action . '/' . $this->action . $name . 'UseCase.php';
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



        $path = $this->getSourceFilePath();
        $this->makeDirectory(dirname($path));
        $contents = $this->getSourceFile();

        if (!$this->files->exists($path)) {
            $this->files->put($path, $contents);
            $this->info("File : {$path} created");
        } else {
            $this->info("File : {$path} already exits");
        }
    }
}
