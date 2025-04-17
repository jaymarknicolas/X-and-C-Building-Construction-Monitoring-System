@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/transaction_recorder/dashboard"><i class="ti-home"></i> Dashboard</a>
                </li>
                <li class="breadcrumb-item"><a href="/transaction_recorder/purchases">Purchase</a></li>
                <li class="breadcrumb-item active">Purchase Lists</li>
            </ol>
        </div>
    </div>
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <div class="caption uppercase">
                    <i class="ti-briefcase"></i> Purchase's Table
                </div>
                <div class="tools">
                    <a href="/transaction_recorder/purchases/create" class="btn btn-sm btn-primary"><i class="ti-plus"></i>
                        Add New
                        Purchase</a>
                </div>
            </div>
            @if (count($purchases) > 0)
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="dt-addrows_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">

                            <table class="table table-bordered table-hover dataTable no-footer" id="dt-addrows"
                                aria-describedby="dt-addrows_info">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="sorting text-uppercase d-none" tabindex="0" aria-controls="dt-addrows"
                                            rowspan="1" colspan="1"
                                            aria-label="Column 2: activate to sort column ascending"
                                            style="width: 150.609px;">id</th>
                                        <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                            rowspan="1" colspan="1"
                                            aria-label="Column 2: activate to sort column ascending"
                                            style="width: 150.609px;">or #</th>
                                        <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                            rowspan="1" colspan="1"
                                            aria-label="Column 3: activate to sort column ascending"
                                            style="width: 150.609px;">transaction date</th>
                                        <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                            rowspan="1" colspan="1"
                                            aria-label="Column 3: activate to sort column ascending"
                                            style="width: 150.609px;">cheque number</th>
                                        <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                            rowspan="1" colspan="1"
                                            aria-label="Column 3: activate to sort column ascending"
                                            style="width: 150.609px;">project name</th>
                                        <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                            rowspan="1" colspan="1"
                                            aria-label="Column 3: activate to sort column ascending"
                                            style="width: 150.609px;">amount</th>
                                        <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                            rowspan="1" colspan="1"
                                            aria-label="Column 3: activate to sort column ascending"
                                            style="width: 150.609px;">description</th>
                                        <th class="sorting text-uppercase" tabindex="0" aria-controls="dt-addrows"
                                            rowspan="1" colspan="1"
                                            aria-label="Column 4: activate to sort column ascending"
                                            style="width: 150.609px;">actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        <tr>
                                            <td class="d-none">{{ $purchase->id }}</td>
                                            <td>{{ $purchase->or_Number }}</td>
                                            <td>{{ date('F d, Y', strtotime($purchase->transaction_date)) }}</td>
                                            <td>{{ $purchase->cheque->cheque_number }}</td>
                                            <td>{{ $purchase->project->project_name }}</td>
                                            <td class="text-right">₱ {{ number_format($purchase->amount) }}</td>
                                            <td>{{ $purchase->description }}</td>
                                            <td class="">
                                                {{-- <a href="/transaction_recorder/purchases/{{$purchase->id}}" class="btn btn-primary"><i class="fa fa-vcard-o"></i></a> --}}
                                                <a href="/transaction_recorder/purchases/{{ $purchase->id }}/edit"
                                                    class="btn btn-success"><i class="fa fa-pencil-square fs-5"></i>
                                                    Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
            @endif
        </div>
    </div>
    </div>
    </div>
@endsection
