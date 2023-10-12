<?php

namespace App\Http\Controllers;

use App\Models\cabinet;
use App\Models\Cluster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClusterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetCluster()
    {
        $cluster = DB::table('tb_cluster')->join('tb_floor','tb_cluster.floor_id','=','tb_floor.floor_id')->select('tb_cluster.*','tb_floor.floor_name')->orderBy('floor_id');
        $cluster = $cluster->get();


        return view('build/cluster', compact('cluster'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $floor = DB::table('tb_floor')->select('*')->get();
        
        return view('build/addcluster',compact('floor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cluster= new Cluster();
        $cluster->cluster_name=$request->cluster_name;
        $cluster->floor_id=$request->floor_id;
        $cluster->save();

        for($i=1;$i<=16;$i++){
            $cabinet=new cabinet;
            $cabinet->cluster_id=$cluster->cluster_id;
            $cabinet->status1=2;
            $cabinet->status2=0;
            $cabinet->save();
        }
        return redirect(('cluster'));
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