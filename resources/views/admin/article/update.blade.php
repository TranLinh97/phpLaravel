@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật bài viết</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.article.index')}}">Article</a></li>
            <li class="active">Update</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            @include('admin.article.form');
            {{-- <div class="box-header with-border">
                    <h3 class="box-title">Album ảnh</h3>
                </div>
                <div class="box-body">
                     <div class="form-group">
                        <div class="file-loading">
                            <input id="images" type="file" name="file" multiple class="file" data-overwrite-initial="false" data-min-file-count="0">
                        </div>
                    </div>
                </div> --}}

        </div>
    </section>
    <!-- /.content -->
@stop
