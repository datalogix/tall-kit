export default ({ loadComponentAssets }) => ({
  chart: null,

  async setup (options = {}) {
    await loadComponentAssets('chart-js')

    this.chart = new window.Chart(this.$refs.canvas.getContext('2d'), options)
  },

  update (event) {
    const props = Object.assign(...(event.detail ? [event.detail] : arguments))

    Object.keys(props).forEach((key) => {
      this.chart[key] = props[key]
    })

    this.chart.update()
  }
})
