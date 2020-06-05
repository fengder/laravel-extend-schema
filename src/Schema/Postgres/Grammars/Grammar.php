<?php
namespace Fengers\Database\Schema\Postgres\Grammars;

use Fengers\Database\Schema\Postgres\Blueprint;
use Illuminate\Database\Schema\Grammars\PostgresGrammar;
use Illuminate\Support\Fluent;

class Grammar extends PostgresGrammar
{


    /**
     * Create the column definition for a tsvector type.
     *
     * @param  \Illuminate\Support\Fluent  $column
     * @return string
     */
    public function typeTsvector(Fluent $column)
    {
        return 'tsvector';
    }

    /**
     * Compile a gin index key command.
     *
     * @param  \Fengers\Database\Schema\Postgres\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileGin(Blueprint $blueprint, Fluent $command)
    {
        $command->algorithm = 'gin';

        return sprintf('create index %s on %s%s (%s)',
            str_replace([' '], ['_'], $this->wrap($command->index)),
            $this->wrapTable($blueprint),
            " using {$command->algorithm}" ,
            implode(', ', $command->columns)
        );
    }


    /**
     * Compile a rum index key command.
     *
     * @param  \Fengers\Database\Schema\Postgres\Blueprint  $blueprint
     * @param  \Illuminate\Support\Fluent  $command
     * @return string
     */
    public function compileRum(Blueprint $blueprint, Fluent $command)
    {
        $command->algorithm = 'rum';

        return sprintf('create index %s on %s%s (%s) '. (isset($command->with) ? "with ({$command->with})" : '') ,
            str_replace([' '], ['_'], $this->wrap($command->index)),
            $this->wrapTable($blueprint),
            " using {$command->algorithm}" ,
            implode(', ', $command->columns)
        );
    }



}
