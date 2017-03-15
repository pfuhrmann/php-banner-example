<?php

use Carbon\Carbon;
use Mercari\{Banner};
use PHPUnit\Framework\TestCase;

class BannerTest extends TestCase
{
    public function testIsDisplayableCorrectIpAndTime()
    {
        $conf = [
            Banner::CONF_ALLOWED_IPS => ['10.5.8.0', '10.5.8.1']
        ];
        $banner = new Banner('2017-03-01T15:00:00+09:00', '2017-03-02T15:00:00+09:00', $conf);

        $dateTime = Carbon::parse('2017-03-01T16:00:00+09:00');
        $this->assertTrue($banner->isDisplayable('10.5.8.0', $dateTime));

        $dateTime = Carbon::parse('2017-03-02T14:00:00+09:00');
        $this->assertTrue($banner->isDisplayable('10.5.8.0', $dateTime));
    }

    public function testIsDisplayableDefaultTimeNow()
    {
        $conf = [
            Banner::CONF_ALLOWED_IPS => ['10.5.8.0', '10.5.8.1']
        ];
        $startDate = Carbon::now()->subDay(1);
        $endDate = Carbon::now()->addDay(1);
        $banner = new Banner($startDate, $endDate, $conf);
        $this->assertTrue($banner->isDisplayable('10.5.8.0'));

        $banner = new Banner('2016-08-12T00:00:00+09:00', '2017-08-12T00:00:00+09:00');
        $this->assertFalse($banner->isDisplayable('10.5.8.0'));
    }

    public function testIsDisplayableDefaultIps()
    {
        $banner = new Banner('2016-08-12T00:00:00+09:00', '2017-08-12T00:00:00+09:00');
        $dateTime = Carbon::parse('2016-12-12T16:05:00+09:00');

        $this->assertTrue($banner->isDisplayable('10.0.0.1', $dateTime));
        $this->assertTrue($banner->isDisplayable('10.0.0.2', $dateTime));
        $this->assertFalse($banner->isDisplayable('10.0.1.2', $dateTime));
    }

    public function testNotDisplayableWrongIp()
    {
        $conf = [
            Banner::CONF_ALLOWED_IPS => ['10.5.8.0', '10.5.8.1']
        ];
        $banner = new Banner('2017-03-01T15:00:00+09:00', '2017-03-02T15:00:00+09:00', $conf);
        $dateTime = Carbon::parse('2017-03-01T16:00:00+09:00');

        $this->assertFalse($banner->isDisplayable('10.5.8.3', $dateTime));
        $this->assertFalse($banner->isDisplayable('9.0.1.2', $dateTime));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructInvalidArguments()
    {
        new Banner('2017-03-01T15:ss:00+09:00', '2017-03-02T15:00:00+09:00');
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testConstructStartDateLaterThanEndDate()
    {
        new Banner('2017-03-02T15:00:00+09:00', '2017-03-01T15:00:00+09:00');
    }
}
