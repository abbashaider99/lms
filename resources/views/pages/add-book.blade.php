@extends('layouts.app');

@section('pageTitle')
Add Book
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Add Book
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('add.bookPost')}}" method="POST">
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
                            <label for="bookTitle" class="form-lable">Book Title: </label>
                            <input type="text" name="bookTitle" id="bookTitle"  class="form-control" value="{{old('bookTitle')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="bookAuthor" class="form-label">Author </label>
                            <input type="text" name="bookAuthor" id="bookAuthor" class="form-control" value="{{old('bookAuthor')}}">
                        </div>
                    </div>


                    <div class="d-flex mt-3">
                        <div class="col-md-6">
                            <label for="isbn" class="form-lable">ISBN</label>
                            <input type="number" name="isbn" id="isbn" class="form-control" value="{{old('isbn')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="form-label">Category</label>
                            <select name="bookCat" id="category" class="form-select">
                                <option value="" selected disabled hidden>Select Category</option>
                                @foreach ($bookCat as $cat)
                                    <option value="{{$cat->id}}">{{$cat->cat_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="mt-5">
                       <button class="btn btn-primary">Save Book</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection