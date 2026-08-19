<?php

namespace App\Scribe;

use Illuminate\Routing\Route;
use Knuckles\Scribe\Extracting\Strategies\BodyParameters\GetFromFormRequest;

class PortugueseBodyParametersFromFormRequest extends GetFromFormRequest
{
    /**
     * Translate descriptions that Scribe currently hard-codes in English.
     */
    public function getParametersFromFormRequest(\ReflectionFunctionAbstract $method, Route $route): array
    {
        $parameters = parent::getParametersFromFormRequest($method, $route);

        foreach ($parameters as &$parameter) {
            $parameter['description'] = preg_replace(
                '/Must be a valid date in the format <code>(.*?)<\/code>\./',
                'Deve ser uma data válida no formato <code>$1</code>.',
                $parameter['description'] ?? ''
            );
        }

        return $parameters;
    }
}
