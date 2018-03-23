import { post, postList, restrictedPost, restrictedPostList } from './endpoints';
import { 
    expandParameter, selectParameter, sortParameter, searchParameter,
    pageParameter, pageSizeParameter,
    filterParameter, filterMinParameter, filterMaxParameter
} from './parameters';

export default {
    swagger: '2.0',
    info: {
        description: 'This sample project features the Laravel Api Handler, displays the functionality and acts as an integration project for development',
        version: '1.0.0',
        title: 'Laravel Api Handler Integration',
        contact: {
            email: 'info@marcelgwerder.ch'
        },
        license: {
            name: 'MIT',
            url: 'https://opensource.org/licenses/MIT'
        }
    },
    host: 'localhost:8000',
    basePath: '/api',
    schemes: [
        'http'
    ],
    paths: {
        '/posts/{id}': post,
        '/posts': postList,
        '/restricted-posts/{id}': restrictedPost,
        '/restricted-posts': restrictedPostList
    },
    parameters: {
        expandParameter,
        selectParameter,
        searchParameter,
        sortParameter,
        pageParameter,
        pageSizeParameter,
        filterParameter,
        filterMaxParameter,
        filterMinParameter
    },
    externalDocs: {
        description: 'Find out more about the Laravel API Handler',
        url: 'https://github.com/marcelgwerder/laravel-api-handler'
    }
}