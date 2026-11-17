<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Su nota es: {{$nota}} </h1>
    <p>
        Situacion:
        @if($nota< 0 || $nota > 5.0)
            Nota invalida
        @else
            @if($nota>= 3.0)
                Curso aprobado
                @if($nota < 3.5)
                Nivel basico
                @elseif($nota < 4.0)
                Nivel bueno
                @elseif($nota < 4.6)
                Nivel alto
                @elseif($nota >= 4.6)
                Nivel superior
                @endif
            @else
                Curso reprobado
                @if($nota < 2.0)
                Nivel muy bajo
                @elseif($nota < 3.0)
                Nivel bajo
                @endif
            @endif
        @endif
    </p>
</body>
</html>