<?php

declare(strict_types=1);

namespace Ugarit\Roster\Detectors\Approaches;

use Ugarit\Roster\ApproachResult;
use Ugarit\Roster\Enums\Approach;
use Ugarit\Roster\Support\SourceFiles;

class CommandSignatureSyntax extends Convention
{
    protected function result(SourceFiles $files): ?ApproachResult
    {
        return $this->electByFile($files, 'Commands', fn (string $contents): array => [
            Approach::CommandAttributeSyntax->value => (int) preg_match_all('/#\[\s*AsCommand\b/', $contents),
            Approach::CommandPropertySyntax->value => (int) preg_match_all('/protected\s+(?:\S+\s+)*\$(?:signature|description)\b\s*=/', $contents),
        ]);
    }
}
