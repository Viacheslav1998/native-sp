<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

return (new Config())
    ->setRules([
        '@PSR12' => true, 
        'array_syntax' => ['syntax' => 'short'], 
        'binary_operator_spaces' => ['default' => 'single_space'], 
        'blank_line_before_statement' => ['statements' => ['return']], 
        'class_attributes_separation' => ['elements' => ['method' => 'one']], 
        'ordered_imports' => ['sort_algorithm' => 'alpha'], 
        'no_unused_imports' => true, 
        'single_quote' => true, 
    ])
    ->setFinder(Finder::create()->in(__DIR__)); 
