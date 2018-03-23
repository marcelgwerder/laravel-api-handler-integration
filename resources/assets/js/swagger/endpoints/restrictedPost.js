export const restrictedPost = {
    get: {
        summary: 'Show a post (restricted endpoint)',
        description: 'Endpoint configured to allow only very limited query possibilities. Only the "title" field can be selected and only the "votes" relation expanded.',
        produces: [
            'application/json'
        ],
        tags: [
            'Posts (Restricted)'
        ],
        parameters: [
            {
                in: 'path',
                name: 'id',
                description: 'Id of a single post',
                required: true
            },
            {
                '$ref': '#/parameters/expandParameter',
            },
            {
                '$ref': '#/parameters/selectParameter'
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