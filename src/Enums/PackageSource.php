<?php

declare(strict_types=1);

namespace Ugarit\Roster\Enums;

enum PackageSource: string
{
    case Composer = 'composer';
    case Npm = 'npm';
}
