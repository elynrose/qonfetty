@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @can('reward_create')
                <div style="margin-bottom: 10px;" class="row">
                    <div class="col-lg-12">
                        <a class="btn btn-success" href="{{ route('frontend.rewards.create') }}">
                            {{ trans('global.add') }} {{ trans('cruds.reward.title_singular') }}
                        </a>
                    </div>
                </div>
            @endcan
            <div class="card">
                <div class="card-header">
                    {{ trans('cruds.reward.title_singular') }} {{ trans('global.list') }}
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Reward">
                            <thead>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reward.fields.photo') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reward.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reward.fields.price') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reward.fields.quantity') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reward.fields.points_required') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.reward.fields.stores') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rewards as $key => $reward)
                                    <tr data-entry-id="{{ $reward->id }}">
                                        <td>
                                            @foreach($reward->photo as $key => $media)
                                                <a href="{{ $media->getUrl() }}" target="_blank" style="display: inline-block">
                                                    <img src="{{ $media->getUrl('thumb') }}">
                                                </a>
                                            @endforeach
                                        </td>
                                        <td>
                                            {{ $reward->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reward->price ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reward->quantity ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reward->points_required ?? '' }}
                                        </td>
                                        <td>
                                            {{ $reward->stores->store_name ?? '' }}
                                        </td>
                                        <td>
                                            @can('reward_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('frontend.rewards.show', $reward->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('reward_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('frontend.rewards.edit', $reward->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('reward_delete')
                                                <form action="{{ route('frontend.rewards.destroy', $reward->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('reward_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('frontend.rewards.massDestroy') }}",
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
  let table = $('.datatable-Reward:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection