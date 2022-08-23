import { ApolloClient, ApolloLink, HttpLink, InMemoryCache, from } from '@apollo/client/core'
import store from '../store';

// // HTTP connection to the API
// const httpLink = createHttpLink({
//   // You should use an absolute URL here
//   uri: 'https://graphqlzero.almansi.me/api' || 'https://faker-graphql.herokuapp.com/' || process.env.FAKER_URL_API_RESSOURCE,
// })




// Http endpoint
const httpEndpoint = process.env.VUE_APP_BASE_URL_API_RESSOURCE

const additiveLink = from([
  new ApolloLink((operation, forward) => {

    // Name of the localStorage item
    const token = store.getters['Auth/token'] //localStorage.getItem('apollo-token')
    
    // we get header of current url and add token
    operation.setContext(({ headers }) => ({
      headers: {
        ...headers,
        authorization: token ? `Bearer ${token}` : null,
      },
    }));
    return forward(operation); // Go to the next link in the chain. Similar to `next` in Express.js middleware.
  }),
  // we pass the Endpoint
  new HttpLink({ uri: httpEndpoint }),
]);

// Cache implementation
const cache = new InMemoryCache()

// Create the apollo client
const apolloClient = new ApolloClient({
  link: additiveLink,
  cache,
})


export default apolloClient