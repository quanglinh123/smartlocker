<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;
use App\Models\cabinet;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function GetStaff()
    {
        $staff = DB::table('tb_staff')->select('*');
        $staff = $staff->get();

        $department = DB::table('tb_department')->select('*');
        $department = $department->get();


        return view('staff', compact('staff','department'));
    }
    public function AddCabinet($staff_id)
    {
        $cluster = DB::table('tb_cluster')->join('tb_floor','tb_cluster.floor_id','=','tb_floor.floor_id')->select('tb_cluster.*','tb_floor.floor_name');

        $cabinet = DB::table('tb_cluster')
                ->join('tb_cabinet','tb_cluster.cluster_id','=','tb_cabinet.cluster_id')
                ->join('tb_floor','tb_cluster.floor_id','=','tb_floor.floor_id')
                ->where('tb_cabinet.status1','Like',2)
                ->select('tb_cluster.cluster_name','tb_floor.floor_name','tb_cabinet.*')->paginate(10);

        $staff = Staff::find($staff_id); 

        $cluster = DB::table('tb_cluster')->select('*');
        $cluster=$cluster->get();

        return view('staff/AddCabinet',['AddCabinet'=> $staff], compact('cabinet','cluster','staff'));
    }
    public function AddCabinetaction(Request $request){
        $staff = Staff::find($request->staff_id);
        $staff->cabinet_id=$request->cabinet_id;
        $staff->staff_status=1;
        $staff->save();

        $cabinet= cabinet::find($request->cabinet_id);
        $cabinet->status1=1;
        $cabinet->save();

        $department = DB::table('tb_department')->select('*');
        $department = $department->get();

        return redirect(('staff'));
    }

    public function ClearCabinet($staff_id){
        $staff=Staff::find($staff_id);
        $cabinet=cabinet::find($staff->cabinet_id);
        $cabinet->status1=2;
        $cabinet->save();

        $staff->cabinet_id=0;
        $staff->staff_status=2;
        $staff->save();
       
        return redirect(('staff'));
    }

    public function GetHistory()
    {
        $history = DB::table('tb_history')
        ->join('tb_staff','tb_history.cabinet_id','=','tb_staff.cabinet_id')
        ->select('tb_history.*','tb_staff.staff_name')->paginate(10);

        return view('history', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department = DB::table('tb_department')->select('*');
        $department = $department->get();
        return view('CreateStaff',compact('department'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $staff= new Staff;
        $staff->staff_name=$request->staff_name;
        $staff->staff_phone=$request->staff_phone;
        $staff->cluster_name = 0;
        $staff->cabinet_id = 0;
        $staff->staff_status = 2;
        $staff->department_name=$request->department_name;
        $staff->save();

       
        return redirect(('staff'));
    }
    public function search(Request $request)
    {
        $staff = DB::table('tb_staff');
        if( $request->staff_name){
            $staff = $staff->where('staff_name', 'LIKE', "%" . $request->staff_name . "%");
        }
        if( $request->department_name){
            $staff = $staff->where('department_name', 'LIKE', "%" . $request->department_name . "%");
        }
        if( $request->staff_status){
            $staff = $staff->where('staff_status', 'LIKE',$request->staff_status);
        }
        $department = DB::table('tb_department')->select('*');
        $department = $department->get();

        $staff = $staff->paginate(10);
        return view('staff', compact('staff','department'));
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
    public function edit($staff_id)
    {
        $data = Staff::find($staff_id);
        return view('staff/UpdateStaff',['edit'=> $data]);
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
