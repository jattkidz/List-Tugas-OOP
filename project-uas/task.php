<?php

class Task
{
    private $taskId;
    private $taskName;
    private $completed;

    public function __construct($taskId, $taskName, $completed = false)
    {
        $this->taskId = $taskId;
        $this->taskName = $taskName;
        $this->completed = $completed;
    }

    public function getTaskId()
    {
        return $this->taskId;
    }

    public function getTaskName()
    {
        return $this->taskName;
    }

    public function isCompleted()
    {
        return $this->completed;
    }

    public function completeTask()
    {
        $this->completed = true;
    }

    public function toArray()
    {
        return [
            'taskId' => $this->taskId,
            'taskName' => $this->taskName,
            'completed' => $this->completed,
        ];
    }
}
?>
