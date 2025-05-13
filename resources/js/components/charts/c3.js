export default ({ loadComponentAssets }) => ({

  chart: null,

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/c3@0.7/c3.min.css',
        'https://cdn.jsdelivr.net/npm/d3@5/dist/d3.min.js',
        'https://cdn.jsdelivr.net/npm/c3@0.7/c3.min.js',
    ];
    */

  async setup (options = {}) {
    await loadComponentAssets('c3')

    // eslint-disable-next-line new-cap
    this.chart = new window.c3.generate({
      bindto: this.$refs.root ? this.$refs.root : this.$el,
      ...options
    })
  },

  update (event) {
    this.chart.load(...(event.detail ? [event.detail] : arguments))
  }
})
