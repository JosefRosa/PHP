<?php

class Conversion
{
    public static function convert($value, $from, $to)
    {
        if ($from === 'int' && $to === 'string') {
            return (string) $value;
        } elseif ($from === 'int' && $to === 'float') {
            return (float) $value;
        } elseif ($from === 'int' && $to === 'bool') {
            return (bool) $value;
        } elseif ($from === 'string' && $to === 'int') {
            return (int) $value;
        } elseif ($from === 'string' && $to === 'float') {
            return (float) $value;
        } elseif ($from === 'string' && $to === 'bool') {
            return (bool) $value;
        } elseif ($from === 'float' && $to === 'int') {
            return (int) $value;
        } elseif ($from === 'float' && $to === 'string') {
            return (string) $value;
        } elseif ($from === 'float' && $to === 'bool') {
            return (bool) $value;
        } elseif ($from === 'bool' && $to === 'int') {
            return (int) $value;
        } elseif ($from === 'bool' && $to === 'string') {
            return (string) $value;
        } elseif ($from === 'bool' && $to === 'float') {
            return (float) $value;
        }

        return $value;
    }
}

$dataTypes = ['int', 'string', 'float', 'bool'];
$setValues = [64, 12.4, 0];

foreach ($setValues as $value) {
    foreach ($dataTypes as $from) {
        foreach ($dataTypes as $to) {
            $convertedValue = Conversion::convert($value, $from, $to);
            echo "$from to $to (Value = $value) = $convertedValue\n";
        }
    }
}
