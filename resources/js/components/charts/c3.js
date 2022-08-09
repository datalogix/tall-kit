export default ({ loadComponentAssets }) => ({
  chart: null,

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
