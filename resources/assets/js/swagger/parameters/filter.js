export const filterParameter = {
    in: 'query',
    name: 'filter[id]',
    description: 'Filter by the id of a post',
    required: false
}

export const filterMinParameter = {
    in: 'query',
    name: 'filter-min[published_from]',
    description: 'Filter by minimum value (>=)',
    required: false
}

export const filterMaxParameter = {
    in: 'query',
    name: 'filter-max[published_until]',
    description: 'Filter by maximum value (<=)',
    required: false
}