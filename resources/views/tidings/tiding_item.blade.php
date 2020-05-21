<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <img src="/storage/img/{{ $data['image'] }}"/>
                <p>Название: {{ $data['title'] }}</p>
                <p>Текст: {{ $data['text'] }}</p>
                <p>Дата создания: {{ $data['created_at'] }}</p>
            </div>
        </div>
    </div>
</div>