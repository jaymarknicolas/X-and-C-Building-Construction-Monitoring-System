@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="ti-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/purchases">Purchase</a></li>
                <li class="breadcrumb-item active">Add Purchase</li>
            </ol>
        </div>
    </div>
    @include('includes.messages')
    <div class="card px-5">
        {!! Form::open([
            'action' => 'AdminPurchaseController@store',
            'method' => 'POST',
            'class' => 'row g-3 d-block  needs-validation',
            'novalidate',
            'enctype' => 'multipart/form-data',
        ]) !!}
        <div class="form-group row">
            <div class="input-group col-md-12 px-5 mx-auto mt-5 mb-2 offset-md-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">OR Number</span>
                </div>
                <input id="or_number" type="text" class="form-control @error('or_number') is-invalid @enderror"
                    name="or_number" value="{{ old('or_number') }}" required autocomplete="or_number" autofocus>

                @error('or_number')
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
                    value="{{ old('transaction_date') }}" required autocomplete="transaction_date" autofocus>

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
                    name="amount" value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                @error('amount')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="input-group col-md-6 pl-5 mx-auto mb-3 offset-md-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Cheque Number</span>
                </div>
                <input id="cheque_number" type="text" class="form-control @error('cheque_number') is-invalid @enderror"
                    name="cheque_number" value="{{ old('cheque_number') }}" required autocomplete="cheque_number" autofocus>

                @error('cheque_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- <select class="form-control" >
              <option>Default Select</option>
              @foreach ($cheques as $cheque)
                <option value="{{$cheque->id}}">{{$cheque->cheque_number}}</option>
              @endforeach
          </select> --}}
            </div>
            <div class="input-group col-md-6 pr-5 mx-auto mb-3 offset-md-3">
                <div class="input-group-prepend">
                    <span class="input-group-text">Project Name</span>
                </div>
                <select class="form-control @error('project_id') is-invalid @enderror" autocomplete="project_id" autofocus
                    name="project_id" value="{{ old('project_id') }}">
                    <option value="">Default Select</option>
                    @foreach ($projects as $project)
                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                            {{ $project->project_name }}</option>
                    @endforeach

                    @error('project_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-12 px-5 mx-auto col-form-label">Description</label>
            <div class="col-md-12 px-5 mx-auto">
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" required
                    autocomplete="description" autofocus rows="5" placeholder="...">{{ old('description') }}</textarea>

                @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="card-footer text-right mx-3 mb-3">
            <button class="btn btn-primary" type="submit"><i class="ti-new-window"></i> Submit</button>
            <a href="/admin/purchases" class="btn btn-secondary"><i class="ti-close"></i> Cancel</a>
        </div>

        {!! Form::close() !!}
    </div>
@endsection
