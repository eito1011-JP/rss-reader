<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>RSS READER</title>
    </head>
    <body class="antialiased">
    <form method="POST" action="{{ route('remove.words') }}">
            @csrf
            <div id="input_fields">
                <div id="template">
                    <div class="mb-3">
                        <label for="url" class="form-label">RSS</label>
                        <input class="url" id="url" type="text" name="url[]" class="form-control" placeholder="https://sample.com/rss">
                    </div>
                    <div class="mb-3">
                        <label for="remove-words" class="form-label">削除する単語</label>
                        <input class="remove-words" id="remove_words" type="text" name="remove_words[]" class="form-control" placeholder="backend frontend...">
                        <div class="error-message" style="color: red;"></div>
                    </div>
                    <input type="checkbox" class="delete-checkbox" id="check_box" onclick="removeField(this)">
                </div>
            </div>
            @if ($errors->any())
                <p class="validation-msg">{{ $errors->all()[0] }}</p>
            @endif
            <button type="button" id="addBtn" class="btn btn-primary">追加</button>
            <button type="submit" class="btn btn-primary">送信</button>
    </form>
    </body>
    <script>
    document.getElementById('addBtn').addEventListener('click', function() {
        var inputFields = document.getElementById('input_fields');
        var fieldIndex = document.querySelectorAll('input[name="url[]"]').length;
        var fragment = document.createDocumentFragment();
        var template = document.createElement('div');
        template.id = 'template' + fieldIndex;
        template.innerHTML = '<div class="mb-3">' +
        '<label class="form-label" for="url' + fieldIndex + '">RSS </label>' +
        '<input type="text" name="url[]" class="form-control" id="url' + fieldIndex + '" placeholder="https://sample.com/rss">' + 
        '</div>' +
        '<div class="mb-3" style="margin: 1rem;">' +
        '<label class="form-label" for="remove_words' + fieldIndex + '">削除する単語 </label>' +
        '<input type="text" name="remove_words[]" class="form-control" id="remove_words' + fieldIndex + '" placeholder="backend frontend...">' +
        '</div>' +
        '<input style="translate: -1rem -3.7rem;" type="checkbox" class="delete-checkbox" id="check_box' + fieldIndex + '" onclick="removeField(this)">';

    fragment.appendChild(template);
    inputFields.appendChild(fragment);
    });

    function removeField(checkBox) {
        var fieldIndex = checkBox.id.replace(/[^0-9]/g, '');
        var template = document.getElementById('template' + fieldIndex);
        template.remove();
    }
</script>
<style>
    .mb-3 {
        margin: 1rem;
    }
    div#input_fields {
        margin-left: 1rem;
    }
    input#check_box {
        translate: -1rem -3.7rem;
    }
    .validation-msg {
        margin-left: 2rem;
        translate: 0rem -2rem;
        color: #ff0000;
    }

</style>
</html>
