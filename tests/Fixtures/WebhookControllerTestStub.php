<?php

namespace Jurihub\CashierMultiplan\Tests\Fixtures;

use Jurihub\CashierMultiplan\Http\Controllers\WebhookController;

class WebhookControllerTestStub extends WebhookController
{
    public function handleChargeSucceeded()
    {
        $_SERVER['__received'] = true;
    }

    protected function eventExistsOnStripe($id)
    {
        return true;
    }
}
