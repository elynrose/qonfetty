@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.card.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.cards.update", [$card->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="card_batch_id">{{ trans('cruds.card.fields.card_batch') }}</label>
                            <select class="form-control select2" name="card_batch_id" id="card_batch_id" required>
                                @foreach($card_batches as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('card_batch_id') ? old('card_batch_id') : $card->card_batch->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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
                            <input class="form-control" type="text" name="code" id="code" value="{{ old('code', $card->code) }}" required>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.card.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <div>
                                <input type="hidden" name="is_registered" value="0">
                                <input type="checkbox" name="is_registered" id="is_registered" value="1" {{ $card->is_registered || old('is_registered', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_registered">{{ trans('cruds.card.fields.is_registered') }}</label>
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
                            <select class="form-control select2" name="user_id" id="user_id">
                                @foreach($users as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $card->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
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

        </div>
    </div>
</div>
@endsection