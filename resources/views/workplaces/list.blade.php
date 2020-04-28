@extends('adminlte::page')
@section('title', 'Workplaces / Admin panel')

@section('content_header')
    <h1>Workplaces</h1>
@stop

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
         <div class="box-body">
           <table id="example" class="table table-bordered table-hover">
             <thead>
             <tr>
               <th>#</th>
               <th>Mark</th>
               <th>Description</th>
               <th>Equipments</th>
               <th>Action</th>
             </tr>
             </thead>
             <tbody>
            @foreach ($workplacesList as $workplace)
              <tr>
                <td> {{ $workplace->id }} </td>
                <td> {{ $workplace->mark }} </td>
                <td> {{ $workplace->description }} </td>
                <td>
                  <ul>
                    @foreach ($workplace->equipments as $equipment)
                      <li>
                        {{ $equipment->mark }}
                     </li>
                    @endforeach
                  </ul>
                </td>
                <td>
                  <a href="{{ url('/workplaces', [$workplace->id]) }}" class="btn btn-info btn-sm" title="Details"><i class="fas fa-info"></i></a>
                  <a href="" class="btn bg-purple btn-sm" id="{{ $workplace->id }}" data-toggle="modal" data-target="#modal-default" title="Add/remove equipment"><i class="fas fa-plus">/</i><i class="fas fa-minus"></i></a>
                </td>
              </tr>
            @endforeach
             </tbody>
             <tfoot>
               <tr>
                 <th>#</th>
                 <th>Mark</th>
                 <th>Description</th>
                 <th>Equipments</th>
                 <th>Action</th>
               </tr>
             </tfoot>
           </table>
         </div>
       </div>
     </div>

    <div class="modal fade" id="modal-default">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Select equipment</h4>
          </div>
          <div class="modal-body">
            <label>Select Multiple</label>
            <div class="form-group">
              <select style="width: 100%" class="js-example-basic-multiple" multiple="multiple" id="mySelect2">
                @foreach ($freeEquipmentsList as $equipment)
                  <option option value="{{ $equipment->id }}">{{ $equipment->mark }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" id="close">Close</button>
          </div>
        </div>
      </div>
    </div>

@stop
@section('scripts')
  @section('scripts')
  <script type="text/javascript">
    $(document).ready(function() {
      $('#example').DataTable();
      $('.js-example-basic-multiple').select2();
      $('.bg-purple').click(function () {
        var id = $(this).attr('id');
        @foreach ($equipmentsList as $equipment)
          var workplace_id = '{{ $equipment->workplace_id }}';
          if (id == workplace_id) {
            var data = {
                id: '{{ $equipment->id }}',
                text: '{{ $equipment->mark }}'
            };
            var newOption = new Option(data.text, data.id, true, true);
            $('#mySelect2').append(newOption).trigger('change');
          }
        @endforeach
        $('#close').data('id', id);
      });

      $('#mySelect2').on('select2:selecting', function (e) {
        var workplace_id = $('#close').data('id');
        $.ajax({
          url: '{{ route('attachEquipment') }}',
          method: 'post',
          data: {_token: '{{ csrf_token() }}', equipment_id: e.params.args.data.id, workplace_id: workplace_id},
          success: function () {
            console.log('ok');
          }
        });
      });

      $('#mySelect2').on('select2:unselecting', function (e) {
        $.ajax({
          url: '{{ route('removeEquipment') }}',
          method: 'post',
          data: {_token: '{{ csrf_token() }}', equipment_id: e.params.args.data.id},
          success: function () {
            console.log('ok');
          }
        });
      });

      $('#close, .close').click(function (e) {
        e.preventDefault();
        location.reload();
      });
    });
  </script>
@endsection
