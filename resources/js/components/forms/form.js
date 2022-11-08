export default ({ loadable }) => ({
  ...loadable(),

  confirm: null,
  form: {},

  setup (confirm = null) {
    this.confirm = confirm
    this.form = this.fillForm()
  },

  submit () {
    this.$refs.form.submit()
  },

  prepareSubmit (event) {
    if (this.$refs.form.getAttribute('wire:id')) {
      return event.preventDefault()
    }

    if (!this.confirm || window.confirm(this.conm)) {
      return this.startAndComplete(this.$refs.form.target || (event && event.ctrlKey))
    }

    return event.preventDefault()
  },

  fillForm () {
    const form = {}
    const elements = [...this.$refs.form.querySelectorAll('input,select,textarea')]

    this.$refs.form.querySelectorAll('template').forEach(template => {
      elements.push(...template.content.querySelectorAll('input,select,textarea'))
    })

    Array.from(elements)
      .filter((element) => element.getAttributeNames().filter((attr) => attr.startsWith('x-model')).length)
      .forEach((element) => {
        const attr = element.getAttribute(element.getAttributeNames().find((attr) => attr.startsWith('x-model')) || 'name')
        const parts = attr.replace('form.', '').replace(/\[/g, '.').replace(/\]/g, '').split('.')
        const last = parts.pop()

        parts.reduce(
        // eslint-disable-next-line no-return-assign
          (o, k, i, kk) => o[k] = o[k] || (isFinite(i + 1 in kk ? kk[i + 1] : last) ? [] : {}),
          form
        )[last] = element.value
      })

    return form
  }
})
