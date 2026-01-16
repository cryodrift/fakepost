<?php

//declare(strict_types=1);

namespace cryodrift\fakepost;

use cryodrift\fw\cli\ParamFile;
use cryodrift\fw\Context;

class ParamPost extends ParamFile
{
    public function __construct(Context $ctx, string $name, string $value, bool $ready = false)
    {
        if ($value !== '') {
            parent::__construct($ctx, $name, $value, $ready);
        } else {
            $this->value = $value;
        }
    }

}
