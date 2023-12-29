@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.customer.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.customers.update", [$customer->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="card_id">{{ trans('cruds.customer.fields.card') }}</label>
                            <select class="form-control select2" name="card_id" id="card_id" required>
                                @foreach($cards as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('card_id') ? old('card_id') : $customer->card->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('card'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('card') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.card_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="stores_id">{{ trans('cruds.customer.fields.stores') }}</label>
                            <select class="form-control select2" name="stores_id" id="stores_id" required>
                                @foreach($stores as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('stores_id') ? old('stores_id') : $customer->stores->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stores'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stores') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.customer.fields.stores_helper') }}</span>
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