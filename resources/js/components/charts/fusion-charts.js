export default ({ loadComponentAssets }) => ({
  chart: null,

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
