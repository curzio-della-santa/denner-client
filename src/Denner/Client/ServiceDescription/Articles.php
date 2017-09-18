<?php

use Denner\Client\Response;

return array(
    'name' => 'Denner Articles Service',
    'operations' => array(
        'listAdvertisedArticles' => array(
            'httpMethod' => 'GET',
            'uri' => 'advertised-articles',
            'summary' => 'List advertised articles',
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
            'responseDataRoot' => 'advertised_articles',
        ),
        'fetchAdvertisedArticle' => array(
            'httpMethod' => 'GET',
            'uri' => 'advertised-articles/{advertised_article_id}',
            'summary' => 'Fetch an advertisedArticle',
            'parameters' => array(
                'advertised_article_id' => array(
                    'description' => 'The ID of the advertised article to fetch',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
                'broadcast_action' => array(
                    'description' => 'Request for broadcast',
                    'location' => 'header',
                    'sentAs' => 'X-Denner-Broadcast',
                    'type' => 'string',
                    'required' => false,
                ),
            ),
            'responseClass' => Response\ResourceResponse::CLASS,
        ),
        'updateAdvertisedArticle' => array(
            'httpMethod' => 'PATCH',
            'uri' => 'advertised-articles/{advertised_article_id}',
            'summary' => 'Update an advertisedArticle',
            'parameters' => array(
                'advertised_article_id' => array(
                    'description' => 'The ID of the advertised article to update',
                    'location' => 'uri',
                    'type' => 'string',
                    'required' => true,
                ),
            ),
            'additionalParameters' => array(
                'location' => 'json',
            ),
            'responseClass' => Response\ResourceResponse::CLASS,
        ),
        'listLanguages' => array(
            'httpMethod' => 'GET',
            'uri' => 'languages',
            'summary' => 'List languages',
            'parameters' => array(
                'page' => array(
                    '$ref' => 'PageParam',
                ),
                'page_size' => array(
                    '$ref' => 'PageSizeParam',
                ),
//                ),
                'filter' => array(
                    '$ref' => 'FilterParam',
                ),
                'sort' => array(
                    '$ref' => 'SortParam',
                ),
            ),
            'responseClass' => Response\ListResponse::CLASS,
            'responseDataRoot' => 'languages',
        ),
        'listPromotions' => array(
            'httpMethod' => 'GET',
            'uri' => 'promotions',
            'summary' => 'List promotions',
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
            'responseDataRoot' => 'promotions',
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
