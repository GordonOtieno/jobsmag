<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
    //
    public function index(){
        // dd(Listing::latest()->filter(request(['tag','search']))->paginate(2));
        return view('listings.index',[
            'listings' => Listing::latest()->filter(request(['tag','search']))->paginate(6)
        ]);

    }
    public function show(Listing $listing){
        return view('listings.show', [
            'listing'=>$listing
          ]);
    }

    public function create(){
        return view('listings.create');
    }

    public function store(Request $request){
    //    dd($request->file('logo')->store());
    $formFields = $request->validate([
        'title' => 'required',
        'company' => ['required', Rule::unique('listings', 'company')],
        'location' => 'required',
        'website' => 'required',
        'email' => ['required', 'email'],
        'tags' => 'required',
        'description' => 'required'
    ]);

    if($request->hasFile('logo')){
        $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }

    Listing::create($formFields);

    // Add error handling logic here if needed

    return redirect('/')->with('success','Data has been successfully saved.');
    }


    public function edit(Listing $listing){
    // dd($listing->title);
        return view('listings.edit', ['listing'=> $listing]);

    }
    public function update(Request $request, Listing $listing){
        //    dd($request->file('logo')->store());
        $formFields = $request->validate([
            'title' => 'required',
            'company' => ['required'],
            'location' => 'required',
            'website' => 'required',
            'email' => ['required', 'email'],
            'tags' => 'required',
            'description' => 'required'
        ]);
    
        if($request->hasFile('logo')){
            $formFields['logo'] = $request->file('logo')->store('logos', 'public');
        }
    
        $listing->update($formFields);
    
        // Add error handling logic here if needed
    
        return back()->with('success','Job Listing Updated Sucesfully.');
        }

        //delete Listing
        public function destroy(Listing $listing){
            $listing-> delete();
            return redirect('/')->with('success','Job Listing deleted Sucesfully.');

        }


    }
