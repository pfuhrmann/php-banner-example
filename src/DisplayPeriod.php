<?php

namespace Mercari;

/**
 * Display period value object
 */
class DisplayPeriod
{
    /**
     * @var string
     */
    private $startTime;

    /**
     * @var string
     */
    private $endTime;

    public function construct__(string $startTime, string $endTime)
    {
        $this->startTime = $startTime;
        $this->endTime = $endTime;
    }

    public function getStartTime(): string
    {
        return $this->startTime;
    }

    public function getEndTime(): string
    {
        return $this->endTime;
    }
}
