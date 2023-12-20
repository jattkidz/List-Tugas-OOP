<?php

require_once('taskmanager.php');
require_once('extendedtask.php');

class ExtendedTaskManager extends TaskManager
{
    public function addExtendedTask($taskName, $additionalInfo)
    {
        $taskId = uniqid();
        $extendedTask = new ExtendedTask($taskId, $taskName, false, $additionalInfo);
        $this->tasks[] = $extendedTask;
        $this->saveTasks();
    }
}
?>
