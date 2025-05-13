export default ({ loadComponentAssets }) => ({
  swiper: null,

  /*
    TODO: assets
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/swiper@7/swiper-bundle.min.css',
        'https://cdn.jsdelivr.net/npm/swiper@7/swiper-bundle.min.js',
    ];
    */

  async setup (options = {}) {
    await loadComponentAssets('swiper')

    this.swiper = new window.Swiper(this.$refs.root ? this.$refs.root : this.$el, options)
  }
})
