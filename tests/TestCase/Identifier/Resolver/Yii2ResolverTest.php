<?php
declare(strict_types=1);

namespace Phauthentic\Authentication\Test\TestCase\Identifier\Resolver;

use ArrayAccess;
use Phauthentic\Authentication\Identifier\Resolver\Yii2Resolver;
use Phauthentic\Authentication\Test\TestCase\AuthenticationTestCase as TestCase;
use PHPUnit\DbUnit\DataSet\ArrayDataSet;
use PHPUnit\DbUnit\DataSet\IDataSet;
use Yii;
use yii\db\ActiveRecord;
use yii\db\Connection;
use yii\db\QueryBuilder;
use yii\web\Application;

class Users extends ActiveRecord
{

}

/**
 * Yii 2 Resolver Test Case
 */
class Yii2ResolverTest extends TestCase
{
    /**
     * testSuccessFullFind
     *
     * @return void
     */
    public function testSuccessFullFind(): void
    {
        $this->getConnection();

        $connection = new Connection([
            'dsn' => 'sqlite::memory:',
        ]);

        $connection->open();
        $connection->pdo = $this->getConnection()->getConnection();

        Yii::$app = $this->getMockBuilder(Application::class)
            ->setConstructorArgs([['id' => 'test', 'basePath' => __DIR__]])
            ->setMethods(['getDb'])
            ->getMock();

        Yii::$app->expects($this->any())
            ->method('getDb')
            ->willReturn($connection);

        $userModel = new Users();
        $resovler = new Yii2Resolver($userModel, $connection);
        $result = $resovler->find([
            'username' => 'florian',
        ]);

        $this->assertInstanceOf(ArrayAccess::class, $result);
    }
}
