@if ($errors->any())
    <div class="container">
        <div class="row">

                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
        </div>
    </div>
    <!-- Контейнер Flexbox для выравнивания тостов -->

@endif
