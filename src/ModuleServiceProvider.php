<?php

namespace Techindeck\LaravelModuleGenerator;

use Illuminate\Support\ServiceProvider;

use Techindeck\LaravelModuleGenerator\Console\Controller\ControllerCreate;
use Techindeck\LaravelModuleGenerator\Console\Controller\ControllerDelete;
use Techindeck\LaravelModuleGenerator\Console\Controller\ControllerFind;
use Techindeck\LaravelModuleGenerator\Console\Controller\ControllerRead;
use Techindeck\LaravelModuleGenerator\Console\Controller\ControllerUpdate;

use Techindeck\LaravelModuleGenerator\Console\Cases\CaseMapper;
use Techindeck\LaravelModuleGenerator\Console\Cases\CaseCreate;
use Techindeck\LaravelModuleGenerator\Console\Cases\CaseUpdate;
use Techindeck\LaravelModuleGenerator\Console\Cases\CaseRead;
use Techindeck\LaravelModuleGenerator\Console\Cases\CaseDelete;
use Techindeck\LaravelModuleGenerator\Console\Cases\CaseFind;

use Techindeck\LaravelModuleGenerator\Console\Gateway\GatewayCommand;
use Techindeck\LaravelModuleGenerator\Console\Gateway\ResourceRegisterCommand;
use Techindeck\LaravelModuleGenerator\Console\Repo\RepoCommand;
use Techindeck\LaravelModuleGenerator\Console\Model\ModelCommand;

use Techindeck\LaravelModuleGenerator\Console\MakeCommand;
use Techindeck\LaravelModuleGenerator\Console\Request\CaseRequest;

class ModuleServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeCommand::class,
                RepoCommand::class,
                ModelCommand::class,
                GatewayCommand::class,
                ControllerCreate::class,
                ControllerUpdate::class,
                ControllerRead::class,
                ControllerDelete::class,
                ControllerFind::class,
                CaseMapper::class,
                CaseCreate::class,
                CaseUpdate::class,
                CaseRead::class,
                CaseDelete::class,
                CaseFind::class,
                CaseRequest::class,
                ResourceRegisterCommand::class
            ]);
        }
    }
}
