<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyPenjualanRequest;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Penjualan;
use App\Tengkulak;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PenjualanController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('penjualan_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penjualans = Penjualan::all();

        return view('admin.penjualans.index', compact('penjualans'));
    }

    public function create()
    {
        abort_if(Gate::denies('penjualan_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tengkulaks = Tengkulak::all()->pluck('nama_tengkulak', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.penjualans.create', compact('tengkulaks'));
    }

    public function store(StorePenjualanRequest $request)
    {
        $penjualan = Penjualan::create($request->all());

        return redirect()->route('admin.penjualans.index');
    }

    public function edit(Penjualan $penjualan)
    {
        abort_if(Gate::denies('penjualan_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tengkulaks = Tengkulak::all()->pluck('nama_tengkulak', 'id')->prepend(trans('global.pleaseSelect'), '');

        $penjualan->load('tengkulak');

        return view('admin.penjualans.edit', compact('tengkulaks', 'penjualan'));
    }

    public function update(UpdatePenjualanRequest $request, Penjualan $penjualan)
    {
        $penjualan->update($request->all());

        return redirect()->route('admin.penjualans.index');
    }

    public function destroy(Penjualan $penjualan)
    {
        abort_if(Gate::denies('penjualan_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $penjualan->delete();

        return back();
    }

    public function massDestroy(MassDestroyPenjualanRequest $request)
    {
        Penjualan::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
