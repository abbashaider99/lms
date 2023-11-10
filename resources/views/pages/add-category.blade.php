@extends('layouts.app');

@section('pageTitle')
Add Category
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Add category
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('add.categoryPost')}}" method="POST">
                    @csrf
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="row d-flex mt-3">
                        <div class="col-md-6">
                            <label for="name" class="form-lable">Category Name: </label>
                            <input type="text" name="catName" id="name"  class="form-control" value="{{old('catName')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="des" class="form-label">Category Description</label>
                            <input type="text" name="catDesc" id="desc" class="form-control" value="{{old('catDesc')}}">
                        </div>
                    </div>

                    <div class="mt-5">
                       <button class="btn btn-primary">Save Category</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection