<?php

namespace App\Http\Enum;

enum DateTimeZone: string
{
  case UTC = 'UTC';
  case AoE = 'AoE';
  case NUT = 'NUT';
  case HST = 'HST';
  case HDT = 'HDT';
  case PST = 'PST';
  case MST = 'MST';
  case CST = 'CST';
  case EST = 'EST';
  case VET = 'VET';
  case ADT = 'ADT';
  case GST = 'GST';
  case EGT = 'EGT';
  case GMT = 'GMT';
  case CET = 'CET';
  case EET = 'EET';
  case MSK = 'MSK';
  case GET = 'GET';
  case IST = 'IST';
  case BST = 'BST';
  case WIB = 'WIB';
  case HKT = 'HKT';
  case JST = 'JST';
  case AEST = 'AEST';
  case SBT = 'SBT';
  case TVT = 'TVT';

  public function label(): string
  {
    return match ($this) {
      self::UTC => 'UTC',
      self::AoE => 'Anywhere on Earth (AoE)',
      self::NUT => 'Niue Time (NUT)',
      self::HST => 'Hawaii-Aleutian Standard Time (HST)',
      self::HDT => 'Hawaii-Aleutian Daylight Time (HDT)',
      self::PST => 'Pacific Standard Time (PST)',
      self::MST => 'Mountain Standard Time (MST)',
      self::CST => 'Central Standard Time (CST)',
      self::EST => 'Eastern Standard Time (EST)',
      self::VET => 'Venezuelan Standard Time (VET)',
      self::ADT => 'Atlantic Daylight Time (ADT)',
      self::GST => 'Greenwich Standard Time (GST)',
      self::EGT => 'Eastern Greenland Time (EGT)',
      self::GMT => 'Greenwich Mean Time (GMT)',
      self::CET => 'Central European Time (CET)',
      self::EET => 'Eastern European Time (EET)',
      self::MSK => 'Moscow Standard Time (MSK)',
      self::GET => 'Georgia Standard Time (GET)',
      self::IST => 'India Standard Time (IST)',
      self::BST => 'Bangladesh Standard Time (BST)',
      self::WIB => 'Western Indonesian Time (WIB)',
      self::HKT => 'Hong Kong Time (HKT)',
      self::JST => 'Japan Standard Time (JST)',
      self::AEST => 'Australian Eastern Standard Time (AEST)',
      self::SBT => 'Solomon Islands Time (SBT)',
      self::TVT => 'Tuvalu Time (TVT)',
    };
  }

  public function offset(): string
  {
    return match ($this) {
      self::UTC => 'UTC+00:00',
      self::AoE => 'UTC-12:00',
      self::NUT => 'UTC-11:00',
      self::HST => 'UTC-10:00',
      self::HDT => 'UTC-09:00',
      self::PST => 'UTC-08:00',
      self::MST => 'UTC-07:00',
      self::CST => 'UTC-06:00',
      self::EST => 'UTC-05:00',
      self::VET => 'UTC-04:00',
      self::ADT => 'UTC-03:00',
      self::GST => 'UTC-02:00',
      self::EGT => 'UTC-01:00',
      self::GMT => 'UTC+00:00',
      self::CET => 'UTC+01:00',
      self::EET => 'UTC+02:00',
      self::MSK => 'UTC+03:00',
      self::GET => 'UTC+04:00',
      self::IST => 'UTC+05:30',
      self::BST => 'UTC+06:00',
      self::WIB => 'UTC+07:00',
      self::HKT => 'UTC+08:00',
      self::JST => 'UTC+09:00',
      self::AEST => 'UTC+10:00',
      self::SBT => 'UTC+11:00',
      self::TVT => 'UTC+12:00',
    };
  }

  public function offsetHours(): float
  {
    return match ($this) {
      self::UTC => 0.0,
      self::AoE => -12.0,
      self::NUT => -11.0,
      self::HST => -10.0,
      self::HDT => -9.0,
      self::PST => -8.0,
      self::MST => -7.0,
      self::CST => -6.0,
      self::EST => -5.0,
      self::VET => -4.0,
      self::ADT => -3.0,
      self::GST => -2.0,
      self::EGT => -1.0,
      self::GMT => 0.0,
      self::CET => +1.0,
      self::EET => +2.0,
      self::MSK => +3.0,
      self::GET => +4.0,
      self::IST => +5.5,
      self::BST => +6.0,
      self::WIB => +7.0,
      self::HKT => +8.0,
      self::JST => +9.0,
      self::AEST => +10.0,
      self::SBT => +11.0,
      self::TVT => +12.0,
    };
  }
}
