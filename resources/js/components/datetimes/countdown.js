export default ({ dispatch }) => ({
  expires: null,
  counter: null,

  setup (expires) {
    this.expires = expires
    this.start()
  },

  start () {
    dispatch('start', this)

    this.counter = setInterval(() => {
      const countDownDate = new Date(this.expires * 1000).getTime()
      const timeDistance = countDownDate - new Date().getTime()

      if (timeDistance < 0) {
        return this.stop()
      }

      if (this.$refs.days) {
        this.$refs.days.innerText = this.format(timeDistance / (1000 * 60 * 60 * 24))
      }

      if (this.$refs.hours) {
        this.$refs.hours.innerText = this.format((timeDistance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60))
      }

      if (this.$refs.minutes) {
        this.$refs.minutes.innerText = this.format((timeDistance % (1000 * 60 * 60)) / (1000 * 60))
      }

      if (this.$refs.seconds) {
        this.$refs.seconds.innerText = this.format((timeDistance % (1000 * 60)) / 1000)
      }

      dispatch('timer', this)
    }, 1000)
  },

  stop () {
    dispatch('complete', this)

    clearInterval(this.counter)
  },

  format (value) {
    return Math.floor(value).toString().padStart(2, '0')
  }
})
