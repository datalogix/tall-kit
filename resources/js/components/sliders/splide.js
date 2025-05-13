export default ({ loadComponentAssets }) => ({
  splide: null,

  /*
    TODO: assets
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/@splidejs/splide@2/dist/css/splide.min.css',
        'https://cdn.jsdelivr.net/npm/@splidejs/splide@2/dist/js/splide.min.js',
    ];
    */

  async setup (options = {}) {
    await loadComponentAssets('splide')

    this.splide = new window.Splide(this.$refs.root ? this.$refs.root : this.$el, options).mount()
  }
})
