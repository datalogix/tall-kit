export default ({ dispatchInputEvent, loadComponentAssets }) => ({
  async init (options) {
    await loadComponentAssets('moment')
    await loadComponentAssets('pikaday')

    // eslint-disable-next-line no-new
    new window.Pikaday({
      field: this.$el,
      onSelect: () => dispatchInputEvent(this.$el),
      ...options
    })
  }
})
