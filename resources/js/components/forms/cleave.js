export default ({ loadComponentAssets }) => ({
  cleave: null,

  /*
      'cleave' => [
            'https://cdn.jsdelivr.net/npm/cleave.js@1/dist/cleave.min.js',
        ],
*/
  async setup (options) {
    if (!this.$refs.element) return

    await loadComponentAssets('cleave')

    this.cleave = new window.Cleave(this.$refs.element, options)
  }
})
