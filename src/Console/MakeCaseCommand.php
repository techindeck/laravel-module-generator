<?php

namespace Techindeck\LaravelModuleGenerator\Console;

use Illuminate\Console\Command;


class MakeCaseCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module

                            {name : name of the module}
                            {--c|controller : case type  controller}
                            {--s|case : use cases}
                            {--g|gateway : module gateway}
                            {--p|repo : module repository}
                            {--m|model : module model}

                            {--a|add : case type  add}
                            {--u|update : case type  update}
                            {--r|read : case type  read}
                            {--d|delete : case type  delete}
                            {--f|find : case type  find}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * Execute the console command.
     *
     *
     */
    public function handle()
    {

        if ($this->option('gateway')) $this->parseGatewayCommand('create');
        if ($this->option('repo')) $this->parseRepositoryCommand('create');
        if ($this->option('model')) $this->parseModelCommand('create');



        if ($this->option('controller')) {
            if ($this->option('add')) $this->parseControllerCommand('create');
            if ($this->option('update')) $this->parseControllerCommand('update');
            if ($this->option('read')) $this->parseControllerCommand('read');
            if ($this->option('delete')) $this->parseControllerCommand('delete');
            if ($this->option('find')) $this->parseControllerCommand('find');
        }
        if ($this->option('case')) {
            if ($this->option('add')) $this->parseCaseCommand('create');
            if ($this->option('update')) $this->parseCaseCommand('update');
            if ($this->option('read')) $this->parseCaseCommand('read');
            if ($this->option('delete')) $this->parseCaseCommand('delete');
            if ($this->option('find')) $this->parseCaseCommand('find');
            $this->parseCaseMapperCommand('mapper');
        }

        if ($this->option('case')) {
            if ($this->option('add')) $this->parseCaseCommand('create');
            if ($this->option('update')) $this->parseCaseCommand('update');
            if ($this->option('read')) $this->parseCaseCommand('read');
            if ($this->option('delete')) $this->parseCaseCommand('delete');
            if ($this->option('find')) $this->parseCaseCommand('find');
        }
    }

    private function parseCaseCommand(string $command)
    {
        $this->info('module:case-' . $command);
        $this->call('module:case-' . $command, [
            'name' => $this->argument('name')
        ]);
    }

    private function parseCaseMapperCommand(string $command)
    {
        $this->info('module:case-' . $command);
        $this->call('module:case-' . $command, [
            'name' => $this->argument('name')
        ]);
    }

    private function parseGatewayCommand(string $command)
    {
        $this->info('module:gateway');
        $this->call('module:gateway', [
            'name' => $this->argument('name')
        ]);
    }

    private function parseControllerCommand(string $command)
    {
        $this->info('module:controller-' . $command);
        $this->call('module:controller-' . $command, [
            'name' => $this->argument('name')
        ]);
    }

    private function parseModelCommand(string $command)
    {
        $this->info('module:model');
        $this->call('module:model', [
            'name' => $this->argument('name')
        ]);
    }

    private function parseRepositoryCommand(string $command)
    {
        $this->info('module:repository');
        $this->call('module:repository', [
            'name' => $this->argument('name')
        ]);
    }
}
