<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    
    public function allClients()
    {
        $allClients = DB::table('clients')->get();
        return view('formclients.allclients',compact('allClients'));
    }

    // add Customer
 public function addClient()
 {
     return view('formclients.addclient');
 }
  // save record
  public function saveClient(Request $request)
  {
    


      $request->validate([
        'name_society' => 'required|string|max:255',
'last_name' => 'nullable|string|max:255',
'first_name' => 'nullable|string|max:255',
'address' => 'required|string|max:255',
'type' => 'required|string|max:255',
'email' => 'required|string|email|max:255',
'country' => 'required|string|max:255',
'city' => 'nullable|string|max:255',
'code_postal' => 'nullable|string|max:255',
'relation_date' => 'nullable|string|max:255',
'notes' => 'nullable|string',
'phone1' => 'required|string|max:255',
'phone2' => 'nullable|string|max:255',

          
      ]);

  Client::create([

'name_society' =>  $request->name_society,
'last_name' => $request->last_name,
'first_name' =>  $request->first_name,
'address' => $request->address,
'type' => $request->type,
'email' => $request->email,
'country' => $request->country,
'city' => $request->city,
'code_postal' => $request->code_postal,
'relation_date' =>  $request->relation_date,
'notes' => $request->notes,
'phone1' => $request->phone1,
'phone2' =>  $request->phone2,

   ]) ;
          Toastr::success('Create new client successfully :)','Success');
          return redirect()->route('form/allclients/page');
          
  }

  public function updateClient($id)
  {
      $clientEdit = DB::table('clients')->where('id',$id)->first();
      return view('formclients.editclient',compact('clientEdit'));
  }

  // update record
  public function updateRecord(Request $request, $id)
{
    $validator = Validator::make($request->all(), [
        'society_name' => 'required|string|max:255',
'last_name' => 'nullable|string|max:255',
'first_name' => 'nullable|string|max:255',
'address' => 'required|string|max:255',
'type' => 'required|string|max:255',
'email' => 'required|string|email|max:255',
'country' => 'required|string|max:255',
'city' => 'nullable|string|max:255',
'code_postal' => 'nullable|string|max:255',
'relation_date' => 'nullable|string|max:255',
'notes' => 'nullable|string',
'phone1' => 'required|string|max:255',
'phone2' => 'nullable|string|max:255',

    ]);
    if ($validator->fails()) {
        Toastr::error('Validation failed', 'Error');
        
        // Clear the input values
        $request->replace($request->except('_token'));

        return redirect()->back()->withErrors($validator);
    }
    DB::beginTransaction();
    try {
        $client = Client::findOrFail($id); // Find the record by the given ID

        // Update the fields with the new values
        $client->society_name = $request->society_name;
        $client->last_name = $request->last_name;
        $client->first_name = $request->first_name;
        $client->address = $request->address;
        $client->type = $request->type;
        $client->email = $request->email;
        $client->country = $request->country;
        $client->city = $request->city;
        $client->code_postal = $request->code_postal;
        $client->relation_date = $request->relation_date;
        $client->notes = $request->notes;
        $client->phone1 = $request->phone1;
        $client->phone2 = $request->phone2;
        
        

        $client->save(); // Save the changes

        DB::commit();

        Toastr::success('Updated client successfully', 'Success');
        return redirect()->route('form/allclients/page');
    } catch (\Exception $e) {
        DB::rollback();
        Toastr::error('Update client failed', 'Error');
        return redirect()->back();
    }
}

// delete record
public function deleteRecord(Request $request)
{
    try {

        Client::destroy($request->id);
        Toastr::success('Client deleted successfully :)','Success');
        return redirect()->back();
    
    } catch(\Exception $e) {

        DB::rollback();
        Toastr::error('Client delete fail :)','Error');
        return redirect()->back();
    }
}
public function viewClient($id)
{
    $client = Client::find($id);
    return view('formclients.viewclient', compact('client'));
}

}
