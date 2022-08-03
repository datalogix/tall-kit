export default ({ dispatch, storagable }) => ({
  ...storagable(),

  setup (name) {
    this.setStorageName(name)
  },

  click () {
    dispatch(`${this.getStorageName()}-toggle`)
  }
})
