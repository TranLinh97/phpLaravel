@extends('layouts.app_master_admin')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Quản lý bài viết</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="{{route('admin.article.index')}}"> Article</a></li>
            <li class="active"> List</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{route('admin.article.create')}}" class="btn btn-primary">Thêm mới <i class="fa fa-plus"></i></a></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-12">
                        <table class="table">
                            <tbody>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Avatar</th>
                                <th>Active</th>
                                <th>Hot</th>
                                <th>Time</th>
                                <th>Active</th>
                            </tr>
                            @if(isset($articles))
                                @foreach($articles as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        <td>{{$article->a_name}}</td>
{{--                                        <td>--}}
{{--                                            <span class="label label-success">{{$product->category->c_name  ?? "[N/A]"}}</span>--}}
{{--                                        </td>--}}
                                        <td>
                                            <img src="{{pare_url_file( $article->a_avatar)}}"style="height: 80px;width: 80px" alt="">
                                        </td>
                                        <td>
                                            @if($article->a_active == 1)
                                                <a href="{{ route('admin.article.active',$article->id) }}" class="label label-info">Show</a>
                                            @else
                                                <a href="{{ route('admin.article.active',$article->id) }}" class="label label-default">None</a>
                                            @endif
                                        </td>
                                        <td>
                                            @if($article->a_hot == 1)
                                                <a href="{{ route('admin.article.hot',$article->id) }}" class="label label-info">Hot</a>
                                            @else
                                                <a href="{{ route('admin.article.hot',$article->id) }}" class="label label-default">None</a>
                                            @endif
                                        </td>
                                        <td>{{$article->created_at}}</td>
                                        <td>
                                            <a href="{{route('admin.article.update',$article->id)}}" class="btn btn-success"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{route('admin.article.delete',$article->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
                                        </td>

                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box-footer">
{{--                    {!! $products->links() !!}--}}
                </div>
            </div>
            <!-- /.box -->
        </div>
    </section>
    <!-- /.content -->
@stop
