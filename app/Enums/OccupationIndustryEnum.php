<?php

namespace App\Enums;



enum OccupationIndustryEnum: string
{
    case AGRICULTURE = 'Agriculture';
    case MINING = 'Mining';
    case CONSTRUCTION = 'Construction';
    case MANUFACTURING = 'Manufacturing';
    case WHOLESALE = 'Wholesale';
    case RETAIL = 'Retail';
    case TRANSPORTATION = 'Transportation';
    case INFORMATION = 'Information';
    case FINANCE = 'Finance';
    case REAL_ESTATE = 'Real Estate';
    case PROFESSIONAL = 'Professional';
    case EDUCATION = 'Education';
    case HEALTH_CARE = 'Health Care';
    case ARTS = 'Arts';
    case ENTERTAINMENT = 'Entertainment';
    case FOOD = 'Food';
    case OTHER = 'Other';

    /**
     * Get all cases as an associative array.
     */
    public static function labels(): array
    {
        return [
            self::AGRICULTURE->value => 'Agriculture',
            self::MINING->value => 'Mining',
            self::CONSTRUCTION->value => 'Construction',
            self::MANUFACTURING->value => 'Manufacturing',
            self::WHOLESALE->value => 'Wholesale',
            self::RETAIL->value => 'Retail',
            self::TRANSPORTATION->value => 'Transportation',
            self::INFORMATION->value => 'Information',
            self::FINANCE->value => 'Finance',
            self::REAL_ESTATE->value => 'Real Estate',
            self::PROFESSIONAL->value => 'Professional',
            self::EDUCATION->value => 'Education',
            self::HEALTH_CARE->value => 'Health Care',
            self::ARTS->value => 'Arts',
            self::ENTERTAINMENT->value => 'Entertainment',
            self::FOOD->value => 'Food',
            self::OTHER->value => 'Other',
        ];
    }
}
