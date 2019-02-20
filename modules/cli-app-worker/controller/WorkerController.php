<?php
/**
 * WorkerController
 * @package cli-app-worker
 * @version 0.0.1
 */

namespace CliAppWorker\Controller;

use Cli\Library\Bash;

class WorkerController extends \CliApp\Controller
{

    private function canRunHere(): ?string{
        $here = getcwd();
        // make sure this is app base
        if(!$this->isAppBase($here))
            Bash::error('Please run the command under exists application');

        // make sure module lib-worker is installed here
        if(!is_dir($here . '/modules/lib-worker'))
            Bash::error('Module `lib-worker` is not installed on the app');
        if(!is_dir($here . '/modules/cli'))
            Bash::error('Module `cli` is not installed on the app');

        return $here;
    }

    public function pidAction() {
        $here = $this->canRunHere();
        $cmd = 'php index.php worker pid';
        
        echo `$cmd`;
    }

    public function startAction() {
        $here = $this->canRunHere();
        `php index.php worker start > /dev/null 2>&1 & echo $!`;
        Bash::echo('Started');
    }

    public function statusAction() {
        $here = $this->canRunHere();
        $cmd = 'php index.php worker status';
        
        echo `$cmd`;
    }

    public function stopAction() {
        $here = $this->canRunHere();
        $cmd = 'php index.php worker stop';
        
        echo `$cmd`;
    }
}