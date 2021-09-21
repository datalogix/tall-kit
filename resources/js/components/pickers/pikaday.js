export default ({ dispatchInputEvent, loadComponentAssets }) => ({
  pikaday: null,

  async setup (options) {
    if (!this.$refs.input) return

    await loadComponentAssets('moment')
    await loadComponentAssets('pikaday')

    this.pikaday = new window.Pikaday({
      field: this.$refs.input,
      onSelect: () => dispatchInputEvent(this.$refs.input),
      ...options
    })
  }
})
