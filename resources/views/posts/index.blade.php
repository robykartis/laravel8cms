@extends('layouts._dashboard.app')
@section('title')
{{ trans('posts.title.index') }}
@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('posts') }}
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="GET" class="form-inline form-row">
                            <div class="col">
                                <div class="input-group mx-1">
                                    <label class="font-weight-bold mr-2">{{
                                        trans('posts.form_control.select.status.label') }}</label>
                                    <select name="status" class="custom-select">
                                        @foreach ($statuses as $value => $label)
                                        <option value="{{$value}}" {{$statusSelected == $value ?"selected" : null}}>{{$label}}</option>
                                        @endforeach

                                    </select>
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">{{
                                            trans('posts.button.apply.value') }}</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="input-group mx-1">
                                    <input name="keyword" value="{{request()->get('keyword')}}" type="search" class="form-control" placeholder="{{ trans('posts.form_control.input.search.placeholder') }}">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary float-right" role="button">
                            {{ trans('posts.button.create.value') }}
                            <i class="fas fa-plus-square"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <!-- list post -->
                    @include('posts._posts-list')
                </ul>
            </div>
            @if ($posts->hasPages())
            <div class="card-footer">
                {{$posts->links('vendor.pagination.bootstrap-4')}}
            </div>
            @endif

        </div>
    </div>
</div>
@endsection
@push('javascript-internal')
<script>
    $(document).ready(function() {
        // Event : Delete Tag
        $("form[role='alert']").submit(function(event) {
            event.preventDefault();
            Swal.fire({
                title: "{{ trans('posts.alert.delete.title') }}"
                , text: $(this).attr('alert-text')
                , icon: 'warning'
                , allowOutsideClick: false
                , showCancelButton: true
                , cancelButtonText: "{{ trans('posts.button.cancel.value') }}"
                , reverseButtons: true
                , confirmButtonText: "{{ trans('posts.button.delete.value') }}"
            , }).then((result) => {
                if (result.isConfirmed) {
                    // todo: process of deleting categories
                    event.target.submit();
                }
            });

        });
    });

</script>

@endpush
