<?php

namespace CodeDistortion\LaravelHelpers\StrMacros;

use CodeDistortion\LaravelHelpers\Helpers\StringHelpers;
use Illuminate\Support\Str;

/**
 * Trim and remove doubled-up whitespace.
 *
 * @mixin Str
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
         * @param string $string      The string to process.
         * @param string $chars       The characters to process/trim.
         * @param string $replacement The string to replace instances with.
         * @return string
         */
        return function (string $string, string $chars = '', string $replacement = ''): string {
            return call_user_func_array([StringHelpers::class, 'unspace'], func_get_args());
        };
    }
}
