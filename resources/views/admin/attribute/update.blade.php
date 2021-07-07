@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Cập nhật thuộc tính</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.attribute.index')}}"></i> Attribute</a></li>
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
                            <div class="form-group {{$errors->first('atb_name') ? 'has-error':''}}" >
                                <label for="name">Name<span class="text-danger">(*)</span></label>
                                <input type="text" class="form-control" value="{{$attribute->atb_name}}" name="atb_name" placeholder="Name...">
                                @if($errors->first('atb_name'))
                                    <span class="text-danger">{{ $errors->first('atb_name') }}</span>
                                @endif
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group {{$errors->first('atb_type') ? 'has-error':''}}" >
                                <label for="name">Group</label>
                                <select class="form-control"  name="atb_type">
                                    <option >--Chọn danh mục--</option>
                                    <option value="1"{{$attribute->atb_type == 1 ? "selected='selected'": ''}}>Đôi</option>
                                    <option value="2"{{$attribute->atb_type == 2 ? "selected='selected'": ''}}>Năng lượng</option>
                                    <option value="3"{{$attribute->atb_type == 3 ? "selected='selected'": ''}}>Loại dây</option>
                                    <option value="4"{{$attribute->atb_type == 4 ? "selected='selected'": ''}}>Loại vỏ</option>
                                </select>
                                @if($errors->first('atb_type'))
                                    <span class="text-danger">{{ $errors->first('atb_type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="form-group {{$errors->first('atb_category_id') ? 'has-error':''}}" >
                                <label for="name">Category</label>
                                <select class="form-control"  name="atb_category_id">
                                    @foreach($categories as $item)
                                        <option value="1" {{$attribute->atb_category_id == $item->id ? "selected ='selected'": ''}}>{{$item->c_name}}</option>
                                    @endforeach
                                </select>
                                @if($errors->first('atb_category_id'))
                                    <span class="text-danger">{{ $errors->first('atb_category_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="box-footer text-center">
                                <a href="{{route('admin.attribute.index')}}" class="btn btn-danger">Quay lại <i class="fa fa-undo"></i></a>
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
