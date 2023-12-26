<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RSS READER</title>
    </head>
    <body class="antialiased">
      <form method="POST" action="{{ route('remove.words') }}">
            @csrf
            <div id="input-fields">
                <div class="mb-3">
                  <label for="url" class="form-label">RSSのURLを入力してください</label>
                  <input class="url" id="url" type="text" name="url[]" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="remove-words" class="form-label">削除したい文字を入力してください(半角空白で区切ると複数の単語を一括で指定できます)</label>
                    <input class="remove-words" id="remove-words" type="text" name="remove_words[]" class="form-control">
                </div>
            </div>
            <button type="button" id="addBtn" class="btn btn-primary">追加</button>
            <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </body>
    <script>
  document.getElementById('addBtn').addEventListener('click', function() {
                var inputFields = document.getElementById('input-fields');
                var fieldIndex = document.querySelectorAll('input[name="url[]"]').length;
                
                var urlDiv = document.createElement('div');
                urlDiv.className = 'mb-3';
                urlDiv.innerHTML = '<label class="form-label" for="url' + fieldIndex + '">URL</label>' +
            '<input type="text" name="url[]" class="form-control" id="url' + fieldIndex + '">' +
            '<div class="error-txt" id="error-url' + fieldIndex + '"></div>';

                var wordsDiv = document.createElement('div');
                wordsDiv.className = 'mb-3';
                wordsDiv.innerHTML = '<label class="form-label" for="remove_words' + fieldIndex + '">The Words you remove</label>' +
            '<input type="text" name="remove_words[]" class="form-control" id="remove_words' + fieldIndex + '">' +
            '<div class="error-txt" id="error-remove-words' + fieldIndex + '"></div>';

                inputFields.appendChild(urlDiv);
                inputFields.appendChild(wordsDiv);
            });
  // エラーを受け取ったら、該当のinputにエラーを表示するjavascriptを書く
</script>
<style>
  .mb-3 {
        margin: 1rem;
    }
</style>
</html>
