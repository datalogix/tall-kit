export default ({ toggleable }) => ({
  ...toggleable(),

  focusables () {
    // All focusable element types...
    const selector = 'a, button, input, textarea, select, details, [tabindex]:not([tabindex=-1])'

    return [...this.$el.querySelectorAll(selector)]
      // All non-disabled elements...
      .filter(el => !el.hasAttribute('disabled'))
  },

  firstFocusable () {
    return this.focusables()[0]
  },

  lastFocusable () {
    return this.focusables().slice(-1)[0]
  },

  nextFocusable () {
    return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable()
  },

  prevFocusable () {
    return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable()
  },

  nextFocusableIndex () {
    return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1)
  },

  prevFocusableIndex () {
    return Math.max(0, this.focusables().indexOf(document.activeElement)) - 1
  }
})
