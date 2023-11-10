@extends('layouts.app');

@section('pageTitle')
Settings
@endsection

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                       Settings
                    </div>
                </div>
                <div class="card-body">
                   <form action="" method="POST" id="updateSettingsForm">
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
                            <label for="findays" class="form-lable">Fine Days: </label>
                            <input type="number" name="finedays" id="finedays"  class="form-control" value="{{old('finedays')}}">
                        </div>
                        <div class="col-md-6">
                            <label for="fineamount" class="form-label">Fine Amount: </label>
                            <input type="number" name="fineamount" id="fineamount" class="form-control" value="{{old('fineamount')}}">
                        </div>
                    </div>

                    <div class="mt-5">
                       <button class="btn btn-primary" id="updateSettingsBtn">Save Settings</button>
                    </div>
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection