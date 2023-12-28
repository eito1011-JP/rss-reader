<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="content">
        @foreach ($xmlDataArray as $xmlData)
            <h1 class="title">置換済みRSS</h1>
            <textarea class="result" rows="20" cols="40">
            {!! $xmlData !!}
            </textarea>
        @endforeach
    </div>
</body>
<style>
    .content {
        text-align: center;
    }
    .result {
        width: 50%;
        height: 50%;
        border-style: solid;
        resize: none;
        overflow: auto;
        overscroll-behavior: none;
    }
</style>
</html>