<?php
namespace App\Enums;

enum Role: int {
    
    case SuperAdministrator = 1;
    case Moderator = 2;
    case ProductOwnerManager = 3;
    case MarketingManager = 4;
    case SalesManager = 5;
    case RentalProcessManager = 6;
    case Customer = 7;

}