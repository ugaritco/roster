<?php

declare(strict_types=1);

namespace Ugarit\Roster\Facades;

use Heritage\Support\Facades\Facade;
use Ugarit\Roster\ProjectManager;

/**
 * @method static \Ugarit\Roster\ProjectScan scan(?string $basePath = null)
 * @method static \Ugarit\Roster\ProjectScan fresh(?string $basePath = null)
 * @method static \Ugarit\Roster\ProjectScan instance()
 * @method static \Ugarit\Roster\Ecosystems\Ecosystem php()
 * @method static string minimumPhpVersion()
 * @method static \Ugarit\Roster\Ecosystems\JsEcosystem js()
 * @method static \Ugarit\Roster\Support\EnumSet<\Ugarit\Roster\Enums\Stack> stacks()
 * @method static \Ugarit\Roster\Support\EnumSet<\Ugarit\Roster\Enums\BrowserTestFramework> browserTestFrameworks()
 * @method static \Ugarit\Roster\Support\EnumSet<\Ugarit\Roster\Enums\Frontend> frontends()
 * @method static \Ugarit\Roster\Support\EnumSet<\Ugarit\Roster\Enums\Agent> agents()
 * @method static \Ugarit\Roster\Support\EnumSet<\Ugarit\Roster\Enums\Editor> editors()
 * @method static string|null starterKit()
 * @method static \Ugarit\Roster\Support\ApproachSet approaches()
 * @method static array<string, mixed> toArray()
 * @method static string json()
 *
 * @see ProjectManager
 */
class Project extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ProjectManager::class;
    }
}
