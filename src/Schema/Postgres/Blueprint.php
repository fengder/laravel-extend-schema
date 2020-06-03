<?php


namespace Fengers\Database\Schema\Postgres;


class Blueprint extends \Illuminate\Database\Schema\Blueprint
{
    /**
     * Create a new tsvector column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function tsvector($column)
    {
        return $this->addColumn('tsvector', $column);
    }

    /**
     * Create a new geography column on the table.
     *
     * @param  string  $column
     * @return \Illuminate\Database\Schema\ColumnDefinition
     */
    public function geography($column)
    {
        return $this->addColumn('geography', $column);
    }


    /**
     * Specify an index for the table.
     *
     * @param  string|array  $columns
     * @param  string  $name
     * @return \Illuminate\Support\Fluent
     */
    public function gin($columns, $name = null)
    {
        return $this->indexCommand('gin', $columns, $name);
    }


    /**
     * Specify an index for the table.
     *
     * @param  string|array  $columns
     * @param  string  $name
     * @return \Illuminate\Support\Fluent
     */
    public function rum($columns, $name = null)
    {
        return $this->indexCommand('rum', $columns, $name);
    }

}
