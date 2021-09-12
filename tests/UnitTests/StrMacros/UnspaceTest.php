<?php

namespace CodeDistortion\LaravelHelpers\Test\UnitTests\StrMacros;

use CodeDistortion\LaravelHelpers\StrMacros\UnspaceMacro;
use CodeDistortion\LaravelHelpers\Test\TestTraits\UnspaceDataProviderTrait;
use PHPUnit\Framework\TestCase;

/**
 * Test the unspace macro directly.
 *
 * @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
 */
class UnspaceTest extends TestCase
{
    use UnspaceDataProviderTrait;

    /**
     * Test the unspace macro directly.
     *
     * @test
     * @dataProvider stringableDataProvider
     * @param string          $expected The expected output.
     * @param string          $string   The input string.
     * @param array<string[]> $params   The parameters to pass.
     * @return void
     */
    public function test_unspace_macro(string $expected, string $string, array $params): void
    {
        $macro = (new UnspaceMacro())();
        $outcome = match (count($params)) {
            0 => $macro($string),
            1 => $macro($string, $params[0]),
            default => $macro($string, $params[0], $params[1]),

        };
        $this->assertSame($expected, $outcome);
    }
}
