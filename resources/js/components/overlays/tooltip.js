import { loadComponentAssets } from '@/utils'

export default () => ({
  tippy: null,

  async setup (options) {
    await loadComponentAssets('tooltip')

    this.tippy = window.tippy(this.$refs.root ? this.$refs.root : this.$el, options)
  }
})

window.addEventListener('tallkit:load', async () => {
  const elements = document.querySelectorAll('[data-tooltip]')

  if (elements.length) {
    await loadComponentAssets('tooltip')

    window.tippy(elements)
  }
})
