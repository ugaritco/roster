<?php

declare(strict_types=1);

namespace Ugarit\Roster\Enums;

enum Editor: string
{
    case PhpStorm = 'phpstorm';
    case VsCode = 'vscode';
    case Zed = 'zed';
    case SublimeText = 'sublime-text';
}
