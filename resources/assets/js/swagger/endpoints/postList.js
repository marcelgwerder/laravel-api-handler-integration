export const postList = {
    get: {
        summary: 'List all posts',
        description: '',
        produces: [
            'application/json'
        ],
        tags: [
            'Posts'
        ],
        parameters: [
            {
                '$ref': '#/parameters/selectParameter'
            },
            {
                '$ref': '#/parameters/searchParameter'
            },
            {
                '$ref': '#/parameters/sortParameter'
            },
            {
                '$ref': '#/parameters/pageParameter'
            },
            {
                '$ref': '#/parameters/pageSizeParameter'
            },
            {
                '$ref': '#/parameters/filterParameter'
            },
            {
                '$ref': '#/parameters/filterMinParameter'
            },
            {
                '$ref': '#/parameters/filterMaxParameter'
            }
        ],
        responses: {
            '200': {
                description: 'Success'
            },
            '400': {
                description: 'Invalid input'
            }
        }
    }
}