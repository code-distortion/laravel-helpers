<?php

namespace CodeDistortion\LaravelHelpers\Helpers;

/**
 * Various string helper methods.
 */
class StringHelpers
{

    /**
     * Constructor - stop this class from being instantiated.
     */
    protected function __construct()
    {
    }

    /**
     * Trim and remove doubled-up whitespace.
     *
     * @param string $string      The string to process.
     * @param string $chars       The characters to process/trim.
     * @param string $replacement The string to replace instances with.
     * @return string
     */
    public static function unspace(string $string, string $chars = '', string $replacement = ''): string
    {
        // use specified chars, or all whitespace
        $regex = mb_strlen($chars)
            ? '/[' . preg_quote($chars) . ']+/'
            : '/\s+/';

        // use the replacement if specified,
        // otherwise use the same char that's being replaced
        // - or if more than one char is being replaced, use a space
        $replacement = func_num_args() == 3
            ? $replacement
            : (mb_strlen($chars) == 1 ? $chars : ' ');

        $string = mb_strlen($chars)
            ? trim($string, $chars)
            : trim($string);

        return (string) preg_replace($regex, $replacement, $string);
    }
}
