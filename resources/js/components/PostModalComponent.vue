<template>
<div v-if="post !== undefined" class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title font-weight-bold" id="exampleModalLabel">{{post.title}}</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{post.content}}
      </div>
      <div class="modal-footer">
        <button type="button" @click="clean" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
  
</div>
</template>
<script>
export default {
    props:['post'],
    methods:{
      clean: function()
      {
        this.$emit('closeModalPost');
      }
    },
    watch :{
      post: function(){
        $('#postModal').modal("show");
      }
    }
}
</script>
<style scoped>

</style>