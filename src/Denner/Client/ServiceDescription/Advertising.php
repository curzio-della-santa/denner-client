<?php

use Denner\Client\Response;

return array(
    'name' => 'Denner Advertising Service',
    'operations' => array(
        'listPrintPublicationLinks' => array(
            'httpMethod' => 'GET',
            'uri' => 'print-publication-links',
            'summary' => 'List print publication links',
            'parameters' => array(
                'page' => array(
                    '$ref' => 'PageParam',
                ),
                'page_size' => array(
                    '$ref' => 'PageSizeParam',
                ),
                'filter' => array(
                    '$ref' => 'FilterParam',
                ),
                'sort' => array(
                    '$ref' => 'SortParam',
                ),
            ),
            'responseClass' => Response\ListResponse::CLASS,
            'responseDataRoot' => 'print_publication_links',
        ),
        'listPrintPublications' => array(
            'httpMethod' => 'GET',
            'uri' => 'print-publications',
            'summary' => 'List print publications',
            'parameters' => array(
                'page' => array(
                    '$ref' => 'PageParam',
                ),
                'page_size' => array(
                    '$ref' => 'PageSizeParam',
                ),
//                'query' => array(
//                    'description' => 'Full text search query (currently searches only in advertised article name)',
//                    'location' => 'query',
//                    'type' => 'string',
//                    'required' => false,
//                ),
                'filter' => array(
                    '$ref' => 'FilterParam',
                ),
                'sort' => array(
                    '$ref' => 'SortParam',
                ),
            ),
            'responseClass' => Response\ListResponse::CLASS,
            'responseDataRoot' => 'print_publications',
        ),
        'fetchPrintPublication' => array(
            'httpMethod' => 'GET',
            'uri' => 'print-publications/{print_publication_id}',
            'summary' => 'Fetch a print publication',
            'parameters' => array(
                'print_publication_id' => array(
                    'description' => 'The ID of the print publication to fetch',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
            ),
            'responseClass' => Response\ResourceResponse::CLASS,
        ),
        'listPrintPublicationArticles' => array(
            'httpMethod' => 'GET',
            'uri' => 'print-publications/{print_publication_id}/articles',
            'summary' => 'List print publication articles',
            'parameters' => array(
                'print_publication_id' => array(
                    'description' => 'The ID of the print publication to fetch the articles from',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'page' => array(
                    '$ref' => 'PageParam',
                ),
                'page_size' => array(
                    '$ref' => 'PageSizeParam',
                ),
            ),
            'responseClass' => Response\ListResponse::CLASS,
            'responseDataRoot' => 'print_publication_articles',
        ),
    ),
    'models' => array(
        'PageParam' => array(
            'description' => 'The number of the page',
            'location' => 'query',
            'type' => 'integer',
            'required' => false,
        ),
        'PageSizeParam' => array(
            'description' => 'The number of items to list on a page',
            'location' => 'query',
            'type' => 'integer',
            'required' => false,
        ),
        'Filter' => array(
            'type' => 'object',
            'properties' => array(
                'property' => array(
                    'description' => 'The property to filter against',
                    'type' => 'string',
                    'required' => true,
                ),
                'value' => array(
                    'description' => 'The value to filter against',
                    'type' => array('array', 'string', 'integer', 'boolean', 'number', 'numeric', 'object'),
                    'required' => true,
                ),
                'operator' => array(
                    'description' => 'The operator the use for filtering',
                    'type' => 'string',
                    'required' => false,
                ),
                'type' => array(
                    'description' => 'The data type of the value',
                    'type' => 'string',
                    'required' => false,
                ),
            ),
        ),
        'FilterParam' => array(
            'description' => 'An array of filters',
            'location' => 'query',
            'type' => 'array',
            'required' => false,
            'items' => array(
                '$ref' => 'Filter',
            ),
        ),
        'Sort' => array(
            'type' => 'object',
            'properties' => array(
                'property' => array(
                    'description' => 'The property use for sorting',
                    'type' => 'string',
                    'required' => true,
                ),
                'direction' => array(
                    'description' => 'The sorting direction (either "asc" or "desc")',
                    'type' => 'string',
                    'required' => false,
                ),
            ),
        ),
        'SortParam' => array(
            'description' => 'An array of sorters',
            'location' => 'query',
            'type' => 'array',
            'required' => false,
            'items' => array(
                '$ref' => 'Sort',
            ),
        ),
    ),
);
