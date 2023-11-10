@extends('layouts.app')

@section('pageTitle')
    Checkout Book
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            Issue and Ruturn Book
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" id="checkoutBookSearch">
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
                            <div class="d-flex justify-content-center">
                                <h4>Search Student</h4>
                            </div>

                            <div class="mt-2">
                                <label for="stuId">Student ID Or Name</label><br>
                                <input type="text" name="stuID" id="stuId" class="form-control"
                                    placeholder="Enter Student Id or Name"><br>
                            </div>

                            <div class="">
                                <button class="btn btn-primary" id="checkoutBooksSeachBtn">Search</button>
                            </div>
                        </form>

                        <hr>
                        <div class="row bookDetails mt-3 align-items-center" id="studentsDetailsOptions">
                            {{-- Book issue and students details button here from -- see ajax books.js --}}
                        </div>


                        <div class="table mt-3" style="display: none" id="bookIusseDiv">
                            <table class="table table-hover table-bordered table-striped" id="bookIssueTable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">ISBN</th>
                                        <th scope="col">Book Title</th>
                                        <th scope="col">Issue Date</th>
                                        <th scope="col">Returned Date</th>
                                        <th scope="col">Fine (Rs.) <br><small class="text-muted" id="fineAmountDays"></small></th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- Issued books record here from ajax -- see books.js--}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

<!-- Issue Book Modal -->
<div class="modal fade" id="issueBookModal" role="dialog" aria-labelledby="issueBookModal"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Issue Book</h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="bookIssueForm">
                    @csrf
                    <div class="form-group">
                        <label for="bookTitle" class="form-label">Book Title</label>
                        <select name="book_id" id="bookTitle" class="form-select select2js" required>
                            <option value="" selected disabled>Select Book</option>
                            {{-- Getting Select2 options using ajax, --- See script.js and books.js  --}}
                        </select>
                    </div>
            </div>
       
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="IsuseBookSaveBtn">Issue Book</button>
        </div>
        </form>
    </div>
</div>
</div>

{{-- Student Details Modal  --}}
<div class="modal fade" id="studentDetailsModal" role="dialog" aria-labelledby="studentDetailsModal"  aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUserModalLabel">Student Details</h5>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               <table class="table table-striped table-hover table-border">
                <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Class</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    <tr>
                        <td>Abbas</td>
                        <td>abbas@gmail.com</td>
                        <td>2nd</td>
                        <td>Active</td>
                    </tr>
                </tbody>
               </table>
            </div>
    </div>
</div>
</div>
