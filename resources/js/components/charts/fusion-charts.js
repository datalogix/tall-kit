export default ({ loadComponentAssets }) => ({
  chart: null,

  /*
    public static $assets = [
        'https://cdn.jsdelivr.net/npm/fusioncharts@3/fusioncharts.js',

        'fusion-charts-fusion' => 'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.fusion.js',
        'fusion-charts-gammel' => 'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.gammel.js',
        'fusion-charts-candy' => 'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.candy.js',
        'fusion-charts-zune' => 'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.zune.js',
        'fusion-charts-ocean' => 'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.ocean.js',
        'fusion-charts-carbon' => 'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.carbon.js',
        'fusion-charts-umber' => 'https://cdn.jsdelivr.net/npm/fusioncharts@3/themes/fusioncharts.theme.umber.js',
    ];
    */

  async setup (options = {}) {
    await loadComponentAssets('fusion-charts')

    if (options?.dataSource?.chart?.theme) {
      await loadComponentAssets(`fusion-charts-${options?.dataSource?.chart?.theme}`)
    }

    await window.FusionCharts.ready()

    this.chart = new window.FusionCharts({
      renderAt: this.$refs.root ? this.$refs.root : this.$el,
      ...options
    })

    this.chart.render()
  },

  update (event) {
    this.chart.setChartData(...(event.detail ? [event.detail] : arguments))
  }
})
