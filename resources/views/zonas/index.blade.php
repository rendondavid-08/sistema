<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZONAS</title>
</head>
<body>
    <h2>Zonas Prueba</h2>
    <table>
        <thead>
            <th>CODIGO</th>
            <th>NOMBRE</th>
        </thead>
        <tbody>
            @foreach($zonas as $zona)
                <tr>
                    <td>{{$zona->codigo}}</td>
                    <td>{{$zona->nombre}}</td>
                </tr>
                @endforeach
        </tbody> 
    </table>
</body>
</html>