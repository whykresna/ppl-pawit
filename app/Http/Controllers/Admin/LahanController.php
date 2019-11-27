<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLahanRequest;
use App\Http\Requests\StoreLahanRequest;
use App\Http\Requests\UpdateLahanRequest;
use App\Lahan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LahanController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('lahan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lahans = Lahan::all();

        return view('admin.lahans.index', compact('lahans'));
    }

    public function create()
    {
        abort_if(Gate::denies('lahan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lahans.create');
    }

    public function store(StoreLahanRequest $request)
    {
        $lahan = Lahan::create($request->all());

        return redirect()->route('admin.lahans.index');
    }

    public function edit(Lahan $lahan)
    {
        abort_if(Gate::denies('lahan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.lahans.edit', compact('lahan'));
    }

    public function update(UpdateLahanRequest $request, Lahan $lahan)
    {
        $lahan->update($request->all());

        return redirect()->route('admin.lahans.index');
    }

    public function destroy(Lahan $lahan)
    {
        abort_if(Gate::denies('lahan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $lahan->delete();

        return back();
    }

    public function massDestroy(MassDestroyLahanRequest $request)
    {
        Lahan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
