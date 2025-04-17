<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Disbursement Cheque Summary</title>
    {{-- <link rel="stylesheet" href="{{asset('invoice/style.css')}}" media="all" /> --}}
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        a {
            color: #5D6975;
            text-decoration: underline;
        }

        body {
            position: relative;
            height: 29.7cm;
            margin: 0 auto;
            color: #001028;
            background: #FFFFFF;
            font-family: Arial, sans-serif;
            font-size: 12px;
            font-family: Arial;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
            border-bottom: 2px solid black;
        }

        #logo {
            text-align: center;
            margin-bottom: 10px;
        }

        #logo img {
            width: 90px;
        }

        h1 {
            border-top: 1px solid #5D6975;
            border-bottom: 1px solid #5D6975;
            color: #5D6975;
            font-size: 2.4em;
            line-height: 1.4em;
            font-weight: normal;
            margin: 0 0 20px 0;
            font-weight: bold;
            background: url(dimension.png);
        }

        #project {
            float: left;
            font-weight: bold;
        }

        #project span {
            color: #5D6975;
            text-align: left;
            width: 52px;
            margin-right: 4rem;
            display: inline-block;
            font-size: 0.8em;
            font-weight: bold;
        }

        #company {
            float: right;
            margin-right: 1rem;
            text-align: left;
        }

        #company span {
            color: #5D6975;
            text-align: left;
            width: 52px;
            margin-right: 2rem;
            display: inline-block;
            font-size: 0.8em;
            font-weight: bold;
        }

        #company div {
            text-align: left;
        }

        #project div,
        #company div {
            white-space: nowrap;


        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #F5F5F5;
        }

        table th,
        table td {
            text-align: left;
        }

        table th {
            padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;
            font-weight: bold;
            color: black;
        }

        table .service,
        table .desc {
            text-align: left;
        }

        table td {
            padding: 5px;
            text-align: left;
        }

        table td.service,
        table td.desc {
            vertical-align: top;
        }

        table td.unit,
        table td.qty,
        table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 1px solid #5D6975;
            ;
        }

        #notices .notice {
            color: #5D6975;
            font-size: 1.2em;
        }

        footer {
            color: #5D6975;
            width: 100%;
            height: 30px;
            position: relative;
            bottom: 0;
            border-top: 1px solid #C1CED9;
            padding: 8px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <header class="clearfix" style="margin-bottom: 1rem;">
        <div id="logo">
            {{-- <img src="{{asset('invoice/logo.png')}}"> --}}
        </div>
        <h1 style="background-color: #cbe3fa; padding-left: 1rem; padding-right: 1rem;">X and C Building Construction

            <span
                style="font-size: 12px;
        float: right;
        line-height: 1rem;
        width: 6rem;
        margin-top: 0.3rem;
        text-align: right;
        margin-right: 1rem;
        font-weight: 600;">{{ $timeToday }}</span>
        </h1>
        <h2 style="color: #2c2e30;
      text-align: center;
      text-transform:uppercase;
      ">Disbursement Cheque
            Summary</h2>

    </header>
    <h3 style="margin:0; 
        text-align: center;
    ">
        ({{ count($chequeStart) > 0 ? date('F d, Y', strtotime($chequeStart[0]->datetime)) : 'Nan' }} -
        {{ !is_null($chequeEnd) > 0 ? date('F d, Y', strtotime($chequeEnd->datetime)) : 'Nan' }})</h3>
    <main>
        <h3 style="border-top: 2px solid #000; padding-top: 0.5rem;"></h3>
        <table style="width: 100%;  border-bottom: 2px solid; ">
            <thead>
                <tr style="font-weight: bold;">
                    <th>Date</th>
                    <th>Cheque #</th>
                    <th>Issued By</th>
                    <th>Amount</th>
                    <th>Specifications</th>
                </tr>
            </thead>
            <tbody>
                @if (count($purchases) > 0)
                    @foreach ($purchases as $purchase)
                        <tr>
                            <td>{{ date('F d, Y', strtotime($purchase->cheque->datetime)) }}</td>
                            <td>{{ $purchase->cheque->cheque_number }}</td>
                            <td>{{ $purchase->cheque->employee_name->employee_name }}</td>
                            <td style="text-align: right;">PHP {{ number_format($purchase->cheque->amount) }}</td>
                            <td>{{ $purchase->description }}</td>
                        </tr>
                    @endforeach
                    <tr>

                        <td colspan="4" style="text-align: right; text-transform:uppercase; font-weight: bolder;">
                            total: </td>
                        <td style="font-weight: bolder; text-align: right;">PHP: {{ number_format($totalAmount) }} </td>
                    </tr>
                @endif
            </tbody>
        </table>
        <hr style="border: 2px solid #000;">
        </div>
    </main>
    <div style="display: flex; margin-bottom: 2rem;">
        <table>
            <tr>
                <td>Prepared by:</td>
                <td>
                    Validated by:
                </td>
            </tr>
            <tr>
                <td>
                    <div style="width: 50%; margin: auto;">
                        <p
                            style="border-bottom: 2px solid #000;
              text-align: center;
              margin: 0;
              font-size: 15px;
              font-weight: bolder;">
                        </p>
                        <p style="text-align: center; margin: 0;">Project Manager</p>
                    </div>
                </td>
                <td>
                    <div style="width: 50%; margin: auto;">
                        <p
                            style="border-bottom: 2px solid #000;
              text-align: center;
              margin: 0;
              font-size: 15px;
              font-weight: bolder;">
                        </p>
                        <p style="text-align: center; margin: 0;">Project Supervisor</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <footer>
        Page 1 of 1
    </footer>
</body>

</html>
