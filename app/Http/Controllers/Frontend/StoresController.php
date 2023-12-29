<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyStoreRequest;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use App\Models\Store;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StoresController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('store_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $stores = Store::with(['created_by'])->get();

        return view('frontend.stores.index', compact('stores'));
    }

    public function create()
    {
        abort_if(Gate::denies('store_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.stores.create');
    }

    public function store(StoreStoreRequest $request)
    {
        $store = Store::create($request->all());

        return redirect()->route('frontend.stores.index');
    }

    public function edit(Store $store)
    {
        abort_if(Gate::denies('store_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->load('created_by');

        return view('frontend.stores.edit', compact('store'));
    }

    public function update(UpdateStoreRequest $request, Store $store)
    {
        $store->update($request->all());

        return redirect()->route('frontend.stores.index');
    }

    public function show(Store $store)
    {
        abort_if(Gate::denies('store_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->load('created_by');

        return view('frontend.stores.show', compact('store'));
    }

    public function destroy(Store $store)
    {
        abort_if(Gate::denies('store_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $store->delete();

        return back();
    }

    public function massDestroy(MassDestroyStoreRequest $request)
    {
        $stores = Store::find(request('ids'));

        foreach ($stores as $store) {
            $store->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
