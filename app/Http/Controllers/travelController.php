<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\travel;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Vehicle;
use App\Models\driver;
use App\Models\Client;
use Illuminate\Support\Facades\Log;


class travelController extends Controller
{
    public function alltravels()
{
    $alltravels = travel::with('vehicles', 'drivers','clients')->get(); // Eager load the 'vehicles' relation
    return view('formtravels.alltravels', compact('alltravels'));
}

 public function addtravel()
 {
    // Fetch all vehicles
    // Fetch all vehicles that are not linked with any travel
    $vehicles = Vehicle::doesntHave('travels')->get();

    // Fetch all drivers that are not linked with any travel
    $drivers = driver::doesntHave('travels')->get();

    // Fetch all clients that are not linked with any travel
    $clients = Client::doesntHave('travels')->get();

    
     // Pass the vehicles to your view
    return view('formtravels.addtravel', compact('vehicles', 'drivers','clients'));
 }
  // save record
  public function savetravel(Request $request)
  {
      $request->validate([
        'travel_name' => 'required|string|max:255',
        'vehicles' => 'required|array|min:1', 
        'drivers' => 'required|array|min:1', 
        'clients' => 'required|array|min:1',
        'goods' => 'required|array|min:1',
        'con' => 'required|string|max:255',
        'origin' => 'nullable|string|max:255',
        'destination' => 'nullable|string|max:255',
        'departure_date' => 'nullable|string|max:255',
        'arrival_date' => 'nullable|string|max:255',
        'kilometers' => 'nullable|string|max:255',

        'seals' => 'nullable|string|max:255',
        'observation' => 'nullable|string|max:255',
        
      ]);
      DB::beginTransaction();
      try {
        
        $travel = new travel;
        $travel->travel_name = $request->travel_name;
        $travel->con = $request->con;
        $travel->origin = $request->origin;
        $travel->destination = $request->destination;
        $travel->departure_date = $request->departure_date;
        $travel->arrival_date = $request->arrival_date;
        $travel->kilometers = $request->kilometers;
       
        $travel->seals = $request->seals;
        $travel->observation = $request->observation;
        

          $travel->save();
          // Sync vehicles
        $travel->vehicles()->sync($request->vehicles);
        $travel->driverss()->sync($request->drivers); 
        $travel->clients()->sync($request->clients);
        
         
          DB::commit();
          Toastr::success('Create new travel successfully :)','Success');
          return redirect()->route('form/alltravels/page');
          
      } catch(\Exception $e) {
          DB::rollback();
          Log::error($e);
          Toastr::error('Add travel fail :)','Error');
          return redirect()->back();
      }
  }
  public function updatetravel($id)
  {
    {
        $travelEdit = travel::with('vehicles','drivers','clients')->where('id',$id)->first(); // Using Eloquent with eager loading of vehicles
        $vehicles = Vehicle::all();
        $drivers = driver::all(); // Fetch all drivers
        $clients = Client::all();
       

        $selectedvehicles = $travelEdit->vehicles->pluck('id')->toArray(); // This will give you an array of ids of vehicles associated with the travel.
        $selecteddrivers = $travelEdit->drivers->pluck('id')->toArray(); // This will give you an array of ids of driversassociated with the travel.
        $selectedClients = $travelEdit->clients->pluck('id')->toArray(); 
   
        return view('formtravels.edittravel', compact('travelEdit', 'vehicles', 'selectedVehicles','drivers','selecteddriverss','clients','selectedClients'));
    }
  }

  // update record
  public function updateRecord(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'travel_name'   => 'required|string|max:255',
        'vehicles'     => 'required|array|min:1', // new validation rule for vehicles
        'drivers'    => 'required|array|min:1', // new validation rule for drivers
        'clients'    => 'required|array|min:1',
        
        'con' => 'required|string|max:255',
    'provenance' => 'nullable|string|max:255',
    'destination' => 'nullable|string|max:255',
    'date_exit' => 'nullable|string|max:255',
    'date_arrivee' => 'nullable|string|max:255',
    'sales' => 'nullable|string|max:255',
    'observation' => 'nullable|string|max:255',

    
    ]);
    if ($validator->fails()) {
        Toastr::error('Validation failed', 'Error');
        
        // Clear the input values
        $request->replace($request->except('_token'));

        return redirect()->back()->withErrors($validator);
    }
    DB::beginTransaction();
    try {
        $travel = travel::findOrFail($id); // Find the record by the given ID
       
        // Update the fields with the new values
        $travel->travel_name = $request->travel_name;
        $travel->con = $request->con;
$travel->provenance = $request->provenance;
$travel->destination = $request->destination;
$travel->date_exit = $request->date_exit;
$travel->date_arrivee = $request->date_arrivee;
$travel->kilometers = $request->kilometers;
$travel->sales = $request->sales;
$travel->observation = $request->observation;
        $travel->save(); // Save the changes
        // Sync vehicles
        $travel->vehicles()->sync($request->vehicles);
        $travel->drivers()->sync($request->drivers); // Sync drivers
        $travel->clients()->sync($request->clients);
       

        DB::commit();

        Toastr::success('Updated travel successfully', 'Success');
        return redirect()->route('form/alltravels/page');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Update travel failed', 'Error');
        return redirect()->back();
    }
}
// delete record
public function deleteRecord(Request $request)
{
    try {

        travel::destroy($request->id);
        Toastr::success('travel deleted successfully :)','Success');
        return redirect()->back();
    
    } catch(\Exception $e) {

        DB::rollback();
        Toastr::error('travel delete fail :)','Error');
        return redirect()->back();
    }
}
public function viewtravel($id)
{
    $travel = travel::find($id);
    return view('formtravels.viewtravel', compact('travel'));
}



}
