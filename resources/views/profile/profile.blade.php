@extends('layouts.app')
@section('content')
    <script>
    function update_profile() {
    var form_data = new FormData($('#profileForm')[0]);
    $.ajax({
    url: '{{route('updateprofile')}}',
    data: form_data,
    type: "POST",
    processData: false,
    contentType: false,
    success:function(html)
    {
    $("#errors").html(html);
    // document.getElementById("textfield").value='data';
    // document.body.textContent = JSON.stringify(data);
    },
    });
    }
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Profile') }}</div>

                    <div class="card-body">
                        <form id="profileForm" name="profileForm" method="POST" onsubmit="update_profile()" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="fio" class="col-md-4 col-form-label text-md-right">{{ __('FIO') }}</label>
                                <div class="col-md-6">
                                    <input id="fio" type="text"  name="fio" value="{{$profile->fio}}" required autocomplete="fio" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Birthdate') }}</label>
                                <div class="col-md-6">
                                    <input id="birthdate" type="date"  name="birthdate" value="{{$profile->birthdate}}" required autocomplete="birthdate">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>
                                <div class="col-md-6">
                                    <img src="/storage/img/{{ $profile->image }}" width="400px" height="250px">
                                    <input class='filestyle' type="file" name="image"  data-placeholder="Изображение не выбрано" data-text='Выберите изображение' data-btnClass='btn-primary'/>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div id="errors">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection