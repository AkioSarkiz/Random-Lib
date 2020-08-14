<?php

namespace Tests;

use Exception;
use PHPUnit\Framework\TestCase;
use Random\Random;

class RandomTest extends TestCase
{
    /** @var Random */
    protected $random;

    protected $countAttempts = 1000;
    protected $countAttemptsCrypt = 100000;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->random = new Random();
    }

    /**
     * @test
     * @return void
     */
    public function int(): void
    {
        $min = 0;
        $max = 10;

        for ($i = 0; $i < $this->countAttempts; $i++) {
            $int = $this->random->int($min, $max);
            $this->assertIsInt($int);
            $this->assertGreaterThanOrEqual($min, $int);
            $this->assertGreaterThanOrEqual($int, $max);
        }
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function crypt_int(): void
    {
        $min = 0;
        $max = 10;

        for ($i = 0; $i < $this->countAttemptsCrypt; $i++) {
            $int = $this->random->crypt_int($min, $max);
            $this->assertIsInt($int);
            $this->assertGreaterThanOrEqual($min, $int);
            $this->assertGreaterThanOrEqual($int, $max);
        }
    }

    /**
     * @test
     * @return void
     */
    public function string(): void
    {
        $length = 50;
        $string = $this->random->string($length, '0123456789');
        $this->assertIsString($string);
        $this->assertSame(strlen($string), $length);
        $this->assertRegExp('/[0-9]+/', $string);

        $length = 100;
        $string = $this->random->string($length, 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm');
        $this->assertIsString($string);
        $this->assertSame(strlen($string), $length);
        $this->assertRegExp('/\w+/', $string);

        $length = 10;
        $string = $this->random->string($length, 'abs');
        $this->assertIsString($string);
        $this->assertSame(strlen($string), $length);
        $this->assertRegExp('/[abs]+/', $string);
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function crypt_string(): void
    {
        $length = 10;
        $string = $this->random->crypt_string($length, '0123456789');
        $this->assertIsString($string);
        $this->assertSame(strlen($string), $length);
        $this->assertRegExp('/[0-9]+/', $string);

        $length = 100;
        $string = $this->random->crypt_string($length, 'QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm');
        $this->assertIsString($string);
        $this->assertSame(strlen($string), $length);
        $this->assertRegExp('/\w+/', $string);

        $length = 10;
        $string = $this->random->crypt_string($length, 'abs');
        $this->assertIsString($string);
        $this->assertSame(strlen($string), $length);
        $this->assertRegExp('/[abs]+/', $string);
    }

    /**
     * @test
     * @return void
     */
    public function float(): void
    {
        $min = 0.0;
        $max = 10.0;

        for ($i = 0; $i < $this->countAttempts; $i++) {
            $int = $this->random->float($min, $max);
            $this->assertIsFloat($int);
            $this->assertGreaterThanOrEqual($min, $int);
            $this->assertGreaterThanOrEqual($int, $max);
        }
    }

    /**
     * @test
     * @return void
     * @throws Exception
     */
    public function crypt_float(): void
    {
        $min = 0.0;
        $max = 10.0;

        for ($i = 0; $i < $this->countAttempts; $i++) {
            $int = $this->random->crypt_float($min, $max);
            $this->assertIsFloat($int);
            $this->assertGreaterThanOrEqual($min, $int);
            $this->assertGreaterThanOrEqual($int, $max);
        }
    }
}
