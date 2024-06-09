<?php

namespace App\Http\Controllers;

use App\Models\Driver;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use Illuminate\Support\Facades\Validator;

class DriverController extends Controller
{

    public function alldrivers()
    {

        $alldrivers = DB::table('drivers')->get();
        return view('formdrivers.alldrivers', compact('alldrivers'));
    }
    public function adddriver()
    {
        return view('formdrivers.adddriver');
    }
    public function saveDriver(Request $request)
    {
        $request->validate([
            /*5required rest is nullable*/

            'Last_Name' => 'required|string|max:255',
            'First_Name' => 'required|string|max:255',
            'Date_of_Birth' => 'required|string|max:255',
            'ID_Number' => 'required|string|max:255',
            'Phone' => 'nullable|string|max:255',
            'Gender' => 'nullable|string|max:255',
            'Address' => 'nullable|string|max:255',
            'Transport' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:255',
            'registration_number' => 'required|string|max:255',
            'Departure_Date' => 'nullable|string|max:255',
            'Social_Security' => 'nullable|string|max:255',
            'Marital_Status' => 'nullable|string|max:255',
            'Type' => 'required|string|max:255',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
            

        ]);
      

Driver::create([
    'Last_Name' =>  $request->Last_Name,
    'First_Name' => $request->First_Name,
    'Date_of_Birth' => $request->Date_of_Birth,
    'ID_Number' =>$request->ID_Number,
    'Phone' => $request->Phone,
    'Gender' =>$request->Gender,
    'Address' => $request->Address,
    'Transport' => $request->Transport,
    'City' => $request->City,
    'registration_number' =>  $request->registration_number,
    'Departure_Date' =>$request->Departure_Date,
    'Social_Security' => $request->Social_Security,
    'Marital_Status' =>$request->Marital_Status,
    'Type' => $request->Type,
    'Image' =>$request->file('image'),
]);
Toastr::success('Successful creation of the new driver:)', 'Success');
return redirect()->route('form/alldrivers/page');
       
    }
    public function updatedriver($id)
    {
        $driverEdit = DB::table('drivers')->where('id', $id)->first();
        return view('formdrivers.editdriver', compact('driverEdit'));
    }
    
    // update record
    public function updateRecord(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [

            'Last_Name' => 'required|string|max:255',
            'First_Name' => 'required|string|max:255',
            'Date_of_Birth' => 'required|string|max:255',
            'ID_Number' => 'required|string|max:255',
            'Phone' => 'nullable|string|max:255',
            'Gender' => 'nullable|string|max:255',
            'Address' => 'nullable|string|max:255',
            'Transport' => 'nullable|string|max:255',
            'City' => 'nullable|string|max:255',
            'registration_Number' => 'required|string|max:255',
            'Hire_Date' => 'nullable|string|max:255',
            'Departure_Date' => 'nullable|string|max:255',
            'Social_Security' => 'nullable|string|max:255',
            'Marital_Status' => 'nullable|string|max:255',
            'Type' => 'required|string|max:255',
            'Image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg'
            

            


        ]);
        if ($validator->fails()) {
            Toastr::error('Validation failed', 'Error');

            // Clear the input values
            $request->replace($request->except('_token'));

            return redirect()->back()->withErrors($validator);
        }

        DB::beginTransaction();
        try {


            $driver = driver::findOrFail($id);

            $driver->Last_Name = $request->input('Name');
$driver->First_Name = $request->input('First_Name');
$driver->Date_of_Birth = $request->input('Date_of_Birth');
$driver->ID_Number = $request->input('ID_Number');
$driver->Phone = $request->input('Phone');
$driver->Gender = $request->input('Gender');
$driver->Address = $request->input('Address');
$driver->Transport = $request->input('Transport');
$driver->City = $request->input('City');
$driver->registration_Number = $request->input('registration_Number');
$driver->Hire_Date = $request->input('Hire_Date');
$driver->Departure_Date = $request->input('Departure_Date');
$driver->Social_Security = $request->input('Social_Security');
$driver->Marital_Status = $request->input('Marital_Status');
$driver->Type = $request->input('Type');
            
            if($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = time().'-'.$file->getClientOriginalName();
                $file->move(public_path('images'), $filename);  // you might need to create a directory "images" under public
        
                $driver->image = $filename;
            }
            $driver->save();




            DB::commit();
            Toastr::success(' Driver update performed successfully:)', 'Success');
            return redirect()->route('form/alldrivers/page');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Driver update failed :)', 'Error');
            return redirect()->back();
        }
    }

  // delete record

    public function deleteRecord(Request $request)
    {
        try {

            driver::destroy($request->id);
            Toastr::success('Driver removal done successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {

            DB::rollback();
            Toastr::error('Driver removal failed :)', 'Error');
            return redirect()->back();
        }
    }

    public function viewdriver($id)
{
    $driver = driver::find($id);
    return view('formdrivers.viewdriver', compact('driver'));
}
}


