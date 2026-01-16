<?php

//declare(strict_types=1);

/**
 */

use cryodrift\fw\Core;

if (!isset($ctx)) {
    $ctx = Core::newContext(new \cryodrift\fw\Config());
}

$cfg = $ctx->config();
if (\cryodrift\fw\Config::isCli()) {
    $cfg->addHandlerbefore('', \cryodrift\fakepost\Cli::class, []);
}



