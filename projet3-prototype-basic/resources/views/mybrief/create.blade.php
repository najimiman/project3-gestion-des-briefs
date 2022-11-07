<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('gestionbrif.store')}}" method="POST">
    @csrf
    @if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
    @endif
    nom brif:<input type="text" name="nombrif">
    dateheure livraison:<input type="datetime-local" name="dateheurelivraison">
    dateheure recupiration:<input type="datetime-local" name="dateheurerecupiration">
    <button>ajouter</button>
    </form>
</body>
</html>