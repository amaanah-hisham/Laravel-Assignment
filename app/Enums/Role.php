<?php
namespace App\Enums;

enum Role: int {

    case SuperAdministrator = 1;
    case Moderator = 2;
    case RenteeManager = 3;
    case MarketingManager = 4;
    case SalesManager = 5;
    case RentalProcessManager = 6;
    case Rentee = 7;
    case Renter = 8;

}
