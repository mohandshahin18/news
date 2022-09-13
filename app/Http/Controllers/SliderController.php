<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::orderBy('id', 'desc')->Paginate(7);
        // $this->authorize('viewAny', Slider::class);
        return response()->view('cms.slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Slider::all();
        // $this->authorize('create', City::class);
        return response()->view('cms.slider.create',compact('sliders'));
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
            'title' =>'required|string|min:10|max:100',
            'description' =>'required|string|min:50|max:200',
        ],[

        ]);

        if( ! $validator->fails()){
            $sliders = new Slider();
            if(request()->hasFile('image')){
                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/slider',$imageName);


                $sliders->image = $imageName;
            }
            $sliders->title= $request->get('title');
            $sliders->description= $request->get('description');

            $isSaved = $sliders->save();

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
        $sliders = Slider::findOrFail($id);
        // $this->authorize('update', City::class);
        return response()->view('cms.slider.edit' , compact( 'sliders' ));
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
            'title' =>'required|string|min:10|max:100',
            'description' =>'required|string|min:50|max:200',
        ],[

        ]);

        if( ! $validator->fails()){
            $sliders =Slider::findOrFail($id);
            if(request()->hasFile('image')){
                $image = $request->file('image');

                $imageName = time() . 'image.' . $image->getClientOriginalExtension();

                $image->move('storage/images/slider',$imageName);


                $sliders->image = $imageName;
            }
            $sliders->title= $request->get('title');
            $sliders->description= $request->get('description');

            $isUpdated = $sliders->save();

            return ['redirect' =>route('sliders.index')];
            if($isUpdated){
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
        $sliders = Slider::destroy($id);
        // $this->authorize('delete', City::class);
        return response()->json(['icon' => 'success','title'=>'Deleted is Successfully'],200);
    }
}
