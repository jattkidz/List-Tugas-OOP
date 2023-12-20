<?php

require_once('task.php');

class TaskManager
{
    protected $tasks = [];
    private $file = 'tasks.json';

    public function __construct()
    {
        $this->loadTasks();
    }

    private function loadTasks()
    {
        if (file_exists($this->file)) {
            $tasksData = json_decode(file_get_contents($this->file), true);

            foreach ($tasksData as $taskData) {
                $this->tasks[] = new Task($taskData['taskId'], $taskData['taskName'], $taskData['completed']);
            }
        }
    }

    public function addTask($taskName)
    {
        $taskId = uniqid();
        $task = new Task($taskId, $taskName);
        $this->tasks[] = $task;
        $this->saveTasks();
    }

    public function completeTask($taskId)
    {
        if (isset($this->tasks[$taskId])) {
            $this->tasks[$taskId]->completeTask();
            $this->saveTasks();
        }
    }

    public function removeTask($taskId)
    {
        if (isset($this->tasks[$taskId])) {
            unset($this->tasks[$taskId]);
            $this->saveTasks();
        }
    }

    public function removeCompletedTasks()
    {
        $this->tasks = array_filter($this->tasks, function ($task) {
            return !$task->isCompleted();
        });

        $this->saveTasks();
    }

    public function getTasks()
    {
        return $this->tasks;
    }

    protected function saveTasks()
    {
        $tasksData = [];
        foreach ($this->tasks as $task) {
            $tasksData[] = $task->toArray();
        }

        file_put_contents($this->file, json_encode($tasksData, JSON_PRETTY_PRINT));
    }
}
?>
