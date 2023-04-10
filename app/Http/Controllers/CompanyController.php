<?php

namespace App\Http\Controllers;
use Notification;
use Illuminate\Http\Request;
use App\Models\CompanyModel;
use Mail;
use App\Mail\DemoMail;

class CompanyController extends Controller
{

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = CompanyModel::latest()->paginate(5);
    
        return view('company.index',compact('companys'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function create()
     {
         return view('company.create');
     }
     
     /**
      * Store a newly created resource in storage.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */

      public function store(Request $request)
      {
          $request->validate([
              'name' => 'required',
              'website' => 'required',
              'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          ]);
    
          $input = $request->all();
    
          if ($image = $request->file('image')) {
              $destinationPath = 'logo/';
              $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
              $image->move($destinationPath, $profileImage);
              $input['image'] = "$profileImage";
          }
      
          CompanyModel::create($input);
          $mailData = [
            'title' => 'notification',
            'body' => 'This is for Company.'
        ];
         
        Mail::to('admin@gmail.com')->send(new DemoMail($mailData));
          return redirect()->route('company.index')
                          ->with('success','company created successfully.');
      }
       
      /**
       * Display the specified resource.
       *
       * @param  \App\CompanyModel  $companymodel
       * @return \Illuminate\Http\Response
       */

       public function edit($id) 
       {
           $company = CompanyModel::where('id',$id)->first();
          
           return view('company.edit', [
               'companymodel' => $company
           ]);
       }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CompanyModel  $companymodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
    
        $request->validate([
            'name' => 'required',
            'website' => 'required'
        ]);
  
        $input = $request->all();
 
        if ($image = $request->file('image')) {
            $destinationPath = 'logo/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input_image = "$profileImage";
        }else{
            unset($input_image);
        }
          
        CompanyModel::where('id',$id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "website" => $request->website,
            "image" => $input_image,
    ]);
    
        return redirect()->route('company.index')
                        ->with('success','company updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CompanyModel  $companymodel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=CompanyModel::where('id',$id)->delete();
     
        return redirect()->route('company.index')
                        ->with('success','company deleted successfully');
    }
}
