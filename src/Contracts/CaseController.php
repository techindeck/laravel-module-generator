<?php

namespace Techindeck\LaravelModuleGenerator\Contracts;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;

abstract class CaseController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    private mixed $req;
    private mixed $id;
    protected Response $res;


    /**
     * @return Response
     */
    public function getRes(): Response
    {
        return $this->res;
    }

    /**
     * @return self
     */
    public function setRes(): self
    {
        $this->res = new Response();
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return self
     */
    public function setId(mixed $id): self
    {
        $this->id = $id;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getReq(): mixed
    {
        return $this->req;
    }


    /**
     * @param mixed $req
     * @return self
     */
    public function setReq(mixed $req): self
    {
        $this->req = $req;
        return $this;
    }


    protected abstract function executeImpl();

    /**
     * execute
     *
     * @param  mixed|Request $req
     * @param  mixed $id
     *
     */
    public function execute($req = null, $id = null)
    {
        $this->setId($id);
        $this->setReq($req);
        $this->setRes();
        return $this->executeImpl();
    }
}
