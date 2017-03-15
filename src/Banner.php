<?php

namespace Mercari;

use Carbon\Carbon;
use Exception;
use InvalidArgumentException;

class Banner
{
    const ALLOWED_IPS_LIST = ['10.0.0.1', '10.0.0.2'];
    const CONF_ALLOWED_IPS = 'whitelist_ips';

    /**
     * @var DisplayPeriod
     */
    private $displayPeriod;

    /**
     * @var array
     */
    private $conf;

    /**
     * @param string $startDate
     * @param string $endDate
     *
     * @param array  $conf
     *
     * @throws InvalidArgumentException
     */
    public function __construct(string $startDate, string $endDate, array $conf = [])
    {
        try {
            $startDate = Carbon::parse($startDate);
            $endDate = Carbon::parse($endDate);
        } catch (Exception $e) {
            throw new InvalidArgumentException('Start date or end date format is invalid');
        }

        if ($endDate->lt($startDate)) {
            throw new InvalidArgumentException('End date cannot be sooner than start date');
        }

        $this->displayPeriod = new DisplayPeriod($startDate, $endDate);
        $this->conf = $conf;
    }

    /**
     * Returns whether banner is displayable
     *
     * @param string $userIp
     * @param Carbon $dateTime
     *
     * @return bool
     */
    public function isDisplayable(string $userIp, Carbon $dateTime = null): bool
    {
        $whitelist = $this->conf[self::CONF_ALLOWED_IPS] ?? self::ALLOWED_IPS_LIST;
        if (!in_array($userIp, $whitelist)) {
            return false;
        }

        $dateTime = $dateTime ?? Carbon::now();
        if (!$dateTime->between($this->displayPeriod->getStartDate(), $this->displayPeriod->getEndDate())) {
            return false;
        }

        return true;
    }
}
