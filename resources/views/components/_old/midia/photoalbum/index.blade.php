@extends('layouts.app')

{{-- Web site Title --}}
@section('title') {!! trans("admin/photoalbum.photoalbum") !!}
:: @parent @endsection

{{-- Content --}}
@section('main')
    <div class="page-header">
        <h3>
            {!! trans("admin/photoalbum.photoalbum") !!}
            <div class="float-right">
                <div class="float-right">
                    <a href="{!! url('admin/albums/create') !!}"
                       class="btn btn-sm  btn-primary iframe"><span
                                class="glyphicon glyphicon-plus-sign"></span> {{ trans("admin/modal.new") }}</a>
                </div>
            </div>
        </h3>
    </div>

    <table id="table" class="table table-striped table-hover">
        <thead>
        <tr>
            <th>{!! trans("admin/modal.title") !!}</th>
            <th>{!! trans("admin/admin.language") !!}</th>
            <th>{!! trans("admin/photoalbum.numbers_of_items") !!}</th>
            <th>{!! trans("admin/admin.created_at") !!}</th>
            <th>{!! trans("admin/admin.action") !!}</th>
        </tr>
        </thead>
        <tbody></tbody>
    </table>
@endsection

{{-- Scripts --}}
@section('scripts')
@endsection
