export default ({ dispatchInputEvent, loadComponentAssets }) => ({
  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('moment')
    await loadComponentAssets('pikaday')

    // eslint-disable-next-line no-new
    new window.Pikaday({
      field: this.$refs.input,
      onSelect: () => dispatchInputEvent(this.$refs.input),
      ...options
    })
  }
})
