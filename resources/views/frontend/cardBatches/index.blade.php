@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('card_batch_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.card-batches.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.cardBatch.title_singular') }}
                        </a>
                        <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                            {{ trans('global.app_csvImport') }}
                        </button>
                        @include('csvImport.modal', ['model' => 'CardBatch', 'route' => 'admin.card-batches.parseCsvImport'])
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.cardBatch.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-CardBatch">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.cardBatch.fields.batch_code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cardBatch.fields.published') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cardBatch.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.cardBatch.fields.distrubuted') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cardBatches as $key => $cardBatch)
                                    <tr data-entry-id="{{ $cardBatch->id }}">
                                        <td>
                                            {{ $cardBatch->batch_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cardBatch->published ?? '' }}
                                        </td>
                                        <td>
                                            {{ $cardBatch->quantity ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $cardBatch->distrubuted ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $cardBatch->distrubuted ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            @can('card_batch_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.card-batches.show', $cardBatch->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('card_batch_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.card-batches.edit', $cardBatch->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('card_batch_delete')
                                                <form action="{{ route('frontend.card-batches.destroy', $cardBatch->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('card_batch_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.card-batches.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-CardBatch:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection