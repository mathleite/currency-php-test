<?php

namespace helpers;

final class ArrayHelper
{
    public static function getClosest($search, array $arr)
    {
        $closest = null;
        foreach ($arr as $item) {
            if ($closest === null || abs($search - $closest) > abs($item - $search)) {
                $closest = $item;
            }
        }
        return $closest;
    }

    public static function getClosestMinor($search, array $arr)
    {
        $closest = self::getClosest($search, $arr);

        if ($closest > $search) {
            $closestLocation = array_search($closest, $arr);
            return $arr[$closestLocation - 1];
        }
        return  $closest;
    }
}