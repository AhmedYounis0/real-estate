<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;

class CheckExpiredPackages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'package:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now();

        $expiredOrders = Order::where('expire_date','<',$now)
            ->where('status','active')
            ->with('properties')
            ->get();


        foreach ($expiredOrders as $order)
        {
            $order->status = 'expired';
            $order->save();

            foreach ($order->properties as $property)
            {
                $property->order_id = null;
                $property->is_featured = null;
                $property->save();
            }

        }

    }
}
