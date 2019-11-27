<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPanenRequest;
use App\Http\Requests\StorePanenRequest;
use App\Http\Requests\UpdatePanenRequest;
use App\Lahan;
use App\Panen;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PanenController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('panen_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $panens = Panen::all();

        return view('admin.panens.index', compact('panens'));
    }

    public function create()
    {
        abort_if(Gate::denies('panen_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lahans = Lahan::all()->pluck('nama_lahan', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.panens.create', compact('lahans'));
    }

    public function store(StorePanenRequest $request)
    {
        $panen = Panen::create($request->all());

        return redirect()->route('admin.panens.index');
    }

    public function edit(Panen $panen)
    {
        abort_if(Gate::denies('panen_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lahans = Lahan::all()->pluck('nama_lahan', 'id')->prepend(trans('global.pleaseSelect'), '');

        $panen->load('lahan');

        return view('admin.panens.edit', compact('lahans', 'panen'));
    }

    public function update(UpdatePanenRequest $request, Panen $panen)
    {
        $panen->update($request->all());

        return redirect()->route('admin.panens.index');
    }

    public function destroy(Panen $panen)
    {
        abort_if(Gate::denies('panen_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $panen->delete();

        return back();
    }

    public function massDestroy(MassDestroyPanenRequest $request)
    {
        Panen::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
