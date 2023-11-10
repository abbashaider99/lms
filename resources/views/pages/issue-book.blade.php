@extends('layouts.app');

@section('pageTitle')
Issue Book
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Issue Book
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('issue.bookPost') }}" method="POST">
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
                                <label for="stuName" class="form-label">Student Name</label>
                                <input type="text" name="stuName" id="stuName" class="form-control" value="{{ $student->name }}" readonly>
                            </div>
                            <div class="col-md-6">
                                <label for="bookTitle" class="form-label">Book Title</label>
                                <select name="book_id" id="bookTitle" class="form-select" required>
                                    <option value="" selected disabled>Select Book</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <input type="hidden" name="stu_id" value="{{$student->id}}">
                        <div class="mt-5">
                            <button class="btn btn-primary" type="submit">Issue Book</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>
</div>
@endsection