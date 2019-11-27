<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTengkulakRequest;
use App\Http\Requests\UpdateTengkulakRequest;
use App\Http\Resources\Admin\TengkulakResource;
use App\Tengkulak;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TengkulakApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tengkulak_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new TengkulakResource(Tengkulak::all());
    }

    public function store(StoreTengkulakRequest $request)
    {
        $tengkulak = Tengkulak::create($request->all());

        return (new TengkulakResource($tengkulak))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdateTengkulakRequest $request, Tengkulak $tengkulak)
    {
        $tengkulak->update($request->all());

        return (new TengkulakResource($tengkulak))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Tengkulak $tengkulak)
    {
        abort_if(Gate::denies('tengkulak_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tengkulak->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
