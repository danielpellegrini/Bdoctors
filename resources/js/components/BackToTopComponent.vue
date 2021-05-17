<template>
  <go-top></go-top>
</template>

<script>
import GoTop from '@inotom/vue-go-top';

export default {
  components: {
    GoTop
  },

  props: {
    'bg-color': String,
    'bottom': [String, Number]
  }
}
</script>