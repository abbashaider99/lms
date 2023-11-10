@extends('layouts.app');

@section('pageTitle')
Add Student
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Students List
                    </div>
                </div>
                <div class="card-body">
                   <form action="{{route('edit.studentPost', $student->id)}}" method="POST">
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
                            <label for="name" class="form-lable">Student Name: </label>
                            <input type="text" name="stuName" id="name"  class="form-control" value="{{old('stuName', $student->name)}}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Student Email</label>
                            <input type="email" name="stuEmail" id="email" class="form-control" value="{{old('stuEmail', $student->email)}}">
                        </div>
                    </div>

                    <div class="row d-flex mt-3">
                        <div class="col-md-6">
                            <label for="class" class="form-label">Class</label>
                            <select name="stuClass" id="stuClass" class="form-select">
                                <option value="" selected>Select class</option>
                                <option value="1" {{ (old('stuClass', $student->class) == 1) ? 'selected' : '' }}>1st</option>
                                <option value="2" {{ (old('stuClass', $student->class) == 2) ? 'selected' : '' }}>2nd</option>
                                <option value="3" {{ (old('stuClass', $student->class) == 3) ? 'selected' : '' }}>3rd</option>
                                <option value="4" {{ (old('stuClass', $student->class) == 4) ? 'selected' : '' }}>4th</option>
                                <option value="5" {{ (old('stuClass', $student->class) == 5) ? 'selected' : '' }}>5th</option>
                                <option value="6" {{ (old('stuClass', $student->class) == 6) ? 'selected' : '' }}>6th</option>
                                <option value="7" {{ (old('stuClass', $student->class) == 7) ? 'selected' : '' }}>7th</option>
                                <option value="8" {{ (old('stuClass', $student->class) == 8) ? 'selected' : '' }}>8th</option>
                                <option value="9" {{ (old('stuClass', $student->class) == 9) ? 'selected' : '' }}>9th</option>
                                <option value="10" {{ (old('stuClass', $student->class) == 10) ? 'selected' : '' }}>10th</option>
                            </select>                            
                        </div>
                        <div class="col-md-6">
                            <label for="stuStatus" class="form-label">Choose status</label>
                            <select name="stuStatus" id="stuStatus" class="form-select">
                                <option value="1" {{ (old('stuStatus', $student->status) == 1) ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ (old('stuStatus', $student->status) == 0) ? 'selected' : '' }}>Inactive</option>
                            </select>                            
                        </div>
                    </div>
                    <div class="mt-5">
                       <button class="btn btn-primary">Save Student</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection