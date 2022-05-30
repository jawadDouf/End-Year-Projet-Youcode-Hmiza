const { defineConfig } = require('@vue/cli-service')
module.exports = defineConfig({
  transpileDependencies: true
})
module.exports = {
  css: {
    loaderOptions: {
      css: {
        modules: {
          auto: () => true
        }
      }
    },
    // sass: {
    //   data: `
    //     @import "@/sass/_variables.scss";
    //     @import "@/sass/_mexins.scss";
    //     @import "@/sass/mediaqueries.scss;
    //   `
    // }
  }
}
