<?php

namespace Romulodl;

class Jma
{
	/**
	 * Calculate the JMA based on this formula from everget tradingview indicator
	 * https://www.tradingview.com/script/nZuBWW9j-Jurik-Moving-Average/
	 */
	public function calculate(
		array $values,
		int $period = 7,
		int $phase = 50,
		float $power = 2
	) : array
	{
		if (empty($values) || count($values) < $period) {
			throw new \Exception('[' . __METHOD__ . '] $values parameters is empty');
		}

		$beta = 0.45 * ($period - 1) / (0.45 * ($period - 1) + 2);
		$alpha = pow($beta, $power);
		$phase = $phase < -100 ? 0.5 : ($phase > 100 ? 2.5 : $phase / 100 + 1.5);
		$ma1 = $det0 = $det1 = $ma2 = $jma = 0;
		$return = [];
		foreach ($values as $value) {
			if ( !is_numeric($value)) {
				throw new \Exception('[' . __METHOD__ . '] invalid value: '. $value);
			}

			$ma1  = (1 - $alpha) * $value + $alpha * $ma1;
			$det0 = ($value - $ma1) * (1 - $beta) + $beta * $det0;
			$ma2  = $ma1 + $phase * $det0;
			$det1 = ($ma2 - $jma) * pow(1 - $alpha, 2) + pow($alpha, 2) * $det1;
			$jma  = $jma + $det1;
			$return[] = $jma;
		}

		return array_reverse($return);
	}
}
