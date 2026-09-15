<?php

declare(strict_types=1);

use Ugarit\Roster\Detectors\StarterKitDetector;
use Ugarit\Roster\ProjectScan;

it('detects the declared starter kit', function (): void {
    $base = tempBase();
    file_put_contents($base.'composer.json', json_encode([
        'extra' => ['ugarit' => ['starter-kit' => 'ugarit/agent-kit']],
    ]));

    expect(StarterKitDetector::detect($base))->toBe('ugarit/agent-kit');
});

it('exposes the starter kit through the project scan', function (): void {
    $base = tempBase();
    file_put_contents($base.'composer.json', json_encode([
        'extra' => ['ugarit' => ['starter-kit' => 'ugarit/agent-kit']],
    ]));

    $project = ProjectScan::scan($base);

    expect($project->starterKit())->toBe('ugarit/agent-kit')
        ->and($project->toArray()['starterKit'])->toBe('ugarit/agent-kit')
        ->and(unserialize(serialize($project))->starterKit())->toBe('ugarit/agent-kit');
});

it('unserializes a payload cached before starter kit detection', function (): void {
    $base = tempBase();
    file_put_contents($base.'composer.json', json_encode([
        'extra' => ['ugarit' => ['starter-kit' => 'ugarit/agent-kit']],
    ]));

    $properties = ProjectScan::scan($base)->__serialize();
    unset($properties['starterKit']);

    $restored = (new ReflectionClass(ProjectScan::class))->newInstanceWithoutConstructor();
    $restored->__unserialize($properties);

    expect($restored->starterKit())->toBeNull();
});

it('returns null without a composer.json', function (): void {
    expect(StarterKitDetector::detect(tempBase()))->toBeNull();
});

it('returns null when composer.json is malformed', function (): void {
    $base = tempBase();
    file_put_contents($base.'composer.json', '{not json');

    expect(StarterKitDetector::detect($base))->toBeNull();
});

it('returns null without a starter kit declaration', function (): void {
    $base = tempBase();
    file_put_contents($base.'composer.json', json_encode([
        'extra' => ['ugarit' => ['dont-discover' => []]],
    ]));

    expect(StarterKitDetector::detect($base))->toBeNull();
});

it('returns null for declarations that are not a non-empty string', function (mixed $value): void {
    $base = tempBase();
    file_put_contents($base.'composer.json', json_encode([
        'extra' => ['ugarit' => ['starter-kit' => $value]],
    ]));

    expect(StarterKitDetector::detect($base))->toBeNull();
})->with([[''], [123], [['ugarit/agent-kit']], [true], [null]]);
