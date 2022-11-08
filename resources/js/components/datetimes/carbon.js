export default ({ loadComponentAssets }) => ({
  async setup (timestamp, format) {
    await loadComponentAssets('moment')
    await loadComponentAssets('moment-timezone')

    this.update(timestamp, format)
  },

  update (timestamp, format) {
    this.$el.innerHTML = this.format(timestamp, format)
  },

  format (timestamp, format) {
    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone
    const date = window.moment.unix(timestamp).tz(timeZone)

    return date.format(format)
  }
})
