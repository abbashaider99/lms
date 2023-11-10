@extends('layouts.app');

@section('pageTitle')
Categories List
@endsection
@section('pageActionBtn')
<a href="{{route('add.category')}}" class="btn btn-outline-primary"><i class="fa-solid fa-plus"></i> New Category</a>
@endsection
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Categories List
                    </div>
                </div>
                <div class="card-body" style="overflow: y:auto, max-height: 400px">
                    <div class="row d-flex justify-content-center">
                        @foreach($categories as $category)
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><b>{{ $category->cat_name }}</b></h5>
                                    <div class="d-flex justify-content-end align-items-center">
                                        <div class="btn-group">
                                            <a href="{{route('edit.category', $category->id)}}" class="btn btn-warning btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                            <a href="{{route('delete.category', $category->id)}}" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    </div>
                                    <p class="card-text">{{ $category->cat_desc }}</p>
                                    <div class="d-flex justify-content-between">
                                        <small class="text-muted">Created by: <strong>Abbas</strong></small>
                                        <span>Total Books: <strong>{{ $category->books_count }}</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>                        
                        @endforeach
                    </div>     
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection