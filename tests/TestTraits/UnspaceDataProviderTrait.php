<?php

namespace CodeDistortion\LaravelHelpers\Test\TestTraits;

/**
 * Adds a DataProvider for the various unspace tests.
 */
trait UnspaceDataProviderTrait
{
    /**
     * DataProvider for the various unspace tests.
     *
     * @return array{ array{string, string, string[]}}
     */
    public function stringableDataProvider(): array
    {
        return [
            ['', '    ', []],
            ['a', '  a  ', []],
            ['abc', 'abc', []],
            ['abc', ' abc ', []],
            ['a b c', ' a b c ', []],
            ['a b c', '  a  b  c  ', []],
            ['  a  b  c  ', '  a  b  c  ', ['b']],
            ['  a  b  c  ', '  a  bbbb  c  ', ['b']],
            ['  a  -  c  ', '  a  b  c  ', ['b', '-']],
            ['  a  -  c  ', '  a  bbbb  c  ', ['b', '-']],
            ['a-b-c', '  a  b  c  ', [' ', '-']],
            ['           ', '  a  b  c  ', ['abc']],
            ['  -  -  -  ', '  a  b  c  ', ['abc', '-']],
            ['  -  -  -  ', '  aa  bb  cc  ', ['abc', '-']],
            ['a b', " a \n b ", []],
            [" a \n b ", " a \n b ", ["\n"]],
            ["a b", " a \n b ", [" \n"]],
            ["a \n b", " a \n b ", [" "]],
        ];
    }
}
