<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RentalController extends Controller
{
    //show and get all listings
    public function index(){
        // filter rentals by that tag using scope filter function in rental model
        // dd(request('tag'));
        return view('rentals.index',[
            // 'rentals' =>  Rental::all()
            // 'rentals' =>  Rental::latest()->filter(request(['tag' , 'search']))->get()
            'rentals' =>  Rental::latest()->filter(request(['tag' , 'search']))->Paginate(2)
         ]); 
    }

    //show single listing
    public function show(Rental $rental){
        return view('rentals.show', [
            'rental' => $rental
         ]);
    }

    //show create form
public function create(){
    return view('rentals.create');
}

// store rental data
public function store(Request $request){
    //to validate
    $formFields = $request->validate([
        //rules for certain fields
        'title'=>'required',
        'company'=>['required', Rule::unique('rentals','company')],
        'location'=>'required',
        'website'=>'required',
        'email'=>['required','email'],
        'tags'=> 'required',
        'description' =>'required'
    ]);

    //add path so that the logo files got to the folder
    if($request->hasFile('logo')){
        //add and upload it
        $formFields['logo'] = $request ->file('logo')->store('logos', 'public');
    }

    //set userid to the user currently logged in
    $formFields['user_id']= auth()->id();

    // for data to be moved to the db-use name of model
    Rental::create($formFields);

    //flash messages
    // Session::flash('message', 'Rental Created');

    //does not display the flash message unless its added to the view
    return redirect('/')->with('message', 'Rental created successfully!');
}

//show edit form
public function edit(Rental $rental){
    return view('rentals.edit', ['rental' => $rental]);
}

//update rental data
public function update (Request $request , Rental $rental){
     
    //make sure logged in user is owner
    if ($rental->user_id != auth()->id()) {
        abort(403, 'Unauthorized Action');
    }

    //to validate
    $formFields = $request->validate([
        //rules for certain fields
        'title'=>'required',
        'company'=>['required'],
        'location'=>'required',
        'website'=>'required',
        'email'=>['required','email'],
        'tags'=> 'required',
        'description' =>'required'
    ]);

    //add path so that the logo files goes to the folder
    if($request->hasFile('logo')){
        //add and upload it
        $formFields['logo'] = $request ->file('logo')->store('logos', 'public');
    }

    // for data to be moved to the db-use name of model
    $rental->update($formFields);

    
    //does not display the flash message unless its added to the view
    return back()->with('message', 'Rental updated successfully!');
}

//delete rental
public function destroy(Rental $rental){
     //make sure logged in user is owner
     if ($rental->user_id != auth()->id()) {
        abort(403, 'Unauthorized Action');
    }
    
    $rental->delete();
    return redirect('/')->with('message','Rental deleted successfully');
}

//manage rental
public function manage() {
    return view('rentals.manage', ['rentals' => auth()->user()->rentals()->get()]);
}

}


