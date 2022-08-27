<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::withCount('cities')->with('cities')->orderBy('id', 'desc')->Paginate(7);

        return response()->view('cms.country.index' , compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('cms.country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'country_name' => 'required|string|min:3|max:20' ,
            'code' => 'required|string|min:3'
        ]);

        $countries = new Country();
        // $countries->country_name = $request->input('country_name');
        // $countries->country_name = $request('country_name');
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');

        $isSaved = $countries->save();

        session()->flash('massage' , $isSaved ? "Created is Succesfully" : "Created is Failed" );
        return redirect()->back();
        // return redirect()->route('countries.index');
        // echo $isSaved ? "Created is Succesfully" : "created is Failed" ;
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

        $countries = Country::findOrFail($id);
       return response()->view('cms.country.edit' , compact('countries'));
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
        $request->validate([
            'country_name' => 'required|string|min:3|max:20' ,
            'code' => 'required|string|min:3'
        ]);

        $countries =Country::findOrFail($id);
        $countries->country_name = $request->get('country_name');
        $countries->code = $request->get('code');

        $isUpdated = $countries->save();

        session()->flash('massage' , $isUpdated ? "Created is Succesfully" : "Created is Failed" );
         return redirect()->route('countries.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $countries =Country::destroy($id);
        echo $countries? "Deleted is Succesfully" : "Deleted is Failed" ;
        return redirect()->route('countries.index');

    }
}
