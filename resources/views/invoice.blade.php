<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة</title>
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            margin: 0;
        }

        .invoice-header {
            background-color: #ffd700;
            color: #0046ad;
            padding: 5px;
        }

        .invoice-table th,
        .invoice-table td {
            text-align: start;
        }

        body {
            font-family: 'Arial', sans-serif;
            direction: rtl;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            /* border: 1px solid #ddd; */
            padding: 8px;
        }

        p {
            font-size: 12px !important;
            margin: 0 !important;
            padding: 0 !important;
        }
    </style>
</head>

<body>
    <div style="width: 100%;">
        <div>
            <div class="invoice-header" style="text-align: start; float: right; width: 65%; margin: 0;">

                <h2 style="font-size: 60px; margin: 0;">فاتورة</h2>
            </div>

            <div
                style="text-align: end; float: left; width: 20%; vertical-align: center; padding-top: 22px; margin-left: 25px">
                <p style="text-align: end; padding: 0; margin: 0; font-size: 12px">
                    {{ $order->user->email }}</p>
                <p style="text-align: end; padding: 0; margin: 0; font-size: 12px">{{ $order->user->address }}</p>
                <p style="text-align: end; padding: 0; margin: 0; font-size: 12px">{{ $order->user->email }}</p>
            </div>
        </div>
        <div style="margin-left: 60px; margin-right: 60px">

            <div style="margin-bottom: 20px; margin-top: 20px">
                <p style="padding: 0; margin: 0; font-size: 12px">{{ $order->user->email }}</p>
                <p style="padding: 0; margin: 0; font-size: 12px">{{ $order->user->address }}</p>
            </div>
            <div class="row mb-4">
                <div class="col-md-6 text-end">
                    <h4 style="color: #ffd700">فاتورة #{{ $order->id }}</h4>
                </div>
            </div>
            <table class="table table-striped invoice-table">
                <thead class="table-primary">
                    <tr style="border-bottom: 1px solid #0046ad">
                        <th style="border-bottom: 1px solid #0046ad">الوصف</th>
                        <th style="border-bottom: 1px solid #0046ad" colspan="2">الكمية</th>
                        <th style="border-bottom: 1px solid #0046ad" colspan="2">السعر</th>
                        <th style="border-bottom: 1px solid #0046ad; width: 35%" colspan="2">الإجمالي</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->products as $i => $item)
                        <tr @if ($i == count($order->products) - 1) style="border-bottom: 1px solid #0046ad" @endif
                            style="text-align: end">
                            <td @if ($i == count($order->products) - 1) style="border-bottom: 1px solid #0046ad" @endif
                                style="text-align: end">
                                {{ $item->description }}</td>
                            <td @if ($i == count($order->products) - 1) style="border-bottom: 1px solid #0046ad" @endif
                                style="text-align: end"></td>
                            <td @if ($i == count($order->products) - 1) style="border-bottom: 1px solid #0046ad" @endif
                                style="text-align: end">
                                {{ $item->pivot->quantity }}</td>
                            <td @if ($i == count($order->products) - 1) style="border-bottom: 1px solid #0046ad" @endif
                                style="text-align: end"></td>
                            <td @if ($i == count($order->products) - 1) style="border-bottom: 1px solid #0046ad" @endif
                                style="text-align: end">
                                {{ $item->price }} ر.س</td>
                            <td @if ($i == count($order->products) - 1) style="border-bottom: 1px solid #0046ad" @endif
                                style="text-align: end"></td>
                            <td @if ($i == count($order->products) - 1) style="border-bottom: 1px solid #0046ad" @endif
                                style="text-align: end">
                                {{ $item->pivot->quantity * $item->price }} ر.س</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <p style="font-size: 15px; float: right">الإجمالي</p>
                            <div style="font-size: 15px; float: right">الضريبة</div>
                            <p style="height: 5px; color: white">/</p>
                            <h4 style="margin-top: 10px"><strong>القيمة</strong></h4>
                        </td>
                        <td>
                            <div>
                                <p style="font-size: 15px; float: left">{{ $order->total }} ر.س
                                </p>
                            </div>
                            <div>
                                <div style="font-size: 15px; float: right"> 4.8%</div>
                            </div>
                            <p style="height: 5px; color: white">/</p>
                            <h4 style="margin-top: 10px"><strong>
                                    {{ number_format($order->total + 0.048 * $order->total, 2) }} ر.س</strong>
                            </h4>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div style="width: 100%; margin-top: 20px">
            <div style="float: right; width: 53%; margin-right: 60px;">
                <h4 style="color: #0046ad">معلومات الدفع</h4>
                <p style="font-size: 12px; padding: 0; margin: 0">الاسم: {{ $order->user->name }}</p>
                @php
                    $accountNumber = rand(10000000000000, 99999999999999);
                @endphp
                <p style="font-size: 12px; padding: 0; margin: 0">رقم الحساب: {{ $accountNumber }}</p>
            </div>
            <div style="float: left; width: 38%; background-color: #ffd700; color: #ffd700; height: 105px">
                /
            </div>
        </div>
    </div>
</body>

</html>
