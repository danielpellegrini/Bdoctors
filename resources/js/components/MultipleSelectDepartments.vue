<!-- Vue component -->
<template>
 <div>
  <label class="typo__label">Tagging</label>
  <multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Search or add a tag" label="name" track-by="code" :options="options" :multiple="true" :taggable="true" @tag="addTag">

  </multiselect>
</div>
</template>

<script>

import Multiselect from 'vue-multiselect'

export default {
  components: {
    Multiselect
  },

  data () {
    return {
      value: [
      ],
      options: [
        { name: 'Vue.js', code: 'vu' },
        { name: 'Javascript', code: 'js' },
        { name: 'Open Source', code: 'os' }
      ]
    }
  },

  methods: {
    addTag (newTag) {
      const tag = {
        name: newTag
      }
      this.options.push(tag)
      this.value.push(tag)
    }
  }
}

</script>








