<?php

namespace Techindeck\LaravelModuleGenerator\Contracts;

abstract class Repository
{

    /**
     * read
     *
     * @param  mixed $query
     * @return mixed
     */
    abstract function read($query = null);


    /**
     * @param mixed $id
     * @return mixed
     */
    abstract function find(mixed $id);


    /**
     * @param mixed $data
     * @return mixed
     */
    abstract function create(mixed $data);

    /**
     * @param mixed $id
     * @param mixed $data
     * @return mixed
     */
    abstract function update(mixed $id, mixed $data);

    /**
     * @param mixed $id
     * @return mixed
     */
    abstract function delete(mixed $id);
}
