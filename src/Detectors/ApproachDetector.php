<?php

declare(strict_types=1);

namespace Ugarit\Roster\Detectors;

use Ugarit\Roster\ApproachResult;
use Ugarit\Roster\Detectors\Approaches\AuthorizationStyle;
use Ugarit\Roster\Detectors\Approaches\AuthRetrievalStyle;
use Ugarit\Roster\Detectors\Approaches\CommandSignatureSyntax;
use Ugarit\Roster\Detectors\Approaches\Convention;
use Ugarit\Roster\Detectors\Approaches\EnumCasing;
use Ugarit\Roster\Detectors\Approaches\MassAssignment;
use Ugarit\Roster\Detectors\Approaches\ModelKeyStyle;
use Ugarit\Roster\Detectors\Approaches\NotificationSendStyle;
use Ugarit\Roster\Detectors\Approaches\ValidationStyle;
use Ugarit\Roster\Detectors\Approaches\ValidationSyntax;
use Ugarit\Roster\Support\SourceFiles;

class ApproachDetector
{
    public function __construct(protected SourceFiles $files)
    {
        //
    }

    /**
     * @return list<ApproachResult>
     */
    public static function detect(string $basePath): array
    {
        return (new self(new SourceFiles($basePath)))->all();
    }

    /**
     * @return list<Convention>
     */
    protected function conventions(): array
    {
        return [
            new MassAssignment,
            new EnumCasing,
            new ValidationSyntax,
            new ValidationStyle,
            new CommandSignatureSyntax,
            new NotificationSendStyle,
            new AuthorizationStyle,
            new AuthRetrievalStyle,
            new ModelKeyStyle,
        ];
    }

    /**
     * @return list<ApproachResult>
     */
    public function all(): array
    {
        $results = [];

        foreach ($this->conventions() as $convention) {
            $results = [...$results, ...$convention->detect($this->files)];
        }

        return $results;
    }
}
