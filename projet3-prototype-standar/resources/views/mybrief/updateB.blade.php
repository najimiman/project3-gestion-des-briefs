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
    <form action="{{route('gestionbrif.update',[$idB->id])}}" method="POST">
        @csrf
        @method('PUT')
        nom brif:<input type="text" name="nombrif" value="{{$idB->nombrif}}">
        dateheure livraison:<input type="datetime-local" name="dateheurelivraison" value="{{$idB->dateheurelivraison}}">
        dateheure recupiration:<input type="datetime-local" name="dateheurerecupiration" value="{{$idB->dateheurerecupiration}}">
        <button>modifier</button>
    </form>
    <input type="search" id="searchtache" placeholder="search tache">
    <a href="{{route('mytache.createT',$idB->id)}}">ajouter tache</a>
<table border="">
    <tbody class="tabel1">
    @foreach ($alltache as $val)
        <tr>
            <td hidden>{{$val->id}}</td>
            <td>{{$val->nomtache}}</td>
            <td>{{$val->dateD}}</td>
            <td>{{$val->dateF}}</td>
            <td>{{$val->Description}}</td>

            <input id="idB" type="hidden" value="{{$val['idbrif']}}">

           <td> <a href="{{route('mytacheupdateT',[$val['id']])}}"><button>modifier tache</button></a></td>

           <td>
            <form action="{{route('gestiontache.destroy',[$val['id']])}}" method="POST">
                @csrf
                @method('delete')
                <button type="submit">supprimer</button>
            </form>
           </td>
        </tr>
    @endforeach
</tbody>

<tbody id="Content" class="tabel2">

</tbody>
</table>
    {{-- for search tache --}}
    
    <script type="text/javascript">
        $('#searchtache').on('keyup',function(){
            $value=$(this).val();
            $idB=$('#idB').val();
            if($value){
                $('.tabel1').hide();
                $('.tabel2').show();
            }
            else{
                $('.tabel1').show();
                $('.tabel2').hide();
            }
            $.ajax({
                type:'get',
                url:'{{URL::to("searchT")}}',
                data:{'search':$value,'idbrif':$idB},
                success:function(data){
                    console.log(data);
                    $('#Content').html(data);
                }
            });
        })
        </script>

</body>
</html>