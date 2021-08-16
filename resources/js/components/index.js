import alert from './alerts/alert'
import navbar from './bars/navbar'
import sidebar from './bars/sidebar'
import easymde from './editors/easymde'
import quill from './editors/quill'
import trix from './editors/trix'
import inputImage from './forms/input-image'
import mask from './forms/mask'
import toggleable from './navigations/toggleable'
import modal from './overlays/modal'
import tooltip from './overlays/tooltip'
import flatpickr from './pickers/flatpickr'
import pickr from './pickers/pickr'
import pikaday from './pickers/pikaday'
import avatar from './supports/avatar'

export default {
  /**
   * Alerts.
   */
  alert,

  /**
   * Bars.
   */
  navbar,
  sidebar,

  /**
   * Editors.
   */
  easymde,
  quill,
  trix,

  /**
   * Forms.
   */
  'input-image': inputImage,
  mask,

  /**
   * Navigations.
   */
  toggleable,

  /**
   * Overlays.
   */
  modal,
  tooltip,

  /**
   * Pickers.
   */
  flatpickr,
  pickr,
  pikaday,

  /**
   * Supports.
   */
  avatar
}
