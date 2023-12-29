@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card">
                <div class="card-header">
                    {{ trans('global.edit') }} {{ trans('cruds.point.title_singular') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route("frontend.points.update", [$point->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label class="required" for="points">{{ trans('cruds.point.fields.points') }}</label>
                            <input class="form-control" type="number" name="points" id="points" value="{{ old('points', $point->points) }}" step="1" required>
                            @if($errors->has('points'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('points') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.point.fields.points_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="code_id">{{ trans('cruds.point.fields.code') }}</label>
                            <select class="form-control select2" name="code_id" id="code_id" required>
                                @foreach($codes as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('code_id') ? old('code_id') : $point->code->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('code'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('code') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.point.fields.code_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <label class="required" for="stores_id">{{ trans('cruds.point.fields.stores') }}</label>
                            <select class="form-control select2" name="stores_id" id="stores_id" required>
                                @foreach($stores as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('stores_id') ? old('stores_id') : $point->stores->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('stores'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('stores') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.point.fields.stores_helper') }}</span>
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