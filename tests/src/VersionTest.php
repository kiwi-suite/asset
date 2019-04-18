<?php
/**
 * @link https://github.com/ixocreate
 * @copyright IXOCREATE GmbH
 * @license MIT License
 */

declare(strict_types=1);

namespace Ixocreate\Test\Asset;

use Ixocreate\Application\ApplicationConfig;
use Ixocreate\Application\ApplicationConfigurator;
use Ixocreate\Package\Asset\Version;
use PHPUnit\Framework\TestCase;

class VersionTest extends TestCase
{
    /**
     * @covers \Ixocreate\Package\Asset\Version::__construct
     */
    public function testVersion()
    {
        $applicationConfigurator = new ApplicationConfigurator('/');
        $applicationConfig = new ApplicationConfig($applicationConfigurator);
        $version = new Version($applicationConfig);
        $this->assertInstanceOf(Version::class, $version);
    }

    /**
     * @covers \Ixocreate\Package\Asset\Version::getVersion
     */
    public function testGetVersion()
    {
        $applicationConfigurator = new ApplicationConfigurator('/');
        $applicationConfig = new ApplicationConfig($applicationConfigurator);
        $version = new Version($applicationConfig);
        $versionId = $version->getVersion();
        $this->assertStringMatchesFormat('%x', $versionId);
    }

    /**
     * @covers \Ixocreate\Package\Asset\Version::generateVersion
     */
    public function testGenerateVersion()
    {
        $applicationConfiguratorDevTrue = new ApplicationConfigurator('/');
        $applicationConfig = new ApplicationConfig($applicationConfiguratorDevTrue);
        $version = new Version($applicationConfig);
        $versionId = $version->getVersion();
        $this->assertStringMatchesFormat('%x', $versionId);


        $applicationConfiguratorDevFalse = new ApplicationConfigurator('/');
        $applicationConfiguratorDevFalse->setDevelopment(false);
        $applicationConfig = new ApplicationConfig($applicationConfiguratorDevFalse);
        $version = new Version($applicationConfig);
        $versionId = $version->getVersion();
        $this->assertStringMatchesFormat('%x', $versionId);
    }
}