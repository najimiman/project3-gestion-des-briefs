<?php

namespace App\Http\Controllers;

use App\Models\Apprenent;
use App\Models\Brifapprent;
use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allpromo=Promotion::all();
        return view('mypromotion.index',['allpromotion'=>$allpromo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mypromotion.createP');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation existe et remplir de brif
        $validation=$request->validate([
            'name' =>'required|unique:promotions,name',
        ]);
        $promo=new Promotion();
        $promo->name=$request->input('name');
        $promo->save();
        return redirect()->route('gestionpromotion.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //  $brif=DB::table('brifapprents')
        //  ->join('brifs','brifapprents.brif_id','=','brifs.id')
        //  ->join('apprenents','brifapprents.apprenent_id','=','apprenents.id')
        //  ->join('promotions','apprenents.promotion_id','=','promotions.id')
        // ->get();
        $brif=Brifapprent::select("nombrif")
         ->join('brifs','brifapprents.brif_id','=','brifs.id')
         ->join('apprenents','brifapprents.apprenent_id','=','apprenents.id')
         ->join('promotions','apprenents.promotion_id','=','promotions.id')
         ->groupByRaw('nombrif')
        ->get();


        $index=Promotion::findOrfail($id);
        $allapren=Apprenent::select('*')->where('promotion_id',$id)->get();
        return view('mypromotion.update',['idpromo'=>$index,'allaprenet'=>$allapren,'brifassignerpro'=>$brif]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $promo=Promotion::findOrfail($id);
        $promo->name=$request->input('name');
        $promo->save();
        return redirect()->route('gestionpromotion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $promo=Promotion::findOrfail($id);
        $promo->delete();
        return redirect()->route('gestionpromotion.index');
    }
    public function searchpromo(Request $request){
        $output="";
        $promo=Promotion::where('name','Like','%'.$request->search.'%')->get();

        foreach($promo as $pro)
        {
            $output.=
            '<tr>
            <td class="td1">'.'<a href="/gestionpromotion/'.$pro['id'].'/edit">'.'<button class="me-2 btn btn-outline-warning fw-bolder">'.$pro->name.'</button></a>'.'</td>
            <td class="td1">'.'<form method="post" action="'.route('gestionpromotion.destroy',$pro->id ).'">
            <input type="hidden" name="_method" value="Delete">
            <input type="hidden" name="_token" value="'. csrf_token() .'">
                <button type="submit" class="me-2 btn btn-outline-danger fw-bolder">supprimer</button>
            </form>'.'</td>
            </tr>';
        }
        return response($output);
    }
}
