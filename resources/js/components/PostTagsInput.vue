<template>
  <div>
    <input
    　type="hidden"
    　name="tags"
    　:value="tagsJson"
    >
    <vue-tags-input
      v-model="tag"
      :tags="tags"
      :autocomplete-items="filteredItems"
      @tags-changed="newTags => tags = newTags"
    />
  </div>
</template>

<script>
import VueTagsInput from '@johmun/vue-tags-input';

export default {
  components: {
    VueTagsInput,
  },
  props: {
      initialTags: {
          type: Array,
          default: [],
      },
      autocompleteItems: {
          type: Array,
          default: [],
      }
  },
  data() {
    return {
      tag: '',
      tags: this.initialTags,
    };
  },
  computed: {
    filteredItems() {
      return this.autocompleteItems.filter(i => {
        return i.text.toLowerCase().indexOf(this.tag.toLowerCase()) !== -1;
      });
    },
    tagsJson() {
        return JSON.stringify(this.tags)
    }
  },
};
</script>