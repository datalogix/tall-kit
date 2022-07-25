export default ({ toggleable }) => ({
  ...toggleable(),

  alignAuto () {
    this.$nextTick(() => {
      const el = this.$refs.root ? this.$refs.root : this.$el
      const rectEl = el.getBoundingClientRect()
      const { dropdown } = this.$refs
      const rectDropdown = dropdown.getBoundingClientRect()

      if (rectEl.top + rectEl.height + window.scrollY + rectDropdown.height > window.innerHeight) {
        dropdown.style.top = rectEl.top - rectDropdown.height + window.scrollY + 'px'
      } else {
        dropdown.style.top = rectEl.top + rectEl.height + window.scrollY + 'px'
      }

      if (rectEl.left + rectDropdown.width + window.scrollX > window.innerWidth) {
        dropdown.style.left = rectEl.left + rectEl.width - rectDropdown.width + window.scrollX + 'px'
      } else {
        dropdown.style.left = rectEl.left + window.scrollX + 'px'
      }
    })
  }
})
