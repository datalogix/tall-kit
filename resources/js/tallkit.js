import AssetsManager from '@/managers/assets'
import ComponentsManager from '@/managers/components'
import components from '@/components'
import { dispatch } from '@/utils'

class TALLKit {
  constructor (options = {}, assets = {}) {
    this.ready = false
    this.options = options
    this.assets = new AssetsManager(assets)
    this.components = new ComponentsManager(components)
    this.preventReloads()
  }

  preventReloads () {
    if (!this.options.injectTailwindcss) {
      this.assets.loaded.push('tailwindcss')
    }

    if (window.Alpine) {
      this.assets.loaded.push('alpine')
    }
  }

  async init () {
    if (this.ready) {
      return Promise.resolve()
    }

    await this.assets.init(this.options.loadType)

    dispatch('tallkit:load')

    this.ready = true
  }

  asset (name) {
    return this.assets.get(name)
  }

  component (name) {
    return this.components.get(name)
  }
}

if (!window.TALLKit) {
  window.TALLKit = TALLKit
}

dispatch('tallkit:available')

export default TALLKit
