<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('gestiontache.store')}}" method="POST">
        @csrf
      
    nom tache:<input type="text" name="nomtache">
    date debut:<input type="datetime-local" name="dateD">
    date fin:<input type="datetime-local" name="dateF">
    Description :<input type="text" name="Description">
    <input type="text" name="idbrif" value="{{$id}}">
    <button>ajouter tache</button>
    </form>
</body>
</html>