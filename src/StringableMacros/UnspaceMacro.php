<?php

namespace CodeDistortion\LaravelHelpers\StringableMacros;

use CodeDistortion\LaravelHelpers\Helpers\StringHelpers;
use Illuminate\Support\Stringable;

/**
 * Trim and remove doubled-up whitespace.
 *
 * @mixin Stringable
 */
class UnspaceMacro
{
    /**
     * Return the macro method.
     *
     * @return callable
     */
    public function __invoke(): callable
    {
        /**
         * Trim and remove doubled-up whitespace.
         *
         * @param string $chars       The characters to process/trim.
         * @param string $replacement The string to replace instances with.
         * @return Stringable
         */
        return function (string $chars = '', string $replacement = ''): Stringable {
            /** @var Stringable $this */
            $args = array_merge([(string) $this], func_get_args());
            $result = call_user_func_array([StringHelpers::class, 'unspace'], $args);
            return new Stringable($result);
        };
    }
}
