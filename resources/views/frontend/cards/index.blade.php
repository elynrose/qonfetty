@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('card_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.cards.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.card.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.card.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Card">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.card.fields.card_batch') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.card.fields.code') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.card.fields.is_registered') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.card.fields.user') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cards as $key => $card)
                                    <tr data-entry-id="{{ $card->id }}">
                                        <td>
                                            {{ $card->card_batch->batch_code ?? '' }}
                                        </td>
                                        <td>
                                            {{ $card->code ?? '' }}
                                        </td>
                                        <td>
                                            <span style="display:none">{{ $card->is_registered ?? '' }}</span>
                                            <input type="checkbox" disabled="disabled" {{ $card->is_registered ? 'checked' : '' }}>
                                        </td>
                                        <td>
                                            {{ $card->user->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('card_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.cards.show', $card->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('card_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.cards.edit', $card->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('card_delete')
                                                <form action="{{ route('frontend.cards.destroy', $card->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('card_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.cards.massDestroy') }}",
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
  let table = $('.datatable-Card:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection