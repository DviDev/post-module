<?php

namespace Modules\Post\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\DBMap\Domains\ScanTableDomain;
use Modules\DBMap\Events\ScanTableEvent;

class ScanTablePostListener implements ShouldQueue
{
    public function handle(ScanTableEvent $event): void
    {
        (new ScanTableDomain)->scan('post', 'thread');
    }
}
