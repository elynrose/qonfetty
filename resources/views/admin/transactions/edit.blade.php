@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.update", [$transaction->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="orders_id">{{ trans('cruds.transaction.fields.orders') }}</label>
                <select class="form-control select2 {{ $errors->has('orders') ? 'is-invalid' : '' }}" name="orders_id" id="orders_id" required>
                    @foreach($orders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('orders_id') ? old('orders_id') : $transaction->orders->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('orders'))
                    <div class="invalid-feedback">
                        {{ $errors->first('orders') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.orders_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('paid') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="paid" value="0">
                    <input class="form-check-input" type="checkbox" name="paid" id="paid" value="1" {{ $transaction->paid || old('paid', 0) === 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="paid">{{ trans('cruds.transaction.fields.paid') }}</label>
                </div>
                @if($errors->has('paid'))
                    <div class="invalid-feedback">
                        {{ $errors->first('paid') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.paid_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection