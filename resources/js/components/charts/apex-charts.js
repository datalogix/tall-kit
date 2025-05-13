export default ({ loadComponentAssets }) => ({
  chart: null,

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/apexcharts@3/dist/apexcharts.min.css',
        'https://cdn.jsdelivr.net/npm/apexcharts@3/dist/apexcharts.min.js',
    ];
    */

  async setup (options = {}) {
    await loadComponentAssets('apex-charts')

    this.chart = new window.ApexCharts(this.$refs.root ? this.$refs.root : this.$el, options)
    this.chart.render()
  },

  update (event) {
    this.chart.updateOptions(...(event.detail ? event.detail : arguments))
  }
})
