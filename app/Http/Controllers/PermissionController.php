<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::orderBy('id', 'desc')->Paginate(7);
        return response()->view('cms.spaity.permission.index' , compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $permissions = Permission::all();
       return response()->view('cms.spaity.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = validator($request->all(),[
            'guard_name' =>'required',
            'name' =>'required|string|min:3|max:40',
        ],[

        ]);

        if( ! $validator->fails()){
            $permissions = new Permission();
            $permissions->guard_name= $request->get('guard_name');
            $permissions->name= $request->get('name');

            $isSaved = $permissions->save();

            if($isSaved){
                return response()->json(['icon' => 'success','title'=>'Created is Successfully'],200);
            } else{
                return response()->json(['icon' => 'error','title'=>'Created is Failed'],400);

            }


        }else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);
        }
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
        $permissions = Permission::findOrFail($id);
        return response()->view('cms.spaity.permission.edit' , compact('permissions'));
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
        $validator = validator($request->all(),[
            'guard_name' =>'required',
            'name' =>'required|string|min:3|max:40',
        ],[

        ]);

        if( ! $validator->fails()){
            $permissions = Permission::findOrFail($id);
            $permissions->guard_name= $request->get('guard_name');
            $permissions->name= $request->get('name');

            $isUpdate= $permissions->save();
            return ['redirect' =>route('permissions.index')];


            if($isUpdate){
                return response()->json(['icon' => 'success','title'=>'Updated is Successfully'],200);
            } else{
                return response()->json(['icon' => 'error','title'=>'Updated is Failed'],400);

            }


        }else{
            return response()->json(['icon'=>'error','title'=>$validator->getMessageBag()->first()],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = Permission::destroy($id);
        return response()->json(['icon' => 'success','title'=>'Deleted is Successfully'],200);
    }
}
