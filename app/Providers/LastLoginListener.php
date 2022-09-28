<?php

namespace App\Providers;


use App\Providers\Logined;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast;
use Illuminate\Support\Carbon;


class LastLoginListener
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
     * @param  \App\Providers\Logined  $event
     * @return void
     */
    public function handle(Logined $event)
    {
        $user = Auth::user();
        $user->last_login= Carbon::now();
        $user->save();
    }
}
