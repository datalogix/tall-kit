import { loadComponentAssets, timeout } from '../../utils'

export default () => ({
  tippy: null,

  async setup (options) {
    await loadComponentAssets('tooltip')

    this.$nextTick(() => {
      this.tippy = window.tippy(this.$refs.root ? this.$refs.root : this.$el, options)
    })
  }
})

async function loadTippy () {
  const elements = document.querySelectorAll('[data-tippy-content]')

  if (elements.length) {
    await loadComponentAssets('tooltip')

    timeout(() => {
      if (window.tippy) {
        window.tippy(elements)
      }
    }, 1000)
  }
}

window.addEventListener('tooltip:load', loadTippy)
window.addEventListener('alpine:initialized', loadTippy)
window.addEventListener('tallkit:load', loadTippy)
window.addEventListener('turbo:load', loadTippy)
window.addEventListener('turbolinks:load', loadTippy)
