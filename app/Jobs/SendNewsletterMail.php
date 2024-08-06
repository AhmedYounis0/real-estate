<?php

namespace App\Jobs;

use App\Mail\SubscribeCreateMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewsletterMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
//    public string $email;
//    public array $data;
//
//    public function __construct(string $email, array $data)
//    {
//        $this->email = $email;
//        $this->data = $data;
//    }
//
//    public function handle(): void
//    {
//        Mail::to($this->email)->send(new SubscribeCreateMail($this->data));
//    }
}
