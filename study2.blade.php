<body>

  ~~~

  <!-- コピー対象要素とコピーボタン -->
  <div class="container-fluid mx-0">
    <div class="form-group row">
      <input class="border border-info rounded text-secondary form-control-plaintext col-10" id="omakeCopyTarget" type="text" value="おまけ" readonly>
      <button type="button" class="btn btn-info col" onclick="omakeCopyToClipboard()" data-toggle="tooltip" data-placement="top" title="コピーする"></button>
    </div>
  </div>

  ~~~

  <!-- bodyタグ内の下部に以下を入力する -->abs
  <script>
    function omakeCopyToClipboard() {
      // コピー対象をJavaScript上で変数として定義する
      var copyTarget = document.getElementById("omekeCopyTarget");

      // コピー対象のテキストを選択する
      copyTarget.select();

      // 選択しているテキストをクリップボードにコピーする
      document.execCommand("Copy");

      // コピーをお知らせする
      alert("コピーできました！ : " + copyTarget.value);
    }
  </script>
</body>