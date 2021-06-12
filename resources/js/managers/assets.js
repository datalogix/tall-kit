import { dispatch, detectAssets } from '@/utils'

class Assets {
  constructor (items = {}) {
    this.items = {}
    this.loaded = []

    for (const item in items) {
      this.register(item, items[item])
    }
  }

  register (name, content = [], overwrite = true) {
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
      return []
    }

    const content = this.items[name]

    return Array.isArray(content) ? content : [content]
  }

  async init (loadType = true) {
    let assets = []

    if (loadType === true) {
      assets = Object.keys(this.items)
    } else if (typeof loadType === 'string') {
      assets = await new Promise((resolve) => {
        document.addEventListener('DOMContentLoaded', () => {
          resolve(detectAssets(document, loadType))
        })
      })
    }

    if (!assets.includes('tailwindcss')) {
      assets.unshift('tailwindcss')
    }

    if (!assets.includes('alpine')) {
      assets.unshift('alpine')
    }

    for (const asset of assets) {
      await this.load(asset)
    }

    dispatch('tallkit:asset.loaded')
  }

  async load (asset) {
    if (this.loaded.includes(asset) || !this.has(asset)) {
      return Promise.resolve()
    }

    const assets = this.get(asset)
    const promisses = []

    for (const content of assets) {
      if (content.endsWith('.css') || content.includes('.css?')) {
        promisses.push(new Promise(resolve => {
          const link = document.createElement('link')
          link.setAttribute('rel', 'stylesheet')
          link.setAttribute('type', 'text/css')
          link.setAttribute('href', content)
          document.head.appendChild(link)
          link.addEventListener('load', resolve, false)
        }))
      }

      if (content.endsWith('.js') || content.includes('.js?')) {
        promisses.push(new Promise(resolve => {
          const script = document.createElement('script')
          script.setAttribute('src', content)
          document.body.appendChild(script)
          script.addEventListener('load', resolve, false)
        }))
      }
    }

    await Promise.all(promisses)

    dispatch(`tallkit:asset.${asset}`)

    this.loaded.push(asset)
  }
}

export default Assets
