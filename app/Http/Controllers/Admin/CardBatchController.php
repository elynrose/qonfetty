<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyCardBatchRequest;
use App\Http\Requests\StoreCardBatchRequest;
use App\Http\Requests\UpdateCardBatchRequest;
use App\Models\CardBatch;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CardBatchController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('card_batch_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardBatches = CardBatch::all();

        return view('admin.cardBatches.index', compact('cardBatches'));
    }

    public function create()
    {
        abort_if(Gate::denies('card_batch_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cardBatches.create');
    }

    public function store(StoreCardBatchRequest $request)
    {
        $cardBatch = CardBatch::create($request->all());

        return redirect()->route('admin.card-batches.index');
    }

    public function edit(CardBatch $cardBatch)
    {
        abort_if(Gate::denies('card_batch_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cardBatches.edit', compact('cardBatch'));
    }

    public function update(UpdateCardBatchRequest $request, CardBatch $cardBatch)
    {
        $cardBatch->update($request->all());

        return redirect()->route('admin.card-batches.index');
    }

    public function show(CardBatch $cardBatch)
    {
        abort_if(Gate::denies('card_batch_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.cardBatches.show', compact('cardBatch'));
    }

    public function destroy(CardBatch $cardBatch)
    {
        abort_if(Gate::denies('card_batch_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cardBatch->delete();

        return back();
    }

    public function massDestroy(MassDestroyCardBatchRequest $request)
    {
        $cardBatches = CardBatch::find(request('ids'));

        foreach ($cardBatches as $cardBatch) {
            $cardBatch->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
