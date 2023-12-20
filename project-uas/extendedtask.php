<?php

require_once('task.php');

class ExtendedTask extends Task
{
    private $additionalInfo;

    public function __construct($taskId, $taskName, $completed = false, $additionalInfo)
    {
        parent::__construct($taskId, $taskName, $completed);
        $this->additionalInfo = $additionalInfo;
    }

    public function getAdditionalInfo()
    {
        return $this->additionalInfo;
    }
    public function toArray()
    {
        $parentData = parent::toArray();
        return array_merge($parentData, ['additional_info' => $this->additionalInfo]);
    }
}
?>
