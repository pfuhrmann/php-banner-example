<?php

namespace Mercari;

class Banner
{
    /**
     * @var DisplayPeriod
     */
    public $displayPeriod;

    /**
     * @var array
     */
    private $conf;

    public function __construct(DisplayPeriod $displayPeriod, array $conf)
    {
        $this->displayPeriod = $displayPeriod;
        $this->conf = $conf;
    }

    public function isDisplayable(): bool
    {
        return true;
    }
}
