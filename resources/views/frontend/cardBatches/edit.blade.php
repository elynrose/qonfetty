@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.cardBatch.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.card-batches.update", [$cardBatch->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="batch_code">{{ trans('cruds.cardBatch.fields.batch_code') }}</label>
                            <input class="form-control" type="text" name="batch_code" id="batch_code" value="{{ old('batch_code', $cardBatch->batch_code) }}" required>
                            @if($errors->has('batch_code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('batch_code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cardBatch.fields.batch_code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="published">{{ trans('cruds.cardBatch.fields.published') }}</label>
                            <input class="form-control date" type="text" name="published" id="published" value="{{ old('published', $cardBatch->published) }}">
                            @if($errors->has('published'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('published') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cardBatch.fields.published_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="quantity">{{ trans('cruds.cardBatch.fields.quantity') }}</label>
                            <input class="form-control" type="number" name="quantity" id="quantity" value="{{ old('quantity', $cardBatch->quantity) }}" step="1">
                            @if($errors->has('quantity'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('quantity') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cardBatch.fields.quantity_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="distrubuted" value="0">
                                <input type="checkbox" name="distrubuted" id="distrubuted" value="1" {{ $cardBatch->distrubuted || old('distrubuted', 0) === 1 ? 'checked' : '' }}>
                                <label for="distrubuted">{{ trans('cruds.cardBatch.fields.distrubuted') }}</label>
                            </div>
                            @if($errors->has('distrubuted'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('distrubuted') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.cardBatch.fields.distrubuted_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection