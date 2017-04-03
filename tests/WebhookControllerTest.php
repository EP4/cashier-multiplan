<?php

namespace Jurihub\CashierMultiplan\Tests;

use Illuminate\Http\Request;
use PHPUnit_Framework_TestCase;
use Jurihub\CashierMultiplan\Http\Controllers\WebhookController;
use Jurihub\CashierMultiplan\Tests\Fixtures\WebhookControllerTestStub;

class WebhookControllerTest extends PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        parent::setUp();
        putenv('STRIPE_MODEL=\\Jurihub\\CashierMultiplan\\Tests\\Fixtures\\User');
    }

    public function testProperMethodsAreCalledBasedOnStripeEvent()
    {
        $_SERVER['__received'] = false;
        $request = Request::create('/', 'POST', [], [], [], [], json_encode(['type' => 'charge.succeeded', 'id' => 'event-id']));
        $controller = new WebhookControllerTestStub;
        $controller->handleWebhook($request);

        $this->assertTrue($_SERVER['__received']);
    }

    public function testNormalResponseIsReturnedIfMethodIsMissing()
    {
        $request = Request::create('/', 'POST', [], [], [], [], json_encode(['type' => 'foo.bar', 'id' => 'event-id']));
        $controller = new WebhookControllerTestStub;
        $response = $controller->handleWebhook($request);
        $this->assertEquals(200, $response->getStatusCode());
    }
}

