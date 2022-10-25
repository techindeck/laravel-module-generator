<?php

namespace Techindeck\LaravelModuleGenerator\Contracts;



abstract class UseCase
{
    abstract function execute(mixed $data = null, ?int $id = null);
}
