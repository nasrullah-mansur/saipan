<!DOCTYPE html>
<html lang="en">
<head>
    @include('components.front.head')
</head>
<body>
    
    @include('components.front.header')

    @yield('content')

    @if(Session::has('success'))
    <!-- Modal -->
    <div class="modal fade info-model" id="success" tabindex="-1" aria-labelledby="successLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
            <div class="modal-body">
            <div class="content">
                <i class="far fa-smile"></i>
                <h4 class="pt-2">Thank You</h4>
                <p>{{ Session::get('success') }}</p>
            </div>
            </div>
            
        </div>
        </div>
    </div>
    @endif

    @if ($errors->any())
    <div class="modal fade info-model" id="error" tabindex="-1" aria-labelledby="errorLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            
            <div class="modal-body">
            <div class="content">
                <i class="far fa-sad-cry"></i>
                <h4 class="pt-2">Sorry</h4>
                <p>Something was wrong, Please check again cearfully.</p>
            </div>
            </div>
            
        </div>
        </div>
    </div>
    @endif

    @include('components.front.footer')
    @include('components.front.script')

    @if(Session::has('success'))
    
    <script>
        var myModal = new bootstrap.Modal(document.getElementById('success'), {})
        myModal.show();
    </script>

    @endif

    @if($errors->any())
    
    <script>
        var myModalError = new bootstrap.Modal(document.getElementById('error'), {})
        myModalError.show();
    </script>

    @endif
</body>
</html>