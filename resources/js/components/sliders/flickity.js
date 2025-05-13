export default ({ loadComponentAssets }) => ({
  flickity: null,

  /*
    TODO: assets
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/flickity@2/dist/flickity.min.css',
        'https://cdn.jsdelivr.net/npm/flickity@2/dist/flickity.pkgd.min.js',
    ];
    */

  async setup (options = {}) {
    await loadComponentAssets('flickity')

    this.flickity = new window.Flickity(this.$refs.root ? this.$refs.root : this.$el, options)
  }
})
