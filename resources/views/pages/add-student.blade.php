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
                   <form action="{{route('add.studentPost')}}" method="POST">
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
                            <input type="text" name="stuName" id="name"  class="form-control" value="{{old('stuName')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Student Email</label>
                            <input type="email" name="stuEmail" id="email" class="form-control" value="{{old('stuEmail')}}">
                        </div>
                    </div>

                    <div class="row d-flex mt-3">
                        <div class="col-md-6">
                            <label for="class" class="form-label">Class</label>
                            <select name="stuClass" id="" class="form-select">
                                <option value="1">1st</option>
                                <option value="2">2nd</option>
                                <option value="3">3rd</option>
                                <option value="4">4th</option>
                                <option value="5">5th</option>
                                <option value="6">6th</option>
                                <option value="7">7th</option>
                                <option value="8">8th</option>
                                <option value="9">9th</option>
                                <option value="10">10th</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="stuStatus" class="form-label">Choose status</label>
                            <select name="stuStatus" id="stuStatus" class="form-select">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
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