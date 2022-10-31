export default ({ loadComponentAssets }) => ({
  choices: null,

  async setup (options) {
    if (!this.$refs.element) return

    await loadComponentAssets('choices')

    this.choices = new window.Choices(this.$refs.element, options)
  }
})
