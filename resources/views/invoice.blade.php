<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <div class="header">
        <h1>{{ __('messages.orders') }}</h1>
        <p>Order #{{ $order->id }}</p>
    </div>
    <h1>{{ __('messages.orders') }}</h1>
    <table>
        <thead>
            <tr>
                <th>{{ __('messages.order_id') }}</th>
                <th>{{ __('messages.customer_name') }}</th>
                <th>{{ __('messages.order_status') }}</th>
                <th>{{ __('messages.order_total') }}</th>
                <th>{{ __('messages.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->total }}</td>
                    <td>
                        <a href="/invoice/{{ $order->id }}?lang={{ app()->getLocale() }}">
                            {{ __('messages.generate_invoice') }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
