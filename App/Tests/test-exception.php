<?php

// use Exception;
// just test Exception write log in file
class TestException
{
    public function testExcpt()
    {
        try {
            if (10 != 9) {
                throw new Exception('Error....');
            }
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
}
