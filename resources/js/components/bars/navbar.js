export default ({ toggleable }) => ({
  ...toggleable(),

  style () {
    return this.isOpened()
      ? `max-height: ${this.$refs.nav.scrollHeight}px`
      : ''
  }
})
