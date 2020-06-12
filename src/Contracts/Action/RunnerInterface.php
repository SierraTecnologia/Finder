<?php

namespace Finder\Contracts\Action;

interface RunnerInterface
{
    public function prepare();
    public function execute();
    public function done();
    public function run();
}