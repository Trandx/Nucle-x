module.exports = {
    client: {
      service: {
        name: process.env.APP_NAME,
        // URL to the GraphQL API
        //url: process.env.FAKER_URL_API_RESSOURCE,
        url: process.env.VUE_APP_BASE_URL_API_RESSOURCE,
      },
      // Files processed by the extension
      includes: [
        'src/**/*.vue',
        'src/**/*.js',
      ],
    },
  }