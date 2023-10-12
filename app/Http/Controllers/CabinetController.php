<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\cabinet;
use App\Models\History;
use App\Models\Staff;

class CabinetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetCabinet()
    {
        $cabinet = DB::table('tb_cabinet');
        $cabinet = $cabinet->where('cluster_id', 'LIKE', 1);
        $cabinet = $cabinet->get();

        $cluster = DB::table('tb_cluster')->select('*')->orderBy('floor_id');
        $cluster=$cluster->get();

        return view('cabinet', compact('cabinet', 'cluster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        for($i=1;$i<=4;$i++){
            $cabinet=new cabinet;
            $cabinet->cluster_id=5;
            $cabinet->status1=2;
            $cabinet->status2=0;
            $cabinet->save();
        }

        return redirect(('admin'));
    }
    
    public function open($cabinet_id){
        $cabinet=cabinet::find($cabinet_id);
        $cabinet->status2=1;
        $cabinet->save();


        
        $history = new History;
        $history->cabinet_id=$cabinet_id;
   
        $history->status2=1;
        $history->save();
        return redirect('admin');
    }
    public function close($cabinet_id){
        $cabinet=cabinet::find($cabinet_id);
        $cabinet->status2=0;
        $cabinet->save();

        
        $history = new History;
        $history->cabinet_id=$cabinet_id;
        $history->status2=0;
        $history->save();
        return redirect('admin');
    }
    public function search(Request $request)
    {
        $cabinet = DB::table('tb_cabinet')->where('cluster_id', 'Like',$request->cluster_id);
        $cluster = DB::table('tb_cluster')->select('*');
        $cluster=$cluster->get();

        $cabinet = $cabinet->get();
        return view('cabinet', compact('cabinet', 'cluster'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
