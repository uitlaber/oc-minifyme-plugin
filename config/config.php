<?php
use Maatwebsite\Excel\Excel;

return [
    // This contains the Laravel Packages that you want this plugin to utilize listed under their package identifiers
    'packages' => [
        'maatwebsite/excel' => [
            // Service providers to be registered by your plugin
            'providers' => [
                Maatwebsite\Excel\ExcelServiceProvider::class
            ],

            // Aliases to be registered by your plugin in the form of $alias => $pathToFacade
            'aliases' => [
                'Excel' => Maatwebsite\Excel\Facades\Excel::class,
            ],

            // The namespace to set the configuration under. For this example, this package accesses it's config via config('purifier.' . $key), so the namespace 'purifier' is what we put here
            'config_namespace' => 'excel',

            // The configuration file for the package itself. Start this out by copying the default one that comes with the package and then modifying what you need.
            'config' => [
                'exports' => [
                    /*
                    |--------------------------------------------------------------------------
                    | Chunk size
                    |--------------------------------------------------------------------------
                    |
                    | When using FromQuery, the query is automatically chunked.
                    | Here you can specify how big the chunk should be.
                    |
                    */
                    'chunk_size'             => 1000,
                    /*
                    |--------------------------------------------------------------------------
                    | Temporary path
                    |--------------------------------------------------------------------------
                    |
                    | When exporting files, we use a temporary file, before storing
                    | or downloading. Here you can customize that path.
                    |
                    */
                    'temp_path'              => sys_get_temp_dir(),
                    /*
                   |--------------------------------------------------------------------------
                   | Pre-calculate formulas during export
                   |--------------------------------------------------------------------------
                   */
                    'pre_calculate_formulas' => false,
                    /*
                    |--------------------------------------------------------------------------
                    | CSV Settings
                    |--------------------------------------------------------------------------
                    |
                    | Configure e.g. delimiter, enclosure and line ending for CSV exports.
                    |
                    */
                    'csv'                    => [
                        'delimiter'              => ',',
                        'enclosure'              => '"',
                        'line_ending'            => PHP_EOL,
                        'use_bom'                => false,
                        'include_separator_line' => false,
                        'excel_compatibility'    => false,
                    ],
                ],
                'imports'            => [
                    'read_only' => true,
                    'heading_row' => [
                        /*
                        |--------------------------------------------------------------------------
                        | Heading Row Formatter
                        |--------------------------------------------------------------------------
                        |
                        | Configure the heading row formatter.
                        | Available options: none|slug|custom
                        |
                        */
                        'formatter' => 'slug',
                    ],
                    /*
                    |--------------------------------------------------------------------------
                    | CSV Settings
                    |--------------------------------------------------------------------------
                    |
                    | Configure e.g. delimiter, enclosure and line ending for CSV imports.
                    |
                    */
                    'csv'                    => [
                        'delimiter'              => ',',
                        'enclosure'              => '"',
                        'line_ending'            => PHP_EOL,
                        'use_bom'                => false,
                        'include_separator_line' => false,
                        'excel_compatibility'    => false,
                    ],
                ],
                /*
                |--------------------------------------------------------------------------
                | Extension detector
                |--------------------------------------------------------------------------
                |
                | Configure here which writer type should be used when
                | the package needs to guess the correct type
                | based on the extension alone.
                |
                */
                'extension_detector' => [
                    'xlsx'     => Excel::XLSX,
                    'xlsm'     => Excel::XLSX,
                    'xltx'     => Excel::XLSX,
                    'xltm'     => Excel::XLSX,
                    'xls'      => Excel::XLS,
                    'xlt'      => Excel::XLS,
                    'ods'      => Excel::ODS,
                    'ots'      => Excel::ODS,
                    'slk'      => Excel::SLK,
                    'xml'      => Excel::XML,
                    'gnumeric' => Excel::GNUMERIC,
                    'htm'      => Excel::HTML,
                    'html'     => Excel::HTML,
                    'csv'      => Excel::CSV,
                    'tsv'      => Excel::TSV,
                    /*
                    |--------------------------------------------------------------------------
                    | PDF Extension
                    |--------------------------------------------------------------------------
                    |
                    | Configure here which Pdf driver should be used by default.
                    | Available options: Excel::MPDF | Excel::TCPDF | Excel::DOMPDF
                    |
                    */
                    'pdf'      => Excel::DOMPDF,
                ],
            ],
        ],
    ],
];