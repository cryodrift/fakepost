<?php

//declare(strict_types=1);

namespace cryodrift\fakepost;

use cryodrift\fw\cli\Colors;
use cryodrift\fw\cli\ParamFile;
use cryodrift\fw\Context;
use cryodrift\fw\Core;
use cryodrift\fw\interface\Handler;
use cryodrift\fw\trait\CliHandler;

class Cli implements Handler
{
    use CliHandler;

    public function handle(Context $ctx): Context
    {
        if ($ctx->request()->isPost()) {
            $ctx = $this->handleCli($ctx, 'index');
        }
        return $ctx;
    }

    /**
     * @cli
     */
    protected function index(Context $ctx, ParamPost $post): Context
    {
        if ((string)$post) {
            $lines = explode("\n", (string)$post);
            $data = [];
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line) {
                    parse_str($line, $parts);
                    $k = array_key_first($parts);
                    $data[$k] = $parts[$k];
                }
            }
            Core::echo(__METHOD__, $data);
            $ctx->request()->setVars($data);
            $ctx->response()->setContent('fakepost done');
        }
        return $ctx;
    }
}
