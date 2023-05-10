<?php
declare(strict_types=1);

abstract class BaseRepository
{
    protected RdbmsConnection $rdbms_connection;

    public function __construct()
    {
        $this->rdbms_connection = new RdbmsConnection();
    }
}
