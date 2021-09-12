<?php

namespace CodeDistortion\LaravelHelpers;

use CodeDistortion\LaravelHelpers\Exceptions\CannotApplyMacroException;
use CodeDistortion\LaravelHelpers\StrMacros\UnspaceMacro;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

/**
 * Register Str macros.
 */
class StrServiceProvider extends ServiceProvider
{
    /**
     * Register the macros.
     *
     * @return void
     * @throws CannotApplyMacroException Thrown when a macro cannot be applied.
     */
    public function register()
    {
        foreach ($this->macros() as $macro => $class) {
            $this->checkForMethod(Str::class, $macro);
            Str::macro($macro, (new $class())());
        }
    }

    /**
     * Generate the list of macros to register.
     *
     * @return string[]
     */
    public function macros(): array
    {
        return [
            'unspace' => UnspaceMacro::class,
        ];
    }

    /**
     * Check to make sure that a class doesn't already have a particular method.
     *
     * @param string $class  The class to check against.
     * @param string $method The method to check for.
     * @return void
     * @throws CannotApplyMacroException Thrown when a method already exists in the class.
     */
    private function checkForMethod(string $class, string $method): void
    {
        if (method_exists($class, $method)) {
            throw CannotApplyMacroException::methodAlreadyExists($method, $class);
        }
    }
}
