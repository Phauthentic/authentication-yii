<?php
declare(strict_types=1);

namespace Authentication\Identifier\Resolver;

use ArrayAccess;
use ArrayObject;
use Authentication\Identifier\Resolver\ResolverInterface;
use yii\db\ActiveRecord;
use yii\db\Connection;

/**
 * Yii 2 Active Record Resolver
 */
class Yii2Resolver implements ResolverInterface
{
    /**
     * A Yii Model object extending ActiveRecord
     *
     * @var \yii\db\ActiveRecord;
     */
    protected $userModel;

    /**
     * Yii Connection Object
     *
     * @var \yii\db\Connection;
     */
    protected $connection;

    /**
     * Constructor.
     *
     * @param \yii\db\ActiveRecord
     * @param \yii\db\Connection
     */
    public function __construct(ActiveRecord $userModel, ?Connection $connection)
    {
        $this->userModel = $userModel;
        $this->connection = $connection;
    }

    /**
     * @inheritDoc
     */
    public function find(array $conditions): ArrayAccess
    {
        $query = $this->userModel->find();

        foreach ($conditions as $field => $value) {
            $query->where([
                $field => $value
            ]);
        }

        $result = $query->one($this->connection);
        if ($result === null) {
            return null;
        }

        if (!is_array($result)) {
            $result = $result->toArray();
        }

        return new ArrayObject($result);
    }
}
