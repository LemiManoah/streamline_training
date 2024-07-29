<?php
namespace App\Observers;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class PatientObserver
{
    public function creating(Patient $patient)
    {
        DB::beginTransaction();
    }

    public function created(Patient $patient)
    {
        DB::commit();
        Log::info('Patient created: ', $patient->toArray());
    }

    public function updating(Patient $patient)
    {
        DB::beginTransaction();
    }

    public function updated(Patient $patient)
    {
        DB::commit();
        Log::info('Patient updated: ', $patient->toArray());
    }

    public function deleting(Patient $patient)
    {
        DB::beginTransaction();
    }

    public function deleted(Patient $patient)
    {
        DB::commit();
        Log::info('Patient deleted: ', $patient->toArray());
    }

    public function failed(Patient $patient)
    {
        DB::rollBack();
        Log::error('Transaction failed for patient: ', $patient->toArray());
    }
}
