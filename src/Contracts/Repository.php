<?php

namespace Techindeck\LaravelModuleGenerator\Contracts;

abstract class Repository
{
    /**
     * @return mixed
     */
    abstract function read($query = null, $row = null);

    /**
     * @param int $id
     * @return mixed
     */
    abstract function find(int $id);


    /**
     * @param $data
     * @return mixed
     */
    abstract function create($data);

    /**
     * @param int $id
     * @param $data
     * @return mixed
     */
    abstract function update(int $id, $data);

    /**
     * @param int $id
     * @return mixed
     */
    abstract function delete(int $id);
}
