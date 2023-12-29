@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.card.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.cards.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="card_batch_id">{{ trans('cruds.card.fields.card_batch') }}</label>
                <select class="form-control select2 {{ $errors->has('card_batch') ? 'is-invalid' : '' }}" name="card_batch_id" id="card_batch_id" required>
                    @foreach($card_batches as $id => $entry)
                        <option value="{{ $id }}" {{ old('card_batch_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('card_batch'))
                    <div class="invalid-feedback">
                        {{ $errors->first('card_batch') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.card.fields.card_batch_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="code">{{ trans('cruds.card.fields.code') }}</label>
                <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ old('code', '') }}" required>
                @if($errors->has('code'))
                    <div class="invalid-feedback">
                        {{ $errors->first('code') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.card.fields.code_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_registered') ? 'is-invalid' : '' }}">
                    <input type="hidden" name="is_registered" value="0">
                    <input class="form-check-input" type="checkbox" name="is_registered" id="is_registered" value="1" {{ old('is_registered', 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_registered">{{ trans('cruds.card.fields.is_registered') }}</label>
                </div>
                @if($errors->has('is_registered'))
                    <div class="invalid-feedback">
                        {{ $errors->first('is_registered') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.card.fields.is_registered_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.card.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.card.fields.user_helper') }}</span>
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