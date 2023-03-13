<?php

namespace  Techindeck\LaravelModuleGenerator\Console\Gateway;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Pluralizer;

class GatewayCommand extends Command
{

    private $stubPath = '/../../resources/stubs/gateway.stub';


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
    protected $signature = 'module:gateway {name : name of the gateway}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a gateway for a specified module';




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
            'MODULE_NAME'        => $this->getSingularClassName($this->argument('name')),
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

        return
            app_path() . '/Modules/' .
            $this->getSingularClassName($this->argument('name')) . '/Gateway/' .
            $this->getSingularClassName($this->argument('name')) . 'Gateway.php';
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
            $this->info('module:request');
            $this->call('module:request', [
                'name' => $this->argument('name'),
                'action' => 'create'
            ]);
            $this->info('module:resource');
            $this->call('module:resource', [
                'name' => $this->argument('name')
            ]);
        } else {
            $this->info("File : {$path} already exits");
        }
    }
}
