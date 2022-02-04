<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Collection;

class ProcessLowQuantityOrdersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(protected Collection $customersWithLowOrders)
    {
    }

    public function handle()
    {
        // The expected behaviour of this is that I'd see the same data returned when the job deserializes its data and
        // is executed, instead we'll see the top level models returned without any of the eager loaded relations.
        info(get_called_class());
        info($this->customersWithLowOrders);
    }
}
