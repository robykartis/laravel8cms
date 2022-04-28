@extends('layouts._dashboard.app')
@section('title')
    Dashboard
@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('dashboard_home') }}
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2> {{ trans('dashboard.page.welcome') }} {{ Auth::user()->name }}</h2>
        </div>
    </div>
@endsection
