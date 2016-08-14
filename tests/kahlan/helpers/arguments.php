<?php
$args = $this->args();

//set default reporter to verbose
$args->argument('reporter', 'default', 'verbose');

//set default spec path
$args->argument('spec', 'default', SPEC_PATH);
