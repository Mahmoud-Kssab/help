@extends('dashboard.layouts.app')

@section('title', 'AdminLTE 3 | Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Link 1</a></li>
    <li class="breadcrumb-item active">Link 2</li>
@endsection

@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Expandable Table</h3>
        </div>
        <!-- ./card-header -->
        <div class="card-body">
          <table class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>#</th>
                <th>category</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr data-widget="expandable-table" aria-expanded="false">
                        <td>{{$category->name}}</td>
                        <td>---------------</td>
                    </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('js')




@endsection
