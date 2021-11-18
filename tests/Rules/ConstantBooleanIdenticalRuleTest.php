<?php

namespace Sourceability\PHPStan\Tests\Rules;

use PHPStan\Rules\BooleansInConditions\BooleanRuleHelper;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleLevelHelper;
use PHPStan\Testing\RuleTestCase;
use Sourceability\PHPStan\Rules\ConstantBooleanIdenticalRule;
use Sourceability\PHPStan\Rules\ConstantBooleanRuleHelper;

class ConstantBooleanIdenticalRuleTest extends RuleTestCase
{
    public function testRule(): void
    {
        $this->analyse([__DIR__ . '/data/conditions.php'], [
            [
                'Replace true === $boolean with $boolean',
                18,
            ],
            [
                'Replace $boolean === true with $boolean',
                23,
            ],
            [
                'Replace false === $boolean with !$boolean',
                28,
            ],
            [
                'Replace $boolean === false with !$boolean',
                33,
            ],
        ]);
    }

    protected function getRule(): Rule
    {
        $ruleLevelHelper = new RuleLevelHelper(
            $this->createReflectionProvider(),
            true,
            false,
            true,
            true
        );

        return new ConstantBooleanIdenticalRule(
            new ConstantBooleanRuleHelper($ruleLevelHelper),
            new BooleanRuleHelper($ruleLevelHelper)
        );
    }
}
