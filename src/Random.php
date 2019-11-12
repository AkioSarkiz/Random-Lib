<?php

declare(strict_types = 1);

namespace Lib;

use Exception;

class Random
{
    private static $vocabulary = "QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789";

    public static function getString(int $length): String
    {
        $resultString = "";
        for ($i=0; $i<$length; $i++)
        {
            try {
                $indexChar = random_int(0, strlen(self::$vocabulary) - 1);
                $resultString .= substr(self::$vocabulary, $indexChar, 1);
            } catch (Exception $e) {
                return self::getString($length);
            }

        }
        return $resultString;
    }

    public static function getInt(int $startInt, int $endInt): int
    {
        try {
            return random_int($startInt, $endInt);
        } catch (Exception $e) {
            return self::getInt($startInt, $endInt);
        }
    }

    /**
     * @param string $vocabulary
     */
    public static function setVocabulary(string $vocabulary): void
    {
        self::$vocabulary = $vocabulary;
    }
}