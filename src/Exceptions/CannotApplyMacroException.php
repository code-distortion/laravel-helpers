<?php

namespace CodeDistortion\LaravelHelpers\Exceptions;

use Exception;

/**
 * The exception thrown when a macro cannot be applied to a class.
 */
class CannotApplyMacroException extends Exception
{
    /**
     * Thrown when a method with the same name as a new macro already exists.
     *
     * @param string $macro The macro being applied.
     * @param string $class The class being applied to.
     * @return self
     */
    public static function methodAlreadyExists(string $macro, string $class): self
    {
        return new self(
            "The MACRO \"$macro\" cannot be assigned to $class because it already exists as a method"
        );
    }
}
