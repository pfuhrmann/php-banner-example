<?php

namespace Mercari;

use Carbon\Carbon;

/**
 * Display period value object
 */
class DisplayPeriod
{
    /**
     * @var Carbon
     */
    private $startDate;

    /**
     * @var Carbon
     */
    private $endDate;

    public function __construct(Carbon $startDate, Carbon $endDate)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getStartDate(): Carbon
    {
        return $this->startDate;
    }

    public function getEndDate(): Carbon
    {
        return $this->endDate;
    }
}
