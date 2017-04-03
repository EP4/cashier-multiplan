<?php

namespace Jurihub\CashierMultiplan\Tests\Fixtures;

use Jurihub\CashierMultiplan\Http\Controllers\WebhookController;

class CashierTestControllerStub extends WebhookController
{
    protected function eventExistsOnStripe($id)
    {
        return true;
    }
}
