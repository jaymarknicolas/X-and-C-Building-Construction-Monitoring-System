@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="ti-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/admin/projects">Projects</a></li>
                <li class="breadcrumb-item active">Show Project</li>
            </ol>
        </div>
    </div>
    <div class="card card-tabs mb-3">
        <div class="card-header">
            <ul class="nav nav-tabs card-header-tabs">
                <li class="nav-item">
                    <a href="#tab1" data-toggle="tab" class="nav-link active">Project Information</a>
                </li>
                <li class="nav-item">
                    <a href="#tab2" data-toggle="tab" class="nav-link">Add Project Fund</a>
                </li>
            </ul>
            <div>
                <a href="/admin/projects" class="btn btn-outline-dark float-right justify-content-end text-dark"><i
                        class="fa fa-reply-all"></i> Back</a>
                <a href="/admin/project-report/{{ $project->id }}"
                    class="btn btn-danger mr-5 float-right justify-content-end text-light"><i class="fa fa-file-pdf-o"></i>
                    PRINT</a>

            </div>



        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane fade show active" id="tab1">
                    <h4 class="card-title fs-3 fw-bold">{{ $project->project_name }}</h4>
                    <p class="card-text fs-5">
                        Location: {{ $project->location }}
                    </p>
                    <p class="card-text fs-5">
                        Client Name: {{ $project->client->client_name }}
                    </p>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body p-0">
                                <table class="table border-0">
                                    <tbody>
                                        <tr>
                                            <td>
                                                <h5 class="card-title fs-5 fw-bold"> Project Number:</h5>
                                            </td>
                                            <td>
                                                <h5 class="fs-5">{{ $project->project_number }}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="fs-5"><span class="fw-bold">Project Start:</p>
                                            </td>
                                            <td>
                                                <p class="fs-5">{{ date('F d, Y', strtotime($project->project_start)) }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="fs-5"><span class="fw-bold">Duration:</p>
                                            </td>
                                            <td>
                                                <p class="fs-5">{{ $project->duration }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <h5 class="card-title fs-5 fw-bold">Budget </h5>
                                            </td>
                                            <td>
                                                <h5 class="card-title fs-5 fw-bold">₱
                                                    {{ number_format($project->project_budget) }}</h5>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p class="card-text"><span class="fw-bold fs-5">Description: </span>
                                                </p>
                                            </td>
                                            <td>
                                                <p class="card-text fs-5">
                                                    {{ $project->description }}
                                                </p>
                                            </td>
                                        </tr>
                                    </tbody>




                                    {{-- <p class="card-link text-light fs-5">Awarding At {{ date('F d, Y', strtotime( $project->project_awarding))}}</p> --}}

                                </table>
                            </div>
                        </div>
                        <div class="ml-3 my-3">
                            <h1 class="fs-3">Recieved Funds</h1>
                            <p class="fs-4">Total Funds Recieved: ₱ {{ number_format($totalFunds) }}</p>
                        </div>
                        <div class="table-responsive mx-3">
                            <div id="dt-addrows_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <table class="table table-bordered table-hover dataTable no-footer" id="dt-addrows"
                                    aria-describedby="dt-addrows_info">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="sorting d-none" tabindex="0" aria-controls="dt-addrows"
                                                rowspan="1" colspan="1"
                                                aria-label="Column 1: activate to sort column ascending"
                                                style="width: 150.609px;">created at</th>
                                            <th class="sorting  text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                                rowspan="1" colspan="1"
                                                aria-label="Column 1: activate to sort column ascending"
                                                style="width: 150.609px;">employee name</th>
                                            <th class="sorting  text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                                rowspan="1" colspan="1"
                                                aria-label="Column 2: activate to sort column ascending"
                                                style="width: 150.609px;">amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($funds as $fund)
                                            <tr>
                                                <td class="d-none">{{ $fund->employee_name->created_at }}</td>
                                                <td>{{ $fund->employee_name->employee_name }}</td>
                                                <td>₱ {{ number_format($fund->amount) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <h1 class="text-light">Total Funds: PHP </h1> --}}
                            </div>
                        </div>
                        <div class="ml-3 my-3 mt-5">
                            <h1 class="fs-3">Purchases</h1>
                            <p class="fs-4">Total Purchases: ₱ {{ number_format($totalExpenses) }}</p>
                        </div>
                        <div class="table-responsive mx-3">
                            <div id="dt-addrows_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                                <table class="table table-bordered table-hover dataTable no-footer" id="dt-addrows"
                                    aria-describedby="dt-addrows_info">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                                rowspan="1" colspan="1"
                                                aria-label="Column 1: activate to sort column ascending"
                                                style="width: 150.609px;">transaction date</th>
                                            <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                                rowspan="1" colspan="1"
                                                aria-label="Column 1: activate to sort column ascending"
                                                style="width: 150.609px;">OR #</th>
                                            <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                                rowspan="1" colspan="1"
                                                aria-label="Column 1: activate to sort column ascending"
                                                style="width: 150.609px;">specification</th>
                                            <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                                rowspan="1" colspan="1"
                                                aria-label="Column 2: activate to sort column ascending"
                                                style="width: 150.609px;">amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchases as $purchase)
                                            <tr>
                                                <td>{{ date('F d, Y', strtotime($purchase->transaction_date)) }}</td>
                                                <td>{{ $purchase->or_Number }}</td>
                                                <td>{{ $purchase->description }}</td>
                                                <td class=""> ₱ {{ number_format($purchase->amount) }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{-- <h1 class="text-light">Total Funds: PHP </h1> --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab2">
                    <h4 class="card-title">Add Project's Funds</h4>
                    <div class="card-body">
                        {!! Form::open([
                            'action' => 'AdminFundController@store',
                            'method' => 'POST',
                            'class' => 'row g-3 d-block  needs-validation  w-50 mx-auto',
                            'novalidate',
                            'enctype' => 'multipart/form-data',
                        ]) !!}
                        <div class="modal-body">
                            <div class="form-group row">
                                <div class="input-group col px-5 mx-auto mb-2 offset-md-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Amount</span>
                                    </div>
                                    <input id="amount" type="number"
                                        class="form-control @error('amount') is-invalid @enderror" name="amount"
                                        value="{{ old('amount') }}" required autocomplete="amount" autofocus>

                                    @error('amount')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="route_name" value="/admin/projects/{{ $project->id }}">
                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <div class="form-group row">
                                <div class="input-group col-md-12 px-5 mx-auto mb-2 offset-md-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Employee Name</span>
                                    </div>
                                    <select class="form-control mr-3" name="employee_id">
                                        <option value="">Default Select</option>
                                        @foreach ($employee_names as $employee_name)
                                            <option value="{{ $employee_name->id }}">{{ $employee_name->employee_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn btn-secondary" data-toggle="modal"
                                        data-target="#employeeModal">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-outline-primary">Add</button>
                        </div>
                    </div>
                </div>


                {!! Form::close() !!}
            </div>
        </div>
    </div>
    </div>


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
                    <input type="hidden" name="route_name" value="/admin/projects/{{ $project->id }}">
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
