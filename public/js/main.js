import Vue from 'https://cdn.jsdelivr.net/npm/vue@2.6.12/dist/vue.esm.browser.js'

const api = window.location
const { origin } = api
const tokenElement = document.getElementById('token')
const token = tokenElement.getAttribute('value')


new Vue({
  el: '#app',
  data() {
    return {
      actividades: []
    }
  },
  mounted() {
    this.obtenerActividades()
  },
  methods: {
    async obtenerActividades() {
      try {
        const response = await fetch(`${origin}/api/actividad`, {
          method: 'GET',
          headers: {
            "Content-Type": "application/json",
          }
        })
        this.actividades = await response.json()
      } catch (error) {
        throw error
      }
    }
  },
  computed: {
    formatoFecha() {
      const intl = Intl.DateTimeFormat('es', { dateStyle: 'full' })
      return (fecha) => {
        return intl.format(new Date(fecha))
      }
    }
  }
})

