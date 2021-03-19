<?php

namespace App\Listeners;

use App\Events\youtubeWachers;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCount
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(youtubeWachers $event)
    {
        if(!session()-> has('first_vist')){
       $this -> UpdateViews($event -> video);
        }else {
            return false;
        }
    }
    function UpdateViews($video){

        $video -> views = $video -> views + 1;
        $video ->save();
        session() -> put('first_vist', $video ->id);
    }
}
