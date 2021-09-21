import * as utils from '@/utils'

class Components {
  constructor (items = {}) {
    this.items = {}

    for (const item in items) {
      this.register(item, items[item])
    }
  }

  register (name, content = {}, overwrite = true) {
    if (overwrite || !this.has(name)) {
      this.items[name] = content
    }
  }

  unregister (name) {
    if (this.has(name)) {
      delete this.items[name]
    }
  }

  has (name) {
    return Object.prototype.hasOwnProperty.call(this.items, name)
  }

  get (name) {
    if (!this.has(name)) {
      return {}
    }

    const content = this.items[name]

    return typeof content === 'function' ? content(utils) : content
  }
}

export default Components
