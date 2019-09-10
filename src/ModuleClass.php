<?php

/*
 * This file is part of the Recipe Runner module "name".
 *
 * (c) Your Name <http://your-url.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RecipeRunner\ModuleName;

use RecipeRunner\RecipeRunner\Module\Invocation\ExecutionResult;
use RecipeRunner\RecipeRunner\Module\Invocation\Method;
use RecipeRunner\RecipeRunner\Module\ModuleBase;
use Yosymfony\Collection\CollectionInterface;

class ModuleClass extends ModuleBase
{
    public function __construct()
    {
        parent::__construct();

        $this->addMethodHandler('print', [$this, 'print']);
    }

    /**
     * {@inheritdoc}
     */
    public function runMethod(Method $method, CollectionInterface $recipeVariables) : ExecutionResult
    {
        return $this->runInternalMethod($method, $recipeVariables);
    }
    
    /**
     * Print a message.
     * Example of use:
     *  actions:
     *    print: "hello word"
     * 
     * or
     * 
     *  actions:
     *    print:
     *      message: "hello word"
     *
     * @param Method The parameter of the method.
     *
     * @return ExecutionResult
     */
    protected function print(Method $method): ExecutionResult
    {
        $message = $method->getParameterNameOrPosition('message', 0);
        $io = $this->getIO();
        $io->write($message);

        $jsonResponse = \json_encode(['message' => $message]);
        $isSuccessful = true;
 
        return new ExecutionResult($jsonResponse, $isSuccessful);
    }
}
