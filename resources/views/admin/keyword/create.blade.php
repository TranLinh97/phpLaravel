@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Thêm mới từ khóa</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.keyword.index')}}"></i> Keyword</a></li>
            <li class="active">Create</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-body">
                        <form role="form" action="" method="post">
                            @csrf
                            <div class="col-sm-8">
                                <div class="form-group {{$errors->first('k_name') ? 'has-error':''}}" >
                                    <label for="name">Name<span class="text-danger">(*)</span></label>
                                    <input type="text" class="form-control" name="k_name" placeholder="Name...">
                                    @if($errors->first('k_name'))
                                        <span class="text-danger">{{ $errors->first('k_name') }}</span>
                                    @endif
                                </div>
                                <!-- /.box-body -->
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group" >
                                    <label for="name">Description<span class="text-danger">(*)</span></label>
                                    <textarea type="text" class="form-control" name="k_description" placeholder="Description..."></textarea>
                                    @if($errors->first('k_description'))
                                        <span class="text-danger">{{ $errors->first('k_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="box-footer text-center">
                                    <a href="{{route('admin.keyword.index')}}" class="btn btn-danger">Quay lại <i class="fa fa-undo"></i></a>
                                    <button type="submit" class="btn btn-success">Lưu dữ liệu <i class="fa fa-undo"></i></button>
                                </div>
                            </div>
                        </form>
                    <!-- /.box-body -->
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
@stop
