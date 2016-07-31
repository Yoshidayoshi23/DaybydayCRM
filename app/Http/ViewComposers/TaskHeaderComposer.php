<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Repositories\Task\TaskRepositoryContract;

class taskHeaderComposer
{
    /**
     * The task repository implementation.
     *
     * @var taskRepository
     */
    protected $tasks;

    /**
     * Create a new profile composer.
     *
     * @param  taskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepositoryContract $tasks)
    {
        $this->tasks = $tasks;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $tasks = $this->tasks->find($view->getData()['tasks']['id']);
        /**
         * [User assigned the task]
         * @var contact
         */
       
        $contact = $tasks->assignee;
        $client = $tasks->clientAssignee;
        
        $view->with('contact', $contact);
        $view->with('client', $client);

    }
}