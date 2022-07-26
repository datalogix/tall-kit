export default ({ dispatch }) => ({
  items: [],
  allowEmpty: null,

  setup (items = [], allowEmpty = false) {
    this.items = Array.isArray(items) ? items : [items]
    this.allowEmpty = allowEmpty

    if (!this.items.length && !this.allowEmpty) {
      this.items.push({})
    }
  },

  showCreate (index) {
    return !this.allowEmpty && index + 1 === this.items.length
  },

  showRemove (index) {
    return this.allowEmpty || index + 1 < this.items.length
  },

  create () {
    this.items.push({})

    this.$nextTick(() => dispatch('tooltip:load'))
  },

  remove (index, message = null) {
    if (!message || window.confirm(message)) {
      this.items.splice(index, 1)
    }
  }
})
