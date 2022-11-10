<?php

declare(strict_types=1);

namespace Test;

use App\Task;
use Bref\Context\Context;
use PHPUnit\Framework\TestCase;

class TaskTest extends TestCase
{
    private readonly Task $task;

    public function setUp(): void
    {
        $this->task = new Task;
    }

    public function test(): void
    {
        $context = new Context(
            awsRequestId: 'request-id',
            deadlineMs: 100,
            invokedFunctionArn: 'my-function',
            traceId: 'trace-id',
        );
        $event = [
            'name' => 'foo',
        ];

        self::assertSame($event, $this->task->handle($event, $context));
    }
}
