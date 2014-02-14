<?php

/**
 * Copyright 2014 Underground Elephant
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package     qpush-bundle
 * @copyright   Underground Elephant 2014
 * @license     Apache License, Version 2.0
 */

namespace Uecode\Bundle\QPushBundle\Tests\Provider;

use Doctrine\Common\Cache\Cache;
use Symfony\Bridge\Monolog\Logger;

use Uecode\Bundle\QPushBundle\Provider\AbstractProvider;
use Uecode\Bundle\QPushBundle\Message\Message;

/**
 * TestProvider
 *
 * @author Keith Kirk <kkirk@undergroundelephant.com>
 */
class TestProvider extends AbstractProvider
{
    /**
     * Mock Client
     *
     * @var stdClass
     */
    protected $client;

    public function __construct($name, array $options, $client, Cache $cache, Logger $logger)
    {
        $this->name     = $name;
        $this->options  = $options;
        $this->client   = $client;
        $this->cache    = $cache;
        $this->logger   = $logger;
    }

    public function log($level, $message, array $context)
    {
        return $this->options['logging_enabled'];
    }

    public function getProvider()
    {
        return 'TestProvider';
    }

    public function create()
    {
        return true;
    }

    public function publish(array $message)
    {
        return 123;
    }

    public function receive()
    {
       return [new Message(123, ['foo' => 'bar'], ['meta' => 'data'])];
    }

    public function delete($id)
    {
        return true;
    }

    public function destroy()
    {
        return true;
    }
}
