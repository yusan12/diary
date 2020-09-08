Vue.js時実装コード

resources/js/app.js

Vue.component('url-copy-component', require('./components/UrlCopyComponent.vue').default);



resources/js/components/UrlCopyComponent.vue

  <template>
    <div>
      <input id="copyTarget" type="text" v-model="url" readonly class="col-10">
      <button type="button" class="btn bg-potfyYellow hover:bg-potfyYellowTitle text-white font-bold py-2 px-4 rounded-full" @click="urlCopy()" data-toggle="tooltip" data-placement="top">
        URLをコピー
      </button>
    </div>
  </template>

  <script>
    export default {
      mounted() {
        const url = location.href;
        this.url = url;
      },
      data() {
        return {
          url: ''
        }
      },
      methods: {
        urlCopy() {
          const copyTarget = document.getElementById("copyTarget");
          copyTarget.select();
          document.execCommand("Copy");
          alert("コピーが完了しました。");
        }
      }
    }
  </script>

user/portfolios/show.blade.php

<div class="row mt-3">
  <div class="col-12">
    <url-copy-component></url-copy-component>
  </div>
</div>