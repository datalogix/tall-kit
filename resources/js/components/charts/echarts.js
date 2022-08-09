export default ({ loadComponentAssets }) => ({
  chart: null,

  async setup (options = {}) {
    await loadComponentAssets('echarts')

    // eslint-disable-next-line new-cap
    this.chart = new window.echarts.init(this.$refs.root ? this.$refs.root : this.$el, options.theme, options.config)
    this.chart.setOption(options.dataset)
  },

  update (event) {
    this.chart.setOption(...(event.detail ? event.detail : arguments))
  }
})
