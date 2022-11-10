<?php

declare(strict_types=1);

namespace App;

use Bref\Context\Context;
use Bref\Event\Handler;

class Task implements Handler
{
    public function handle(
        mixed $event,
        Context $context,
    ): array {
        return [
            'name' => $event['name'],
        ];
    }
}
