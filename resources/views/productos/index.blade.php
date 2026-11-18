<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PRODUCTOS</title>
</head>
<body>
    <h2>Productos Prueba</h2>
    <table>
        <thead>
            <th>CODIGO</th>
            <th>DESCRIPCION</th>
            <th>UNIDAD DE MEDIDA</th>
            <th>PRECIO</th>
            <th>CATEGORIA</th>
        </thead>
        <tbody>
            @foreach($productos as $producto)
                <tr>
                    <td>{{$producto->codigo}}</td>
                    <td>{{$producto->descripcion}}</td>
                    <td>{{$producto->unidad_medida}}</td>
                    <td>{{$producto->precio}}</td>
                    <td>{{$producto->cod_categoria}}</td>
                </tr>
                @endforeach
        </tbody> 
    </table>
</body>
</html>