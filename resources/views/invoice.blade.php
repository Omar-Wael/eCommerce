<!-- resources/views/invoice.blade.php -->
<!-- <!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>فاتورة</title>
    <style>
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
        border: 1px solid #ddd;
        padding: 8px;
    }
    </style>
</head>

<body>
    <h1>فاتورة</h1>
    <p>اسم العميل: {{ $order->user->name }}</p>
    <p>التاريخ: {{ now()->format('d-m-Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>اسم المنتج</th>
                <th>الكمية</th>
                <th>السعر</th>
                <th>الإجمالي</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->products as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->pivot->quantity }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->pivot->quantity * $item->price }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>الإجمالي الكلي: {{ $order->total }}</strong></p>
</body>

</html> -->
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>فاتورة</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Tajawal', sans-serif;
    }

    .invoice-header {
        background-color: #ffd700;
        color: #0046ad;
        padding: 10px 20px;
    }

    .invoice-table th,
    .invoice-table td {
        text-align: center;
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
        border: 1px solid #ddd;
        padding: 8px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="invoice-header text-center mb-4">
            <h2>فاتورة</h2>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <h6>{{ $order->user->name }}</h6>
                <p>9603 الحي الثاني</p>
                <p>مركز اللواء، الرياض</p>
            </div>
            <div class="col-md-6 text-end">
                <h6>فاتورة #{{ $order->id }}</h6>
                <p>تاريخ: الإثنين، 22 نوفمبر 2024</p>
            </div>
        </div>
        <table class="table table-striped invoice-table">
            <thead class="table-primary">
                <tr>
                    <th>الوصف</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>الإجمالي</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $item)
                <tr>
                    <td>{{ $item->description }}</td>
                    <td>{{ $item->pivot->quantity }}</td>
                    <td>{{ $item->price }} ر.س</td>
                    <td>{{ $item->pivot->quantity * $item->price }} ر.س</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-end">
            <p><strong>الإجمالي: {{ $order->total }} ر.س</strong></p>
            <p>الضريبة (4.8%): {{ number_format((0.048 * $order->total), 2) }} ر.س</p>
            <h4><strong>القيمة: {{ number_format(($order->total + (0.048 * $order->total)), 2) }} ر.س</strong></h4>
        </div>
    </div>
</body>

</html>