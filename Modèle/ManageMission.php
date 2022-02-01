<?php

class ManageMission
{
    private $mission;

    public function getMission()
    {
        return $this->mission;
    }

    public function setMission(Mission $mission)
    {
        $this->mission[] = $mission;
    }
}
