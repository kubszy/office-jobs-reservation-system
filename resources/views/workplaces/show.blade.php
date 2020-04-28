@extends('adminlte::page')
@section('title', 'Workplace / Admin panel')

@section('content_header')
    <h1>Workplace</h1>
@stop

@section('content')
<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        @isset ($workplace)
          <table class="table table-bordered">
            <tr>
              <td>ID</td>
              <td> {{ $workplace->id }} </td>
            </tr>
            <tr>
              <td>Mark</td>
              <td> {{ $workplace->mark }} </td>
            </tr>
            <tr>
              <td>Description</td>
              <td> {{ $workplace->description }} </td>
            </tr>
            @if (!$workplace->equipments->isEmpty())
            <tr>
              <td>Equipment</td>
              <td>
                <ul>
                  @foreach ($workplace->equipments as $equipment)
                    <li>
                      {{ $equipment->mark }}
                   </li>
                  @endforeach
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
