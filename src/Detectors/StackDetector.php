<?php

declare(strict_types=1);

namespace Ugarit\Roster\Detectors;

use Ugarit\Roster\Ecosystems\Ecosystem;
use Ugarit\Roster\Ecosystems\JsEcosystem;
use Ugarit\Roster\Enums\Stack;

class StackDetector
{
    /** @var list<array{stack: Stack, packages: list<string>}> */
    private const INERTIA_RULES = [
        ['stack' => Stack::InertiaReact, 'packages' => ['@inertiajs/react']],
        ['stack' => Stack::InertiaVue, 'packages' => ['@inertiajs/vue3', '@inertiajs/vue']],
        ['stack' => Stack::InertiaSvelte, 'packages' => ['@inertiajs/svelte']],
    ];

    /**
     * @return list<Stack>
     */
    public static function detect(Ecosystem $php, JsEcosystem $js): array
    {
        $stacks = [];

        foreach (self::INERTIA_RULES as $rule) {
            foreach ($rule['packages'] as $package) {
                if ($js->usesDirect($package)) {
                    $stacks[] = $rule['stack'];

                    continue 2;
                }
            }
        }

        if ($php->usesDirect(['livewire/livewire', 'livewire/volt'])) {
            $stacks[] = Stack::Livewire;
        }

        $hasApi = $php->usesDirect(['ugarit/sanctum', 'ugarit/passport']);
        $hasViewLayer = $stacks !== [] || $php->usesDirect('ugarit/folio');

        if ($hasApi && ! $hasViewLayer) {
            $stacks[] = Stack::Api;
        }

        if ($stacks === [] && $php->usesDirect('ugarit/framework')) {
            $stacks[] = Stack::Blade;
        }

        return $stacks;
    }
}
