<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreLahanRequest;
use App\Http\Requests\UpdateLahanRequest;
use App\Http\Resources\Admin\LahanResource;
use App\Lahan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LahanApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lahan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new LahanResource(Lahan::all());
    }

    public function store(StoreLahanRequest $request)
    {
        $lahan = Lahan::create($request->all());

        return (new LahanResource($lahan))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateLahanRequest $request, Lahan $lahan)
    {
        $lahan->update($request->all());

        return (new LahanResource($lahan))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Lahan $lahan)
    {
        abort_if(Gate::denies('lahan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lahan->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
