export default ({ dispatch }) => ({
  value: null,
  min: null,
  max: null,

  setup (value = 0, min = 0, max = 100) {
    this.min = min
    this.max = max
    this.setValue(value)
    this.$watch('value', value => this.setValue(value))
  },

  setValue (value) {
    if (value < this.min) value = this.min
    if (value > this.max) value = this.max

    this.value = value

    dispatch('updated', this.value)
  },

  getValue () {
    return this.value
  },

  style () {
    return `width: ${this.getValue()}%; transition-property: width;`
  }
})
