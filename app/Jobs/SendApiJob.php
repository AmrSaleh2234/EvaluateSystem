<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Http\Controllers\ClientController;

class SendApiJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $id;
    private $response;
    public function __construct($id)
    {
        //
        $this->id=$id;
    }
public function getresponse(){
   return $this->response;
}
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $this->response= ClientController::getall($this->id);
    }
}
