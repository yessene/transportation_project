<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;



class vehicleController extends Controller
{
    
    public function allvehicles()
{
    $allvehicles = DB::table('vehicles')->get();
    return view('formvehicles.allvehicles', compact('allvehicles'));
}
 // add Customer
 public function addvehicle()
 {
     return view('formvehicles.addvehicle');
 }
  // save record
  public function savevehicle(Request $request)
  {
    


      $request->validate([
        'registration_number'   => 'required|string|max:255',
        'brand'     => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'category' => 'required|string|max:255',
       
        'circulation_date'  => 'required|string|max:255',
      
        'mutation'      => 'required|string|max:255',
        'validity_date'  => 'nullable|string|max:255',
        'model'    => 'required|string|max:255',
      
        'chassis_number' => 'required|string|max:255',
        'weight' => 'required|string|max:255',
       
        
          
      ]);

      DB::beginTransaction();
      try {
        
         
        $vehicle = new vehicle;
        $vehicle->registration_number = $request->registration_number;
        $vehicle->brand = $request->brand;
        $vehicle->type = $request->type;
        $vehicle->category = $request->category;
      
        $vehicle->circulation_date = $request->circulation_date;
        
        $vehicle->mutation = $request->mutation;
        $vehicle->validity_date = $request->validity_date;
        $vehicle->model = $request->model;
       
        $vehicle->chassis_number = $request->chassis_number;
        $vehicle->weight = $request->weight;
       
        $vehicle->save();
        
          
          
          DB::commit();
          Toastr::success('Create new vehicle successfully :)','Success');
          return redirect()->route('form/allvehicles/page');
          
      } catch(\Exception $e) {
          DB::rollback();
          Toastr::error('Add vehicle fail :)','Error');
          return redirect()->back();
      }
  }
  public function updateVehicule($id)
  {
      $vehiculeEdit = DB::table('vehicles')->where('id',$id)->first();
      return view('formvehicles.editvehicle',compact('vehicleEdit'));
  }

  // update record
  public function updateRecord(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'registration_number'   => 'required|string|max:255',
        'brand'     => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        
        'circulation_date'  => 'required|string|max:255',
       
        'mutation'      => 'required|string|max:255',
        'validity_date'  => 'nullable|string|max:255',
        'model'    => 'required|string|max:255',
        
        'chassis_number' => 'required|string|max:255',
        'weight' => 'required|string|max:255',
        
        
    ]);
    if ($validator->fails()) {
        Toastr::error('Validation failed', 'Error');
        
        // Clear the input values
        $request->replace($request->except('_token'));

        return redirect()->back()->withErrors($validator);
    }
    DB::beginTransaction();
    try {
        $vehicle = vehicle::findOrFail($id); // Find the record by the given ID

        // Update the fields with the new values
        $vehicle->registration_number = $request->registration_number;
        $vehicle->brand = $request->brand;
        $vehicle->type = $request->type;
        $vehicle->category = $request->category;
       
        $vehicle->circulation_date = $request->circulation_date;
       
        $vehicle->mutation = $request->mutation;
        $vehicle->validity_date = $request->validity_date;
        $vehicle->model = $request->model;
       
        $vehicle->chassis_number = $request->chassis_number;
        $vehicle->weight = $request->weight;
       
      
        
        $vehicle->save(); // Save the changes

        DB::commit();

        Toastr::success('Updated vehicle successfully', 'Success');
        return redirect()->route('form/allvehicles/page');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Update vehicle failed', 'Error');
        return redirect()->back();
    }
}
// delete record
public function deleteRecord(Request $request)
{
    try {

        vehicle::destroy($request->id);
        Toastr::success('vehicle deleted successfully :)','Success');
        return redirect()->back();
    
    } catch(\Exception $e) {

        DB::rollback();
        Toastr::error('vehicle delete fail :)','Error');
        return redirect()->back();
    }
}
public function viewVehicule($id)
{
    $vehicule = vehicle::find($id);
    return view('formvehicles.viewvehicle', compact('vehicle'));
}


}