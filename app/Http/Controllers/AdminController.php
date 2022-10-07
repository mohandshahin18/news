<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Admin;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $admins = Admin::with('user')->orderBy('id', 'desc');
        $this->authorize('viewAny', Admin::class);
        $roles = Role::all();


        if ($request->get('email')) {
            $admins = $admins->where('email', 'like', '%' . $request->email . '%');
        }

        $admins = $admins->Paginate(7);

        return response()->view('cms.admin.index', compact('admins','roles'));



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name','admin')->get();
        $this->authorize('create', Admin::class);
        $countries = Country::all();
        return response()->view('cms.admin.create' , compact('countries','roles'));
    }

    public function AdminCreate($id){
        $countries = Country::with('cities')->where('country_id' , $id);
        return response()->view('cms.admin.create' , compact('countries'));
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
            'firstname' =>'required|string|min:3|max:30',
            'lastname' =>'required|string|min:3|max:30',
            'mobile' =>'required|string|min:10|max:14',
            'email' =>'required|email|unique:admins,email'


        ],[

        ]);

        if( ! $validator->fails()){
            $admins = new Admin();


            $admins->email= $request->get('email');
            $admins->password=Hash::make( $request->get('password'));
            $isSaved = $admins->save();

            if($isSaved){

                $users = new User();
                $roles = Role::findOrFail($request->get('role_id'));
                $admins->assignRole($roles->name);

                if(request()->hasFile('image')){
                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin',$imageName);


                    $users->image = $imageName;
                }

                $users->firstname= $request->get('firstname');
                $users->lastname= $request->get('lastname');
                $users->mobile= $request->get('mobile');
                $users->gender= $request->get('gender');
                $users->status= $request->get('status');
                $users->date_of_birth= $request->get('date_of_birth');
                $users->country_id= $request->get('country_id');
                $users->actor()->associate($admins);

                $isSaved = $users->save();

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
        $roles = Role::where('guard_name','admin')->get();
        $this->authorize('update', Admin::class);
        $countries = Country::all();
        $admins = Admin::with('user')->findOrFail($id);
        return response()->view('cms.admin.edit' , compact('countries' , 'admins','roles'));
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
            'firstname' =>'required|string|min:3|max:30',
            'lastname' =>'required|string|min:3|max:30',
            'mobile' =>'required|string|min:10|max:14',

        ],[

        ]);

        if( ! $validator->fails()){
            $admins =Admin::findOrFail($id);

            $admins->email= $request->get('email');


            $isUpdate = $admins->save();


            if($isUpdate){

                $users = $admins->user;
                // $roles = Role::findOrFail($request->get('role_id'));
                // $admins->assignRole($roles->name);

                if(request()->hasFile('image')){
                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/admin',$imageName);


                    $users->image = $imageName;
                }

                $users->firstname= $request->get('firstname');
                $users->lastname= $request->get('lastname');
                $users->mobile= $request->get('mobile');
                $users->gender= $request->get('gender');
                $users->status= $request->get('status');
                $users->date_of_birth= $request->get('date_of_birth');
                $users->country_id= $request->get('country_id');
                $users->actor()->associate($admins);

                $isUpdate = $users->save();

                if(Auth::guard('admin')->id() == $admins->id){
                    return ['redirect' =>route('profile')];
                }else{
                    return ['redirect' =>route('admins.index')];

                }


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
    public function destroy(Admin $admin)
    {

        $this->authorize('delete', Admin::class);
        if($admin->id == Auth::id()){
            return redirect()->route('admins.index')->withErrors(trans('cannot delete yourself'));
            // return response()->json(['icon' => 'error','title'=>'cannot delete yourself'],400);

        }else{
        $admin->user()->delete();
        $isDeleted = $admin->delete();
        return response()->json(['icon' => 'success','title'=>'Admin Deleted is Successfully'],200);

        }
    }



}
