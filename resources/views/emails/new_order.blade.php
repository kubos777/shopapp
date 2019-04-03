<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo pedido</title>
</head>
<body>
<p>¡Se ha realizado un nuevo pedido!</p>
<p>Estos son los datos del cliente que realizó el pedido: </p>

<ul>
    <li><strong>Nombre: </strong>{{ $user->name }}</li>
    <li><strong>Correo: </strong>{{ $user->email }}</li>
    <li><strong>Fecha del pedido:</strong>{{ $cart->order_date }}</li>

</ul>
<hr>
<p>Detalles del pedido</p>
<ul>
    @foreach ($cart->details as $detail)
        <li>
            {{ $detail->product->name }} x {{ $detail->quantity  }}
            ($ {{ $detail->quantity * $detail->product->price }})
        </li>
    @endforeach
</ul>

<p>
    <strong>Importe a pagar: </strong> {{ $cart->total }}
</p>

<p>
    <a href="{{ url('admin/orders'.$cart->id)  }}">Haz click aquí</a>
    para ver más información del pedido.
</p>


</body>
</html>
