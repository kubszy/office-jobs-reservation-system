@extends('adminlte::page')
@section('title', 'Equipments / Admin panel')

@section('content_header')
    <h1>Equipments</h1>
@stop

@section('content')
    <div class="row">
      <div class="col-xs-12">
        <div class="box">

         <!-- /.box-header -->
         <div class="box-body">
           <table id="example" class="table table-bordered table-hover">
             <thead>
             <tr>
               <th>#</th>
               <th>Type</th>
               <th>Model</th>
               <th>Mark</th>
               <th>Year purchase</th>
               <th>Worth</th>
               <th>Description</th>
               <th>Workplace</th>
               <th>Action</th>
             </tr>
             </thead>
             <tbody>
            @foreach ($equipmentsList as $equipment)
              <tr>
                <td> {{ $equipment->id }} </td>
                <td> {{ $equipment->type }} </td>
                <td> {{ $equipment->model }} </td>
                <td> {{ $equipment->mark }} </td>
                <td> {{ $equipment->year_purchase }} </td>
                <td> {{ $equipment->worth }} $ </td>
                <td> {{ $equipment->description }} </td>
                @if($equipment->workplace)
                  <td> {{ $equipment->workplace->mark }} </td>
                @else
                  <td></td>
                @endif
                <td>
                  <a href="{{ url('/equipments', [$equipment->id]) }}" class="btn btn-info btn-sm" title="Details"><i class="fas fa-info"></i></a>
                </td>
              </tr>
            @endforeach
             </tbody>
             <tfoot>
               <tr>
                 <th>#</th>
                 <th>Type</th>
                 <th>Model</th>
                 <th>Mark</th>
                 <th>Year purchase</th>
                 <th>Worth</th>
                 <th>Description</th>
                 <th>Workplace</th>
                 <th>Action</th>
               </tr>
             </tfoot>
           </table>
         </div>
         <!-- /.box-body -->
       </div>
     </div>
@stop
@section('scripts')
  <script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
  });
  </script>
@endsection
