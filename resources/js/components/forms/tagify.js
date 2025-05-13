export default ({ loadComponentAssets }) => ({
  tagify: null,

  /*
  'tagify' => [
            'https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.css',
            'https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.polyfills.min.js',
            'https://cdn.jsdelivr.net/npm/@yaireo/tagify@4/dist/tagify.min.js',
        ],
        */
  async setup (options) {
    if (!this.$refs.element) return

    await loadComponentAssets('tagify')

    this.tagify = new window.Tagify(this.$refs.element, options)
  }
})
