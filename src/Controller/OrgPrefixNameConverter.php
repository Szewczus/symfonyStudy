<?php

namespace App\Controller;
use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

class OrgPrefixNameConverter implements NameConverterInterface
{

    public function normalize(string $propertyName): string
    {
        return 'org_'.$propertyName;
    }

    public function denormalize(string $propertyName): string
    {
        return 'org_' === substr($propertyName, 0, 4) ? substr($propertyName, 4) : $propertyName;
    }
}