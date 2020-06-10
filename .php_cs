<?php

$finder = \PhpCsFixer\Finder::create()
    ->in(__DIR__.'/src')
    ->in(__DIR__.'/tests')
    ->exclude(__DIR__.'/tests/views');

$config = \PhpCsFixer\Config::create()
    ->setRules([
        '@PSR2' => true,
        'single_quote' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'visibility_required' => false,
    ])
    ->setFinder($finder);

return $config;
