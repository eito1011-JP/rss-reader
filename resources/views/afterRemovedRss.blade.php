<div class="content">
    @foreach ($xmlDataArray as $xmlData)
        <h1 class="title">置換済みRSS</h1>
        <textarea class="result" rows="20" cols="40">
        {!! $xmlData !!}
        </textarea>
    @endforeach
</div>

<style>
    .content {
        text-align: center;
    }
    .result {
        width: 50%; /* 画面の幅の50% */
        height: 50%; /* 高さを300pxに設定 */
        border-style: solid;
        resize: none; /* サイズ変更を不可に */
        overflow: auto;
        overscroll-behavior: none;
    }
</style>
