<?php

namespace App\Listeners;

use App\Events\ClientAction;
use App\Models\Activity;
use App\Models\Client;

class ClientActionLog
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param ClientAction $event
     */
    public function handle(ClientAction $event)
    {
        $client = $event->getClient();

        switch ($event->getAction()) {
            case 'created':
                $text = __('Client :company was assigned to :assignee', [
                    'company'  => $client->name,
                    'assignee' => $client->AssignedUser->name,
                ]);
                break;
            case 'updated_assign':
                $text = __(':username assigned client to :assignee', [
                    'username' => Auth()->user()->name,
                    'assignee' => $client->AssignedUser->name,
                ]);
                break;
            default:
                break;
        }

        $activityinput = array_merge(
            [
                'text'        => $text,
                'user_id'     => Auth()->id(),
                'source_type' => Client::class,
                'source_id'   => $client->id,
                'action'      => $event->getAction(),
            ]
        );

        Activity::create($activityinput);
    }
}
