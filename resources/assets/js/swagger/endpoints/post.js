export const post = {
    get: {
        summary: 'Show a post',
        description: '',
        produces: [
            'application/json'
        ],
        tags: [
            'Posts'
        ],
        parameters: [
            {
                in: 'path',
                name: 'id',
                description: 'Id of a single post',
                required: true
            },
            {
                '$ref': '#/parameters/expandParameter'
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