export default ({ loadComponentAssets }) => ({
  chart: null,

  async setup (options = {}) {
    await loadComponentAssets('apex-charts')

    this.chart = new window.ApexCharts(this.$refs.root ? this.$refs.root : this.$el, options)
    this.chart.render()
  },

  update (event) {
    this.chart.updateOptions(...(event.detail ? event.detail : arguments))
  }
})
