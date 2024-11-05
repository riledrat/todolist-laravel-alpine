<script src="{{ asset('js/delete-task-modal.js') }}"></script>
<script src="{{ asset('js/actions-dropdown.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        let pusher = new Pusher('01bab306c6c81d2f7747', { cluster: 'eu' });
        let channel = pusher.subscribe('todolist-laravel-alpine-channel.' + '{{ Auth::id() }}');
        channel.bind('assigned-task', function(data) {
            toastr.success('Task Assigned: ' + JSON.stringify(data.name));
        });
    });
</script>
