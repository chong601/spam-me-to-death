<?php

namespace App\Jobs;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class SaveRequestData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $ip, $user_agent, $request_made_at, $headers;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($ip, $user_agent, $request_made_at, $headers)
    {
        $this->ip = $ip;
        $this->user_agent = $user_agent;
        $this->request_made_at = $request_made_at;
        $this->headers = $headers;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        \App\Models\Request::create([
            'ipAddress' => $this->ip,
            'userAgent' => $this->user_agent,
            'requestMadeAt' => $this->request_made_at,
            'headers' => json_encode($this->headers)
        ]);
    }
}
