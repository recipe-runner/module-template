<?php

/*
 * This file is part of the Recipe Runner module "name".
 *
 * (c) Your Name <http://your-url.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RecipeRunner\ModuleName\Test;

use PHPUnit\Framework\TestCase;
use RecipeRunner\RecipeRunner\IO\IOInterface;
use RecipeRunner\RecipeRunner\Module\Invocation\ExecutionResult;
use RecipeRunner\RecipeRunner\Module\Invocation\Method;
use RecipeRunner\ModuleName\ModuleClass;
use Yosymfony\Collection\MixedCollection;

class ModuleClassTest extends TestCase
{
    /** @var ModuleClass */
    private $module;

    public function setUp(): void
    {
        $IOMock = $this->getMockBuilder(IOInterface::class)->getMock();
        $this->module = new ModuleClass();
        $this->module->setIO($IOMock);
    }

    public function testMethodPrint()
    {
        $message = 'hi';
        $method = new Method('print');
        $method->addParameter('message', $message);

        $executionResult = $this->module->runMethod($method, new MixedCollection());
        
        $this->assertEquals([
            'message' => $message
        ], $this->getResultAsArray($executionResult));

        $this->assertTrue($executionResult->isSuccess());
    }

    private function getResultAsArray(ExecutionResult $result): array
    {
        return \json_decode($result->getJsonResult(), true);
    }
}
