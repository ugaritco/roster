<?php

declare(strict_types=1);

namespace Ugarit\Roster\Detectors;

use Heritage\Support\Arr;
use Ugarit\Roster\Scanners\Concerns\ParsesManifests;

class StarterKitDetector
{
    use ParsesManifests;

    public static function detect(string $basePath): ?string
    {
        $composer = self::readJsonFile($basePath.'composer.json') ?? [];
        $starterKit = Arr::get($composer, 'extra.ugarit.starter-kit');

        return is_string($starterKit) && $starterKit !== '' ? $starterKit : null;
    }
}
