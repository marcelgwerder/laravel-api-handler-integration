import SwaggerUI from 'swagger-ui'
import {default as swaggerSpec} from './swagger';

SwaggerUI({
  dom_id: '#root',
  spec: swaggerSpec
})