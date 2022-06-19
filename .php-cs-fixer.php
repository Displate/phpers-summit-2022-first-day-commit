<?php

declare(strict_types=1);

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

return (new Config())
    ->setFinder(getFinder())
    ->setRules(getRules())
    ->setRiskyAllowed(true)
;

/** @internal */
function getFinder(): Finder
{
    /**
     * @var string $dir
     */
    $dir = __DIR__;

    return Finder::create()
        ->in(sprintf('%s/bin', $dir))
        ->in(sprintf('%s/src', $dir))
        ->in(sprintf('%s/tests', $dir))
        ->append([
            __FILE__,
        ])
    ;
}

/** @internal */
function getRules(): array
{
    return [
        '@PSR2' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'array_syntax' => [
            'syntax' => 'short',
        ],
        'cast_spaces' => false,
        'combine_consecutive_issets' => true,
        'combine_consecutive_unsets' => true,
        'concat_space' => [
            'spacing' => 'one',
        ],
        'declare_strict_types' => true,
        'escape_implicit_backslashes' => true,
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => true,
            'import_functions' => true,
        ],
        'group_import' => false,
        'header_comment' => false,
        'linebreak_after_opening_tag' => true,
        'list_syntax' => [
            'syntax' => 'short',
        ],
        'mb_str_functions' => true,
        'method_argument_space' => [
            'on_multiline' => 'ensure_fully_multiline',
        ],
        'method_chaining_indentation' => true,
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'new_line_for_chained_calls',
        ],
        'native_function_invocation' => true,
        'no_null_property_initialization' => true,
        'no_php4_constructor' => true,
        'no_superfluous_elseif' => true,
        'no_superfluous_phpdoc_tags' => [
            'allow_mixed' => true,
            'allow_unused_params' => false,
            'remove_inheritdoc' => false,
        ],
        'no_unreachable_default_argument_value' => false,
        'no_unset_on_property' => true,
        'no_unused_imports' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'ordered_class_elements' => true,
        'ordered_imports' => true,
        'phpdoc_align' => [
            'align' => 'vertical',
        ],
        'phpdoc_line_span' => [
            'const' => 'single',
            'method' => 'single',
            'property' => 'single',
        ],
        'phpdoc_order' => true,
        'phpdoc_order_by_value' => true,
        'phpdoc_separation' => false,
        'phpdoc_to_comment' => false,
        'phpdoc_to_return_type' => true,
        'phpdoc_var_without_name' => false,
        'php_unit_dedicate_assert' => true,
        'php_unit_expectation' => true,
        'php_unit_method_casing' => true,
        'php_unit_set_up_tear_down_visibility' => true,
        'pow_to_exponentiation' => true,
        'return_assignment' => true,
        'single_import_per_statement' => true,
        'single_line_comment_spacing' => false,
        'single_line_throw' => false,
        'strict_param' => true,
        'single_quote' => true,
        'strict_comparison' => false,
        'ternary_to_null_coalescing' => true,
        'trailing_comma_in_multiline' => [
            'elements' => [
                'arguments',
                'arrays',
                'parameters',
            ],
        ],
        'visibility_required' => [
            'elements' => [
                'const',
                'method',
                'property',
            ],
        ],
        'yoda_style' => false,
    ];
}
