@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="ti-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/cheques">Cheques</a></li>
                <li class="breadcrumb-item active">Add Cheques</li>
            </ol>
        </div>
    </div>
    @include('includes.messages')
    <div class="card px-5">
        <form action="/admin/cheques/{{ $cheque->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="input-group col-md-6 pl-5 mx-auto mt-5 mb-2 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Cheque Number</span>
                    </div>
                    <input id="cheque_number" type="text"
                        class="form-control @error('cheque_number') is-invalid @enderror" name="cheque_number"
                        value="{{ $cheque->cheque_number }}" required autocomplete="cheque_number" autofocus>

                    @error('cheque_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group col-md-6 pr-5 mx-auto mt-5 mb-2 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Employee Name</span>
                    </div>
                    <select class="form-control @error('employee_id') is-invalid @enderror" required
                        autocomplete="employee_id" autofocus name="employee_id">
                        <option value="">Default Select</option>
                        @foreach ($employee_names as $employee_name)
                            <option value="{{ $employee_name->id }}"
                                {{ $cheque->employee_name_id == $employee_name->id ? 'selected' : '' }}>
                                {{ $employee_name->employee_name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                        data-target="#employeeModal">+</button>


                    @error('employee_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mt-3">
                <div class="input-group col-md-6 pl-5 mx-auto mb-3 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Transaction Date</span>
                    </div>
                    <input id="transaction_date" type="date"
                        class="form-control @error('transaction_date') is-invalid @enderror" name="transaction_date"
                        value="{{ $cheque->datetime }}" required autocomplete="transaction_date" autofocus>

                    @error('transaction_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group col-md-6 pr-5 mx-auto mb-3 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Amount</span>
                    </div>
                    <input id="amount" type="number" class="form-control @error('amount') is-invalid @enderror"
                        name="amount" value="{{ $cheque->amount }}" required autocomplete="amount" autofocus>

                    @error('amount')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="card-footer text-right mx-3 mb-3">
                <button class="btn btn-primary"><i class="ti-new-window"></i> Save</button>
                <a href="/admin/cheques" class="btn btn-secondary"><i class="ti-close"></i> Cancel</a>
            </div>

        </form>
    </div>

    <div class="modal fade" id="employeeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Employee Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                {!! Form::open([
                    'action' => 'AdminEmployeeNameController@store',
                    'method' => 'POST',
                    'class' => 'row g-3 d-block  needs-validation',
                    'novalidate',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="input-group col px-5 mx-auto mb-2 offset-md-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Employee Name</span>
                            </div>
                            <input id="employee_name" type="text"
                                class="form-control @error('employee_name') is-invalid @enderror" name="employee_name"
                                value="{{ old('employee_name') }}" required autocomplete="employee_name" autofocus>

                            @error('employee_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="route_name" value="/admin/cheques/create">
                    <div class="form-group row">
                        <div class="input-group col px-5 mx-auto mb-2 offset-md-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Position</span>
                            </div>
                            <input id="position" type="text"
                                class="form-control @error('position') is-invalid @enderror" name="position"
                                value="{{ old('position') }}" required autocomplete="position" autofocus>

                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-primary">Add</button>
                </div>
            </div>
        </div>


        {!! Form::close() !!}

    </div>
    </div>
    </div>
@endsection
