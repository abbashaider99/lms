@extends('layouts.app');

@section('pageTitle')
    Students List
@endsection
@section('pageActionBtn')
    <a href="javascript:void(0)" class="btn btn-outline-primary" data-toggle="modal" data-target="#addStudentModal"><i
            class="fa-solid fa-plus"></i> New Student</a>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Students List
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover table-bordered table-striped display" id="studentTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Fine</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->id }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->class }}</td>
                                        <td>{{ $student->fine_amount }}</td>
                                        <td>
                                            <span
                                                class="badge badge-sm {{ $student->status == 1 ? 'badge-success' : 'badge-danger' }}">
                                                {{ $student->status == 1 ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td>
                                            <a href="{{ route('edit.student', $student->id) }}" class="btn btn-link"><i
                                                    class="fa-solid fa-pen-to-square "></i></a>
                                            <a href="javascript:void(0)" class="btn btn-link delete_student"
                                                data-id="{{ $student->id }}"><i
                                                    class="fa-solid fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<!-- Add Student Modal -->
<div class="modal fade" id="addStudentModal" tabindex="-1" role="dialog" aria-labelledby="addStudentModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStudentModalLabel">Add New Student</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="newStudentFrom">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="form-lable">Student Name </label>
                        <input type="text" name="stuName" id="name" class="form-control"
                            value="{{ old('stuName') }}">
                    </div>
                    <div class="form-group">
                        <label for="email" class="form-label">Student Email</label>
                        <input type="email" name="stuEmail" id="email" class="form-control"
                            value="{{ old('stuEmail') }}">
                    </div>

                    <div class="form-group">
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
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="saveNewStudent">Save User</button>
        </div>
    </form>
    </div>
</div>
</div>
</div>
