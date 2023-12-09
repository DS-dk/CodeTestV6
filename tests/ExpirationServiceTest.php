<?php
use PHPUnit\Framework\TestCase;
use App\Services\ExpirationService;

class ExpirationServiceTest extends TestCase
{
    public function testWillExpireAt()
    {

        // That's a sampel we can define our timeline with timestamp

        // Assuming the current time is 2023-12-09 12:00:00
        $currentTime = strtotime('2023-12-09 12:00:00');

        // Create an instance of the ExpirationService
        $expirationService = new ExpirationService();

        // Test a timestamp in the future
        $futureTimestamp = strtotime('2023-12-10 12:00:00');
        $this->assertTrue($expirationService->willExpireAt($futureTimestamp, $currentTime));

        // Test a timestamp in the past
        $pastTimestamp = strtotime('2023-12-08 12:00:00');
        $this->assertFalse($expirationService->willExpireAt($pastTimestamp, $currentTime));

        // Test the current timestamp
        $this->assertFalse($expirationService->willExpireAt($currentTime, $currentTime));

        // Test with a small buffer (e.g., 1 second) to account for any possible delay
        $bufferedTimestamp = strtotime('2023-12-09 12:00:01');
        $this->assertTrue($expirationService->willExpireAt($bufferedTimestamp, $currentTime));
    }
}