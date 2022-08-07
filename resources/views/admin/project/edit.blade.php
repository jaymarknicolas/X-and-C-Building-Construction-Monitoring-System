@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard"><i class="ti-home"></i> Dashboard</a></li>
                <li class="breadcrumb-item"><a href="/projects">Projects</a></li>
                <li class="breadcrumb-item active">Add Project</li>
            </ol>
        </div>
    </div>
    <div class="card px-5">
        <form action="/admin/projects/{{ $project->id }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <div class="input-group col-md-6 pl-5 mx-0 mt-5 mb-2 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Project Number</span>
                    </div>
                    <input id="project_number" type="text"
                        class="form-control @error('project_number') is-invalid @enderror" name="project_number"
                        value="{{ $project->project_number }}" required autocomplete="project_number" autofocus>

                    @error('project_number')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group col-md-6 pr-5 mx-0 mt-5 mb-2 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Project Name</span>
                    </div>
                    <input id="project_name" type="text" class="form-control @error('project_name') is-invalid @enderror"
                        name="project_name" value="{{ $project->project_name }}" required autocomplete="project_name"
                        autofocus>

                    @error('project_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="user_id" value="{{ Auth()->user()->user_type }}">
            <div class="form-group row">

                <div class="input-group col-md-6 pl-5 mx-auto mb-3 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Location</span>
                    </div>
                    <input id="location" type="text" class="form-control @error('location') is-invalid @enderror"
                        name="location" value="{{ $project->location }}" required autocomplete="location" autofocus>

                    @error('location')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group col-md-6 pr-5 mx-auto mb-3 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Client Name</span>
                    </div>
                    <select class="form-control mr-3" name="client_id" value="{{ old('client_id') }}">
                        <option value="">Default Select</option>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}" {{ $project->client_id == $client->id ? 'selected' : '' }}>
                                {{ $client->client_name }}</option>
                        @endforeach
                    </select>
                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#clientModal"><i
                            class="ti-plus"></i></button>
                </div>
            </div>

            <div class="form-group row mb-3">
                <div class="col-md-12 px-5 ">
                    <div class="input-group daterange">
                        <div class="input-group-append">
                            <span class="input-group-text">Project Start</span>
                        </div>
                        <input id="project_start" type="date"
                            class="form-control @error('project_start') is-invalid @enderror" name="project_start"
                            value="{{ $project->project_start }}" required autocomplete="project_start" autofocus>


                        <div class="input-group-append">
                            <span class="input-group-text">Duration</span>
                        </div>
                        <input id="duration" type="text" class="form-control @error('duration') is-invalid @enderror"
                            name="duration" value="{{ $project->duration }}" required autocomplete="duration" autofocus>

                    </div>
                </div>
            </div>

            <div class="form-group row mt-3 mb-0 pl-2">


                <div class="input-group col-md-6 pl-4 mx-auto mb-1 offset-md-3">

                    <div class="col-md-12">
                        <div class="input-group date">
                            <div class="input-group-append">
                                <span class="input-group-text">Project's Awarding Date</span>
                            </div>
                            <input id="project_name" type="date"
                                class="form-control @error('project_awarding') is-invalid @enderror" name="project_awarding"
                                value="{{ $project->project_awarding }}" required autocomplete="project_awarding"
                                autofocus>

                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="ti-calendar"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="input-group col-md-6 mx-auto mb-1 offset-md-3">
                    <div class="col-md-12 pl-0">
                        <div class="input-group date">
                            <div class="input-group col-md-12 m-0 pl-0 mb-3 offset-md-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Budget</span>
                                </div>
                                <input id="project_budget" type="number"
                                    class="form-control @error('project_budget') is-invalid @enderror"
                                    name="project_budget" value="{{ $project->project_budget }}" required
                                    autocomplete="project_budget" autofocus>

                                <div class="input-group-append">
                                    <span class="input-group-text bg-carolina text-white">₱</span>
                                    <span class="input-group-text">0.00</span>
                                </div>

                                @error('project_budget')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="input-group col-md-6 m-0 pl-5 mb-3 offset-md-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Status</span>
                    </div>
                    <select class="form-control" name="status">
                        <option>Default Select</option>
                        <option value="2" {{ $project->status == 2 ? 'selected' : '' }}>Complete</option>
                        <option value="1"{{ $project->status == 1 ? 'selected' : '' }}>On Going</option>
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-md-12 px-5 mx-auto">
                    <textarea name="description" class="form-control" rows="5" placeholder="Description">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="card-footer text-right mx-3 mb-3">
                <button class="btn btn-primary"><i class="ti-new-window"></i> Submit</button>
                <a href="/admin/projects" class="btn btn-secondary"><i class="ti-close"></i> Cancel</a>
            </div>


        </form>
    </div>



    <div class="modal fade {{ session('error') ? 'show' : '' }}" id="clientModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Add New Client</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                {!! Form::open([
                    'action' => 'AdminClientController@store',
                    'method' => 'POST',
                    'class' => 'row g-3 d-block  needs-validation',
                    'novalidate',
                    'enctype' => 'multipart/form-data',
                ]) !!}
                <div class="modal-body">
                    <div class="form-group row">
                        <div class="input-group col px-5 mx-auto mb-2 offset-md-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Client Name</span>
                            </div>
                            <input id="client_name" type="text"
                                class="form-control @error('client_name') is-invalid @enderror" name="client_name"
                                value="{{ old('client_name') }}" required autocomplete="client_name" autofocus>

                            @error('client_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="input-group col px-5 mx-auto mb-2 offset-md-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Company Name</span>
                            </div>
                            <input id="company_name" type="text"
                                class="form-control @error('company_name') is-invalid @enderror" name="company_name"
                                value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                            @error('company_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group col px-5 mx-auto mb-2 offset-md-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Owner Name</span>
                            </div>
                            <input id="owner_name" type="text"
                                class="form-control @error('owner_name') is-invalid @enderror" name="owner_name"
                                value="{{ old('owner_name') }}" required autocomplete="owner_name" autofocus>

                            @error('owner_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <input type="hidden" name="redirect" value="/admin/projects/create">
                    <div class="form-group row">
                        <div class="input-group col px-5 mx-auto mb-2 offset-md-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Contact Details</span>
                            </div>
                            <input id="contact_details" type="number"
                                class="form-control @error('contact_details') is-invalid @enderror"
                                name="contact_details" value="{{ old('contact_details') }}" required
                                autocomplete="contact_details" autofocus>

                            @error('contact_details')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-primary">Save changes</button>
                    </div>
                </div>
            </div>


            {!! Form::close() !!}

        </div>
    </div>
    </div>
@endsection
