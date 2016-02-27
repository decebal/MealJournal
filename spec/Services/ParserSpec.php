<?php

namespace spec\App\Services;

use PhpSpec\ObjectBehavior;

class ParserSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType('App\Services\Parser');
    }
}
