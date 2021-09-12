<?php

namespace CodeDistortion\LaravelHelpers\Test\IntegrationTests\StringableMacros;

use CodeDistortion\LaravelHelpers\Test\IntegrationTestCase;
use CodeDistortion\LaravelHelpers\Test\TestTraits\UnspaceDataProviderTrait;
use Illuminate\Support\Str;

/**
 * Test the unspace macro's integration with Stringable.
 *
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */
class UnspaceTest extends IntegrationTestCase
{
    use UnspaceDataProviderTrait;

    /**
     * Test the Stringable::unspace macro.
     *
     * @test
     * @dataProvider stringableDataProvider
     * @param string          $expected The expected output.
     * @param string          $string   The input string.
     * @param array<string[]> $params   The parameters to pass.
     * @return void
     */
    public function test_stringable_unspace_macro(string $expected, string $string, array $params): void
    {
        $outcome = (string) match (count($params)) {
            0 => Str::of($string)->unspace(),
            1 => Str::of($string)->unspace($params[0]),
            default => Str::of($string)->unspace($params[0], $params[1]),
        };
        $this->assertSame($expected, $outcome);
    }
}
