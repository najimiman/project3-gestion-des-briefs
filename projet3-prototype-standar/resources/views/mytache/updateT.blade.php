<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <form action="{{route('gestiontache.update',[$tach->id])}}" method="POST">
    @csrf
    @method('PUT')
    nom brif:<input type="text" name="nomtache" value="{{$tach->nomtache}}">
    dateD:<input type="datetime-local" name="dateD" value="{{$tach->dateD}}">
    datefin:<input type="datetime-local" name="dateF" value="{{$tach->dateF}}">
    Description:<input type="text" name="Description" value="{{$tach->Description}}">
    idbrif:<input type="text" name="idbrif" value="{{$tach->idbrif}}">
    <button>modifier</button>
</form>
</body>
</html>