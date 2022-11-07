<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h1>Brief</h1>
    <input type="search" id="search" name="search">
    <a href="{{route('gestionbrif.create')}}">ajouter brief</a>
    <table border="1">
        <head>
            <th>id</th>
            <th>nom</th>
            <th>dateheurL</th>
            <th>dateheurR</th>
        </head>
        <tbody class="table1">
    @foreach ($brifall as $value)
        <tr>
            <td>{{$value->id}}</td>
            <td>{{$value->nombrif}}</td>
            <td>{{$value->dateheurelivraison}}</td>
            <td>{{$value->dateheurerecupiration}}</td>
            <td><a href="{{route('gestionbrif.edit',[$value->id])}}"><button>modifier</button></a></td>
            <td>
                <form action="{{route('gestionbrif.destroy',[$value->id])}}" method="POST">
                    @csrf
                    @method('delete')
                    <button>supprimer</button>
                </form>
            </td>
            <td><button>assigner</button></td>
            <td><a href="{{route('mytache.createT',[$value->id])}}"><button>+tache</button></a></td>
           
        </tr>
    @endforeach
</tbody>

        <tbody id="Content" class="table2"></tbody>

</table>
<script type="text/javascript">
    $('#search').on('keyup',function(){
        $value=$(this).val();
        if($value){
            $('.table1').hide();
            $('.table2').show();
        }
        else{
            $('.table1').show();
            $('.table2').hide();
        }
        $.ajax({
            type:'get',
            url:'{{URL::to("search")}}',
            data:{'search':$value},
            success:function(data){
                console.log(data);
                $('#Content').html(data);
            }
        });
    })
    </script>
</body>
</html>
