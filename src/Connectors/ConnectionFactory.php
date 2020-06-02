<?php


namespace Fengers\Database\Connectors;


use Fengers\Database\PostgresConnection;
use Illuminate\Database\Connection;

class ConnectionFactory extends \Illuminate\Database\Connectors\ConnectionFactory
{
    /**
     * Create a new connection instance.
     *
     * @param string $driver
     * @param \PDO|\Closure $connection
     * @param string $database
     * @param string $prefix
     * @param array $config
     * @return \Illuminate\Database\Connection
     *
     * @throws \InvalidArgumentException
     */
    protected function createConnection($driver, $connection, $database, $prefix = '', array $config = [])
    {
        if ($resolver = Connection::getResolver($driver)) {
            return $resolver($connection, $database, $prefix, $config);
        }

        switch ($driver) {
            case 'pgsql';
                return new PostgresConnection($connection, $database, $prefix, $config);
                break;
        }

        return parent::createConnection($driver, $connection, $database, $prefix, $config);
    }
}
