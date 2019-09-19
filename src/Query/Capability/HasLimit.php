<?php
declare(strict_types=1);

namespace Latitude\QueryBuilder\Query\Capability;

use Latitude\QueryBuilder\ExpressionInterface;

use function Latitude\QueryBuilder\literal;

trait HasLimit
{
    /** @var int|null */
    protected $limit;

    /**
     * @param int|null $limit
     * @return $this
     */
    public function limit($limit): self
    {
        $this->limit = $limit;
        return $this;
    }

    protected function applyLimit(ExpressionInterface $query): ExpressionInterface
    {
        return is_int($this->limit) ? $query->append('LIMIT %d', literal($this->limit)): $query;
    }
}
