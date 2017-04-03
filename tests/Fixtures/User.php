<?php

namespace Jurihub\CashierMultiplan\Tests\Fixtures;

use Jurihub\CashierMultiplan\Billable;
use Illuminate\Database\Eloquent\Model as Eloquent;

class User extends Eloquent
{
    use Billable;
}
