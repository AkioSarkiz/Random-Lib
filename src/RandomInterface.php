<?php

declare(strict_types=1);

namespace Random;

use Exception;
use InvalidArgumentException;

/**
 * Interface RandomInterface
 * @package Random
 * @version 1.3
 */
interface RandomInterface
{
    /**
     * Default vocabulary for random string methods.
     * @var string
     */
    const DEFAULT_VOCABULARY = 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789';

    /**
     * Get random int.
     *
     * @param int $min min value
     * @param int $max max value
     * @return int
     * @throws InvalidArgumentException
     */
    public function int($min = 0, $max = 100): int;

    /**
     * Get crypto security random int.
     *
     * @param int $min min value
     * @param int $max max value
     * @return int
     * @throws InvalidArgumentException|Exception
     */
    public function crypt_int($min = 0, $max = 100): int;

    /**
     * Get random string.
     *
     * @param int $length count length of string
     * @param string $vocabulary char for random string
     * @return string random string
     * @throws InvalidArgumentException
     */
    public function string($length = 10, string $vocabulary = self::DEFAULT_VOCABULARY): string;

    /**
     * Get crypto security random string.
     *
     * @param int $length count length of string
     * @param string $vocabulary char for random string
     * @return string random string
     * @throws Exception
     */
    public function crypt_string($length = 10, string $vocabulary = self::DEFAULT_VOCABULARY): string;

    /**
     * Get random float.
     *
     * @param float $min
     * @param float $max
     * @return float random float
     * @throws InvalidArgumentException
     */
    public function float($min = 0.0, $max = 100.0): float;

    /**
     * Get crypto security random float.
     *
     * @param float $min
     * @param float $max
     * @return float random float
     * @throws InvalidArgumentException|Exception
     */
    public function crypt_float($min = 0.0, $max = 100.0): float;
}
