<?php

namespace App\Sentinel\Persistences;

use Cartalyst\Sentinel\Persistences\PersistableInterface;
use Cartalyst\Sentinel\Persistences\PersistenceRepositoryInterface;

class StatelessPersistenceRepository implements PersistenceRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function check()
    {
        // intentionally left blank
    }

    /**
     * @inheritDoc
     */
    public function findByPersistenceCode($code)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function findUserByPersistenceCode($code)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function persist(PersistableInterface $persistable, $remember = false)
    {
        return false;
    }

    /**
     * @inheritDoc
     */
    public function persistAndRemember(PersistableInterface $persistable)
    {
        return $this->persist($persistable, true);
    }

    /**
     * @inheritDoc
     */
    public function forget()
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function remove($code)
    {
        return null;
    }

    /**
     * @inheritDoc
     */
    public function flush(PersistableInterface $persistable, $forget = true)
    {
        // intentionally left blank
    }

}