<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use Romulodl\Jma;

final class JmaTest extends TestCase
{
	public function testCalculateWithMorePreviousValues(): void
	{
		$val = require(__DIR__ . '/values.php');
		$values = [];
		foreach ($val as $v) {
			$values[] = $v[2];
		}

		$jma = new Jma();
		$series = $jma->calculate($values);
		$this->assertSame(8957.75, round($series[0], 2));
	}

	public function testCalculateEmaWithEmptyArray(): void
	{
		$this->expectException(Exception::class);

		$ema = new Jma();
		$ema->calculate([]);
	}

	public function testCalculateWithInvalidArray(): void
	{
		$values = [
			9148.27,
			9995,
			9807.49,
			'hahah',
			8719.53,
			8561.09,
			8808.71,
			9305.91,
			9786.80,
		];

		$this->expectException(Exception::class);

		$ema = new Jma();
		$ema->calculate($values);
	}
}
