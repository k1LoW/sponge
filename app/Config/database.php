<?php
use AD7six\Dsn\Wrapper\CakePHP\DbDsn;

class DATABASE_CONFIG {
  public function __construct() {
    $this->default = DbDsn::parse(env('DATABASE_URL'));
    $this->test = DbDsn::parse(env('DATABASE_TEST_URL'));
  }
}