<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <p>brief : {{$brif->nombrif}}</p>

    @foreach ($apprenents as $value)
            @if (is_null($brif->apprent()->find($value->id)))
            <p>{{$value->nom}} <p>
            <form action="{{route('apprebrif.store')}}" method="post">
                @csrf
                <input type="hidden" name="apprenent_id" value="{{$value->id}}">
                <input type="hidden" name="brif_id" value="{{$brif->id}}">
                <button type="submit"> + </button>    
            </form> 
            @else    
            <p style="color: red">{{$value->nom}} <p>
                <form action="{{route('apprebrif.destroy', $value->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="apprenent_id" value="{{$value->id}}">
                    <input type="hidden" name="brif_id" value="{{$brif->id}}">
                    <button type="submit"> - </button>    
                </form> 
            @endif 
            
    @endforeach
    
</body>
</html>