@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.create') }} {{ trans('cruds.order.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.orders.store") }}" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="stores_id">{{ trans('cruds.order.fields.stores') }}</label>
                            <select class="form-control select2" name="stores_id" id="stores_id" required>
                                @foreach($stores as $id => $entry)
                                    <option value="{{ $id }}" {{ old('stores_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stores'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stores') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.stores_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="reward_id">{{ trans('cruds.order.fields.reward') }}</label>
                            <select class="form-control select2" name="reward_id" id="reward_id" required>
                                @foreach($rewards as $id => $entry)
                                    <option value="{{ $id }}" {{ old('reward_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('reward'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('reward') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.reward_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="card_id">{{ trans('cruds.order.fields.card') }}</label>
                            <select class="form-control select2" name="card_id" id="card_id" required>
                                @foreach($cards as $id => $entry)
                                    <option value="{{ $id }}" {{ old('card_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('card'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('card') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.card_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label for="claimed">{{ trans('cruds.order.fields.claimed') }}</label>
                            <input class="form-control" type="number" name="claimed" id="claimed" value="{{ old('claimed', '0') }}" step="1">
                            @if($errors->has('claimed'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('claimed') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.order.fields.claimed_helper') }}</span>
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