<?php

declare(strict_types = 1);

namespace Random;

use Exception;
use InvalidArgumentException;

/**
 * Class Random
 * @package Random
 * @version 1.3
 */
class Random implements RandomInterface
{
    /** @var null|array */
    protected $cache_vocabulary = null;

    /**
     * @inheritDoc
     */
    public function int($min = 0, $max = 100): int
    {
        if ($min > $max) {
            throw new InvalidArgumentException('min > max');
        }

        return rand($min, $max);
    }

    /**
     * @inheritDoc
     */
    public function crypt_int($min = 0, $max = 100): int
    {
        if ($min > $max) {
            throw new InvalidArgumentException('min > max');
        }

        try {
            return random_int($min, $max);
        } catch (Exception $e) {
            throw $e;
        }
    }

    /**
     * @inheritDoc
     */
    public function string($length = 10, string $vocabulary = self::DEFAULT_VOCABULARY): string
    {
        $vocabulary_length = count($this->cache_vocabulary ?? []);
        if ($this->cache_vocabulary === null || $vocabulary_length !== strlen($vocabulary)) {
            $this->cache_vocabulary = str_split($vocabulary);
            $vocabulary_length = count($this->cache_vocabulary);
        }

        $result = '';
        for ($i = 0; $i < $length; $i++)
            $result .= $this->cache_vocabulary[$this->int(0, $vocabulary_length - 1)];
        return $result;
    }

    /**
     * @inheritDoc
     */
    public function crypt_string($length = 10, string $vocabulary = self::DEFAULT_VOCABULARY): string
    {
        if (function_exists('random_bytes')) {
            try {
                return substr(bin2hex(random_bytes($length)), 0, $length);
            } catch (Exception $e) {}
        }
        if (function_exists('openssl_random_pseudo_bytes')) {
            return substr(bin2hex(openssl_random_pseudo_bytes($length)), 0, $length);
        }

        throw new Exception('Please add php-openssl ext');
    }

    /**
     * @inheritDoc
     */
    public function float($min = 0.0, $max = 100.0): float
    {
        if ($min == 0 && $max == 0) {
            throw new InvalidArgumentException('min and max == 0');
        }

        $del = $this->int((int)$min, (int)$max);
        while ($del == 0) {
            $del = $this->int((int)$min, (int)$max);
        }

        return $this->int((int)$min, (int)$max) / $del;
    }

    /**
     * @inheritDoc
     */
    public function crypt_float($min = 0.0, $max = 100.0): float
    {
        try {
            if ($min == 0 && $max == 0) {
                throw new InvalidArgumentException('min and max == 0');
            }

            $del = $this->crypt_int((int)$min, (int)$max);
            while ($del == 0) {
                $del = $this->crypt_int((int)$min, (int)$max);
            }

            return $this->crypt_int((int)$min, (int)$max) / $del;
        } catch (Exception $e) {
            throw $e;
        }
    }
}