<?php


namespace Fengers\Database;



use Fengers\Database\Schema\Postgres\Grammars\Grammar;
use Fengers\Database\Schema\Postgres\Builder;
use Illuminate\Database\Query\Grammars\PostgresGrammar;
use Illuminate\Database\Query\Processors\PostgresProcessor;

class PostgresConnection extends \Illuminate\Database\PostgresConnection
{
    /**
     * Get a schema builder instance for the connection.
     *
     * @return Schema\Postgres\Builder
     */
    public function getSchemaBuilder()
    {
        if (is_null($this->schemaGrammar)) {
            $this->useDefaultSchemaGrammar();
        }

        return new Builder($this);
    }

    /**
     * Get the default query grammar instance.
     *
     * @return \Illuminate\Database\Query\Grammars\PostgresGrammar
     */
    protected function getDefaultQueryGrammar()
    {
        return $this->withTablePrefix(new PostgresGrammar);
    }


    /**
     * Get the default schema grammar instance.
     * @return \Fengers\Database\Schema\Postgres\Grammars\Grammar
     */
    protected function getDefaultSchemaGrammar()
    {
        return $this->withTablePrefix(new Grammar);
    }


    /**
     * Get the default post processor instance.
     *
     * @return \Illuminate\Database\Query\Processors\PostgresProcessor
     */
    protected function getDefaultPostProcessor()
    {
        return new PostgresProcessor;
    }
}
