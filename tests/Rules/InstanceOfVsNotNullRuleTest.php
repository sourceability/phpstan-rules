<?php

namespace Sourceability\PHPStan\Tests\Rules;

use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Testing\RuleTestCase;
use Sourceability\PHPStan\Rules\InstanceOfVsNotNullRule;

class InstanceOfVsNotNullRuleTest extends RuleTestCase
{
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/instanceof-vs-not-null.php'], [
            [
                'Replace "expr<Sourceability\PHPStan\Tests\Rules\data\Animal|null> instanceof Sourceability\PHPStan\Tests\Rules\data\Animal" with "null !== expr<Sourceability\PHPStan\Tests\Rules\data\Animal|null>"',
                15,
            ],
        ]);
    }

    protected function getRule(): Rule
    {
        return new InstanceOfVsNotNullRule(
            new RuleLevelHelper(
                $this->createReflectionProvider(),
                true,
                false,
                true,
                true
            )
        );
    }
}
