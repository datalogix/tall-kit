export default ({ loadComponentAssets }) => ({
  async setup (timestamp, format) {
    await loadComponentAssets('moment')
    await loadComponentAssets('moment-timezone')

    const timeZone = Intl.DateTimeFormat().resolvedOptions().timeZone
    const date = window.moment.unix(timestamp).tz(timeZone)

    this.$el.innerHTML = date.format(format)
  }
})
