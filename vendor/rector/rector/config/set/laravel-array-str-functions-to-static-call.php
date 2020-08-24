<?php

declare(strict_types=1);

use Rector\Generic\Rector\FuncCall\FuncCallToStaticCallRector;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $containerConfigurator): void {
    $services = $containerConfigurator->services();

    $services->set(FuncCallToStaticCallRector::class)
        ->call('configure', [[
            FuncCallToStaticCallRector::FUNC_CALLS_TO_STATIC_CALLS => [
                'array_add' => [
                    # Arr
                    'Illuminate\Support\Arr',
                    'add',
                ],
                'array_collapse' => ['Illuminate\Support\Arr', 'collapse'],
                'array_divide' => ['Illuminate\Support\Arr', 'divide'],
                'array_dot' => ['Illuminate\Support\Arr', 'dot'],
                'array_except' => ['Illuminate\Support\Arr', 'except'],
                'array_first' => ['Illuminate\Support\Arr', 'first'],
                'array_flatten' => ['Illuminate\Support\Arr', 'flatten'],
                'array_forget' => ['Illuminate\Support\Arr', 'forget'],
                'array_get' => ['Illuminate\Support\Arr', 'get'],
                'array_has' => ['Illuminate\Support\Arr', 'has'],
                'array_last' => ['Illuminate\Support\Arr', 'last'],
                'array_only' => ['Illuminate\Support\Arr', 'only'],
                'array_pluck' => ['Illuminate\Support\Arr', 'pluck'],
                'array_prepend' => ['Illuminate\Support\Arr', 'prepend'],
                'array_pull' => ['Illuminate\Support\Arr', 'pull'],
                'array_random' => ['Illuminate\Support\Arr', 'random'],
                'array_sort' => ['Illuminate\Support\Arr', 'sort'],
                'array_sort_recursive' => ['Illuminate\Support\Arr', 'sortRecursive'],
                'array_where' => ['Illuminate\Support\Arr', 'where'],
                'array_wrap' => ['Illuminate\Support\Arr', 'wrap'],
                'array_set' => ['Illuminate\Support\Arr', 'set'],
                'camel_case' => [
                    # Str
                    'Illuminate\Support\Str',
                    'camel',
                ],
                'ends_with' => ['Illuminate\Support\Str', 'endsWith'],
                'kebab_case' => ['Illuminate\Support\Str', 'kebab'],
                'snake_case' => ['Illuminate\Support\Str', 'snake'],
                'starts_with' => ['Illuminate\Support\Str', 'startsWith'],
                'str_after' => ['Illuminate\Support\Str', 'after'],
                'str_before' => ['Illuminate\Support\Str', 'before'],
                'str_contains' => ['Illuminate\Support\Str', 'contains'],
                'str_finish' => ['Illuminate\Support\Str', 'finish'],
                'str_is' => ['Illuminate\Support\Str', 'is'],
                'str_limit' => ['Illuminate\Support\Str', 'limit'],
                'str_plural' => ['Illuminate\Support\Str', 'plural'],
                'str_random' => ['Illuminate\Support\Str', 'random'],
                'str_replace_array' => ['Illuminate\Support\Str', 'replaceArray'],
                'str_replace_first' => ['Illuminate\Support\Str', 'replaceFirst'],
                'str_replace_last' => ['Illuminate\Support\Str', 'replaceLast'],
                'str_singular' => ['Illuminate\Support\Str', 'singular'],
                'str_slug' => ['Illuminate\Support\Str', 'slug'],
                'str_start' => ['Illuminate\Support\Str', 'start'],
                'studly_case' => ['Illuminate\Support\Str', 'studly'],
                'title_case' => ['Illuminate\Support\Str', 'title'],
            ],
        ]]);
};
