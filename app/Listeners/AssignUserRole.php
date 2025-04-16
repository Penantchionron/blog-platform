<?php

namespace App\Listeners;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Registered;
use Spatie\Permission\Models\Role;
class AssignUserRole
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        $user = $event->user;

        if ($user->email === 'camarabobas@gmail.com') {
            $user->assignRole('admin');
        } else {
            $user->assignRole('user');
        }
    }
}
