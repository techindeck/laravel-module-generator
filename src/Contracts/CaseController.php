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

    protected mixed $req;
    protected int |null $id;
    protected Response $res;

    protected abstract function executeImpl();

    public function execute(?array $req = null, ?Response $res, ?int $id = null): JsonResponse
    {
        $this->req = $req;
        $this->res = $res;
        $this->id = $id;
        return $this->executeImpl();
    }
}
