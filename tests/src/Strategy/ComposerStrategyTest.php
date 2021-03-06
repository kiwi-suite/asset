<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOLIT GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Test\Asset\Strategy;

use Ixocreate\Asset\Strategy\ComposerStrategy;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Ixocreate\Asset\Strategy\ComposerStrategy
 */
class ComposerStrategyTest extends TestCase
{
    public function setUp(): void
    {
        if (!\class_exists('Composer\InstalledVersions')) {
            $this->markTestSkipped('composer 2 required for this strategy.');
        }
    }

    public function testVersion()
    {
        $strategy = new ComposerStrategy(10);
        $this->assertSame(10, \mb_strlen($strategy->version()));
    }

    public function testTooShort()
    {
        $this->expectException(\InvalidArgumentException::class);
        new ComposerStrategy(2);
    }

    public function testTooLong()
    {
        $this->expectException(\InvalidArgumentException::class);
        new ComposerStrategy(41);
    }
}
