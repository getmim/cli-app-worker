<?php
/**
 * Autocomplete
 * @package cli-app-worker
 * @version 0.0.1
 */

namespace CliAppWorker\Library;

class Autocomplete extends \Cli\Autocomplete
{

    static function command(array $args) {
        $farg = $args[2] ?? null;

        $result = ['start', 'stop', 'pid', 'status'];

        if(!$farg)
            return trim(implode(' ', $result));

        return parent::lastArg($farg, $result);
    }
}