@extends('adminlte::page')

@section('title', 'ojrs')

@section('content_header')
    <h2>office jobs reservation system</h2>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h3>{{ $workplaces }}</h3>
          <p>Workplaces</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-object-group"></i>
        </div>
        <a href="{{ url('/workplaces') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-yellow">
        <div class="inner">
          <h3>{{ $equipments }}</h3>
          <p>Equipments</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-desktop"></i>
        </div>
        <a href="{{ url('/equipments') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3>{{ $users }}</h3>
          <p>Users</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-user"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
@stop
