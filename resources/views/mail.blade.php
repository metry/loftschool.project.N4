<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>New Order!</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 36px;
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">На ваш сайт поступил заказ!</div>
        <div>Заказ № {{ $order->id }}</div>
        <div>Заказал пользователь: ID{{ $order->user->id }}, {{ $order->user->name }}, {{ $order->user->email }}</div>
        <div>Заказан товар</div>
        <div>ID{{ $order->product->id }}</div>
        <div>Наименование: {{ $order->product->name }}</div>
        <div>Цена: {{ $order->product->price }}</div>
    </div>
</div>
</body>
</html>