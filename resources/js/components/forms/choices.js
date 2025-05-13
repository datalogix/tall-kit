export default ({ loadComponentAssets }) => ({
  choices: null,

  /**
 'choices' => [
            'https://cdn.jsdelivr.net/npm/choices.js@10/public/assets/styles/choices.min.css',
            'https://cdn.jsdelivr.net/npm/choices.js@10/public/assets/scripts/choices.min.js',
        ],
   */

  async setup (options) {
    if (!this.$refs.element) return

    await loadComponentAssets('choices')

    this.choices = new window.Choices(this.$refs.element, options)
  }
})
