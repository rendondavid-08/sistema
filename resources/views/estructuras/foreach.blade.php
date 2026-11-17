<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @foreach($lista as $obj)
    <p>
        {{$obj}}
    </p>
    @endforeach
    
// Adicionar codigo php
@php 
    function sumar($numero1, $numero2){
        return $numero1 + $numero2;
    }
@endphp
<p>
    Resultado de la suma es: {{sumar(15,18)}}
</p>

</body>
</html>