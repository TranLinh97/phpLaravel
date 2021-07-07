@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới bài viết</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.article.index')}}">Article</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            @include('admin.article.form')

            <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
            <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/js/fileinput.js" type="text/javascript"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.7/themes/fa/theme.js" type="text/javascript"></script>

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
