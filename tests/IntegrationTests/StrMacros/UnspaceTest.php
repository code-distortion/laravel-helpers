<?php

namespace CodeDistortion\LaravelHelpers\Test\IntegrationTests\StrMacros;

use CodeDistortion\LaravelHelpers\Test\IntegrationTestCase;
use CodeDistortion\LaravelHelpers\Test\TestTraits\UnspaceDataProviderTrait;
use Illuminate\Support\Str;

/**
 * Test the unspace macro's integration with Str.
 *
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */
class UnspaceTest extends IntegrationTestCase
{
    use UnspaceDataProviderTrait;

    /**
     * Test the Str::unspace macro.
     *
     * @test
     * @dataProvider stringableDataProvider
     * @param string          $expected The expected output.
     * @param string          $string   The input string.
     * @param array<string[]> $params   The parameters to pass.
     * @return void
     */
    static public function test_str_unspace_macro(string $expected, string $string, array $params): void
    {
        $outcome = match (count($params)) {
            0 => Str::unspace($string),
            1 => Str::unspace($string, $params[0]),
            default => Str::unspace($string, $params[0], $params[1]),
        };
        self::assertSame($expected, $outcome);
    }
}
