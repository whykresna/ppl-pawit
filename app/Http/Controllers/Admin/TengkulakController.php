<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTengkulakRequest;
use App\Http\Requests\StoreTengkulakRequest;
use App\Http\Requests\UpdateTengkulakRequest;
use App\Tengkulak;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TengkulakController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tengkulak_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tengkulaks = Tengkulak::all();

        return view('admin.tengkulaks.index', compact('tengkulaks'));
    }

    public function create()
    {
        abort_if(Gate::denies('tengkulak_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tengkulaks.create');
    }

    public function store(StoreTengkulakRequest $request)
    {
        $tengkulak = Tengkulak::create($request->all());

        return redirect()->route('admin.tengkulaks.index');
    }

    public function edit(Tengkulak $tengkulak)
    {
        abort_if(Gate::denies('tengkulak_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tengkulaks.edit', compact('tengkulak'));
    }

    public function update(UpdateTengkulakRequest $request, Tengkulak $tengkulak)
    {
        $tengkulak->update($request->all());

        return redirect()->route('admin.tengkulaks.index');
    }

    public function destroy(Tengkulak $tengkulak)
    {
        abort_if(Gate::denies('tengkulak_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tengkulak->delete();

        return back();
    }

    public function massDestroy(MassDestroyTengkulakRequest $request)
    {
        Tengkulak::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
