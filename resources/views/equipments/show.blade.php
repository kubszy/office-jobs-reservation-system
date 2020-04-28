@extends('adminlte::page')
@section('title', 'Equipment / Admin panel')

@section('content_header')
    <h1>Equipment</h1>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @isset ($equipment)
          <table class="table table-bordered">
            <tr>
              <td>ID</td>
              <td> {{ $equipment->id }} </td>
            </tr>
            <tr>
              <td>Type</td>
              <td> {{ $equipment->type }} </td>
            </tr>
            <tr>
              <td>Model</td>
              <td> {{ $equipment->model }} </td>
            </tr>
            <tr>
              <td>Mark</td>
              <td> {{ $equipment->mark }} </td>
            </tr>
            <tr>
              <td>Year purchase</td>
              <td> {{ $equipment->year_purchase }} </td>
            </tr>
            <tr>
              <td>Worth</td>
              <td> {{ $equipment->worth }} </td>
            </tr>
            <tr>
              <td>Description</td>
              <td> {{ $equipment->description }} </td>
            </tr>
            @if ($equipment->workplace)
            <tr>
              <td>Workplace</td>
              <td>
                <ul>
                  <li>
                    {{ $equipment->workplace->mark }}
                 </li>
                </ul>
              </td>
            </tr>
            @endif      
          </table>
        @endisset
      </div>
    </div>
  </div>
</div>
@stop
