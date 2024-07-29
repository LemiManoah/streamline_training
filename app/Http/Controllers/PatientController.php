<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Http\Requests\StorePatientRequest;
use App\Http\Requests\UpdatePatientRequest;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::paginate(10);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePatientRequest $request)
    {
        
        // $request->validate([ "NIN" => function (string $attribute, mixed $value, Closure $fail){
        //     $nationalid = str_split($value);
        //     $date_of_birth = str_split(explode('/', $request->dateOfBirth)[2]);

        //     if (substr($nationalid, 0, 2) !== 'CM') {
        //         $fail('The :attribute must start with CM.');
        //     }elseif ($date_of_birth[2] !== $nationalid[3] && $date_of_birth[3] !== $nationalid[4]) {
        //         $fail('The :attribute is invalid for entered Date of birth.');
        //     }
        // } ]); 
        
        Patient::create($request->all());

        return redirect()->route('patients.index')
            ->with('success', 'Patient created successfully');

        
    }


    //INSERT INTO patients(name, age, status) VALUES('Lemi', '11', 'single');
    //SELECT FROM patients WHERE name = 'Lemi'
    //UPDATE patients SET age = '12' WHERE name = 'Lemi';



    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $patients = Patient::findOrFail($id);
        return view('patients.show', compact('patient')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Patient $patient)
    {
    // Delete the patient
        $patient->delete();

    // Redirect to the patients index with a success message
        return redirect()->route('patients.index')
            ->with('success', 'Patient deleted successfully');
    }

}
