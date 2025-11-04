<?php

namespace Omaressaouaf\LaravelIdGenerator;

use Illuminate\Support\Facades\Facade;

/**
 * @method static string generateFromConfig(string $generatorName)
 * @method static string generate(string $modelOrTable, string $field = 'id', int $paddingLength = 5, ?string $prefix = '', ?string $suffix = '', ?int $initialStartingPoint = 1)
 *
 * @see \Omaressaouaf\LaravelIdGenerator\IdGeneratorFactory
 */
class IdGenerator extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'id-generator';
    }
}
