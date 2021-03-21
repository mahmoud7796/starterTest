<?php

namespace App\Observers;

use App\Models\Hospital;

class HospitalObserver
{
    /**
     * Handle the hospital "created" event.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return void
     */
    public function created(Hospital $hospital)
    {
        //
    }

    /**
     * Handle the hospital "updated" event.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return void
     */
    public function updated(Hospital $hospital)
    {
        //
    }

    /**
     * Handle the hospital "deleted" event.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return void
     */
    public function deleted(Hospital $hospital)
    {
        $doctors = $hospital-> doctors();
        $doctors -> delete();
    }

    /**
     * Handle the hospital "restored" event.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return void
     */
    public function restored(Hospital $hospital)
    {
        //
    }

    /**
     * Handle the hospital "force deleted" event.
     *
     * @param  \App\Models\Hospital  $hospital
     * @return void
     */
    public function forceDeleted(Hospital $hospital)
    {
        //
    }
}
