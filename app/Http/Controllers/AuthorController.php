<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Country;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $authors = Author::withCount('articles')->with('user')->orderBy('id', 'desc')->Paginate(7);
        $this->authorize('viewAny', Author::class);
        $roles = Role::all();
        return response()->view('cms.author.index', compact('authors' , 'roles'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::where('guard_name','author')->get();
        $countries = Country::all();
        $this->authorize('Create', Author::class);
        return response()->view('cms.author.create' , compact('countries' , 'roles'));
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
            // 'mobile' =>'required|string|min:10|max:14',
            // 'image' => 'image|mimes:png,jpg,jpeg,JPG',

        ],[
        ]);

        if( ! $validator->fails()){
            $authors = new Author();


            $authors->email= $request->get('email');
            $authors->password=Hash::make( $request->get('password'));

            if(request()->hasFile('file')){
                $file = $request->file('file');

                $fileName = time() . 'image.' . $file->getClientOriginalExtension();

                $file->move('storage/file/author',$fileName);


                $authors->file = $fileName;
            }
            $isSaved = $authors->save();

            //البيانات الخاصة باليوزر

            if($isSaved){

                $users = new User();
                $roles = Role::findOrFail($request->get('role_id'));
                $authors->assignRole($roles->name);

                if(request()->hasFile('image')){
                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/author',$imageName);


                    $users->image = $imageName;
                }

                $users->firstname= $request->get('firstname');
                $users->lastname= $request->get('lastname');
                $users->mobile= $request->get('mobile');
                $users->gender= $request->get('gender');
                $users->status= $request->get('status');
                $users->date_of_birth= $request->get('date_of_birth');
                $users->country_id= $request->get('country_id');
                $users->actor()->associate($authors);

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
        $countries = Country::all();
        $this->authorize('update', Author::class);
        $authors = Author::with('user')->findOrFail($id);
        return response()->view('cms.author.edit' , compact('countries' , 'authors'));
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
            // 'image' => 'image|',

        ],[

        ]);

        if( ! $validator->fails()){
            $authors =Author::findOrFail($id);

            $authors->email= $request->get('email');

            $isUpdate = $authors->save();


            if($isUpdate){

                $users = $authors->user;


                if(request()->hasFile('image')){
                    $image = $request->file('image');

                    $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                    $image->move('storage/images/author',$imageName);


                    $users->image = $imageName;
                }


                $users->firstname= $request->get('firstname');
                $users->lastname= $request->get('lastname');
                $users->mobile= $request->get('mobile');
                $users->gender= $request->get('gender');
                $users->status= $request->get('status');
                $users->date_of_birth= $request->get('date_of_birth');
                $users->country_id= $request->get('country_id');
                $users->actor()->associate($authors);

                $isSaved = $users->save();

                if(Auth::guard('admin')->id()){
                    return ['redirect' =>route('authors.index')];

                }elseif(Auth::guard('author')->id()){
                    return ['redirect' =>route('profile')];

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
    public function destroy( author $author)
    {


        $this->authorize('delete', Author::class);
        if($author->id == Auth::id()){
            return redirect()->route('authors.index')->withErrors(trans('cannot delete yourself'));

        }else{
        $author->user()->delete();
        $isDeleted = $author->delete();
        return response()->json(['icon' => 'success','title'=>'author Deleted is Successfully'],200);

        }
    }
}
