export const restrictedPostList = {
    get: {
        summary: 'List all posts (restricted endpoint)',
        description: 'Endpoint configured to allow only very limited query possibilities.',
        produces: [
            'application/json'
        ],
        tags: [
            'Posts (Restricted)'
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