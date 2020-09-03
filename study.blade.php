public static function replaceUrl($portfolio)
{
  $portfolio = explode(PHP_EOL, $portfolio); //PHP_EOLは、改行コードを表す、改行があれば分割する
  $pattern = '/^https?:\/\/[^\s  \\\|`^"\'(){}<>\[\]]*$/'; //正規表現パターン
  $replacedportfolios = array(); 空の配列を用意

  foreach ($portfolios as $value) {
    $replace = preg_replace_callback($pattern, function ($matches) {
      //portfolioが１行ごとに正規表現にmatchするか確認する
        if (isset($matches[1])) {
            return $matches[0]; // $matches[0] がマッチした全体を表す
        }
        //既にリンク化してあれば置換は必要ないので、配列に代入
          return '<a href="' . $matches[0] . '" target="_blank" rel="noopener">' . $matches[0] . '</a>';
        }, $value);
        $replacedportfolios[] = $replace;
        //リンク化したコードを配列に代入
  }
  return inplode(PHP_EOL, $replacedportfolios);
  //配列にしたportfolioを文字列にする
}

public function show($id)
{
  $portfolio = Portfolio::find($id);
  $description = $portfolio->replaceUrl($portfolio->description); //portfolioのモデルからreplaceUrlを持ってくる
  return view('user.portfolios.show', compact('portfolio', 'description'));
}

<p class="card-text">内容：{{!! $description !!}}</p>
<p class="card-text">リンク：<a href="{{ $portfolio->link }}">{{ $portfolio->link }}</a></p>



