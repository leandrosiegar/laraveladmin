@extends('adminlte::page')

@section('title', 'Dashboard')



@section('content_header')
    <h1>Dashboard</h1>
@endsection

@section('content')
  lo que sea
@endsection

@section('css')
  <link rel="stylesheet" href="{{asset('css/app.css')}}">
@endsection

@section('js')
  <script>
      Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
        )
  </script>
@endsection
