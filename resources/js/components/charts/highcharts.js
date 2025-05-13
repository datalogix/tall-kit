export default ({ loadComponentAssets }) => ({
  chart: null,

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/highcharts@11/css/highcharts.min.css',
        'https://cdn.jsdelivr.net/npm/highcharts@11/highcharts.min.js',
    ];
    */

  async setup (options = {}) {
    await loadComponentAssets('highcharts')

    // eslint-disable-next-line new-cap
    this.chart = new window.Highcharts.chart(this.$refs.root ? this.$refs.root : this.$el, options)
  },

  update (event) {
    this.chart.update(...(event.detail ? [event.detail] : arguments))
  }
})
