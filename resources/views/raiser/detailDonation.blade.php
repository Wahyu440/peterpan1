<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Rekap Data</title>


    <style>
    html,
    body {
        margin: 10px;
        padding: 10px;
        font-family: sans-serif;
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    span,
    label {
        font-family: sans-serif;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0px !important;
    }

    table thead th {
        height: 28px;
        text-align: left;
        font-size: 16px;
        font-family: sans-serif;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 14px;
    }

    .heading {
        font-size: 24px;
        margin-top: 12px;
        margin-bottom: 12px;
        font-family: sans-serif;
    }

    .small-heading {
        font-size: 18px;
        font-family: sans-serif;
    }

    .total-heading {
        font-size: 18px;
        font-weight: 700;
        font-family: sans-serif;
    }

    .order-details tbody tr td:nth-child(1) {
        width: 20%;
    }

    .order-details tbody tr td:nth-child(3) {
        width: 20%;
    }

    .text-start {
        text-align: left;
    }

    .text-end {
        text-align: right;
    }

    .text-center {
        text-align: center;
    }

    .company-data span {
        margin-bottom: 4px;
        display: inline-block;
        font-family: sans-serif;
        font-size: 14px;
        font-weight: 400;
    }

    .no-border {
        border: 1px solid #fff !important;
    }

    .bg-blue {
        background-color: #414ab1;
        color: #fff;
    }

    .button {
        background-color: #1c87c9;
        border-radius: 25px;
        color: white;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 15px;
        margin: 4px 2px;
        cursor: pointer;
    }
    </style>
</head>

<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">{{$activity->name}}</h2>
                </th>
                <th width="50%" class="text-end company-data">
                    <span>Activity ID: {{$activity->id}}</span> <br>
                    <span>Date: <?php echo strftime('%e %B %Y', strtotime(date('Y-m-d'))); ?></span> <br>
                    <span>Address: {{$activity->address}}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th>Donor</th>
                <th>Paid at</th>
                <th>Donation</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payment as $item)
            <tr>
                <td>
                    {{$item->donor_username}}
                </td>
                <td>
                    {{$item->updated_at}}
                </td>
                <td>
                    Rp{{ number_format($item->total_donation, 0, ',', '.') }}
                </td>
            </tr>
            @endforeach
            <tr class="bg-blue">
                <th colspan="2">Total Donation</th>
                <th>Rp{{ number_format($activity->realization, 0, ',', '.') }}</th>
            </tr>
        </tbody>
    </table>
</body>

</html>