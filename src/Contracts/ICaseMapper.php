<?php

namespace Techindeck\LaravelModuleGenerator\Contracts;

interface ICaseMapper
{
    public static function resolverRead();
    public static function resolverFind();
    public static function resolverCreate();
    public static function resolverUpdate();
    public static function resolverDelete();
}
