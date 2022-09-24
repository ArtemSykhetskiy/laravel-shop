<?php
namespace App\Helpers\Enums;

enum OrdersStatuses: string
{
    case InProcess = "In process";
    case Paid = "Paid";
    case Completed = "Completed";
    case Canceled = "Canceled";

    public static function findByKey(string $key) {
        return constant("self::$key");
    }
}
