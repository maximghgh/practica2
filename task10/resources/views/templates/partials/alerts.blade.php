@if (Session::has('info'))
    <div class="mb-2 alert alert-success" id="1" role="alert">
        {{ Session::get('info') }}
    </div>
    <script>
        setTimeout(function(){
            document.getElementById('1').style.display="none";
        }, 5000);
    </script>
@endif