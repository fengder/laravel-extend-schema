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
//    public function rum($columns, $name = null)
//    {
//        return $this->indexCommand('rum', $columns, $name);
//    }

    public function rum($columns, $with = null, $name = null)
    {
        $type = 'rum';

        $algorithm = null;

        $columns = (array) $columns;

        // If no name was specified for this index, we will create one using a basic
        // convention of the table name, followed by the columns, followed by an
        // index type, such as primary or index, which makes the index unique.
        $index = $name ?: $this->createIndexName($type, $columns);

        return $this->addCommand(
            $type, compact('index', 'columns', 'with', 'algorithm')
        );
    }

}
