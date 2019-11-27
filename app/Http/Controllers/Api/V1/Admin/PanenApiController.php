<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePanenRequest;
use App\Http\Requests\UpdatePanenRequest;
use App\Http\Resources\Admin\PanenResource;
use App\Panen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanenApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('panen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PanenResource(Panen::with(['lahan'])->get());
    }

    public function store(StorePanenRequest $request)
    {
        $panen = Panen::create($request->all());

        return (new PanenResource($panen))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function update(UpdatePanenRequest $request, Panen $panen)
    {
        $panen->update($request->all());

        return (new PanenResource($panen))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Panen $panen)
    {
        abort_if(Gate::denies('panen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $panen->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
