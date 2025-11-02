@if (session('success'))
    <div class="{{ config('tailwind.action_message_styles') }} action-msg opacity-0 -translate-y-[100px]"> {{ session('success') }} </div>

    <script>
        // show action msg and then nicely hide
        const successMsg = document.querySelector('.action-msg');

        setTimeout(() => {
            successMsg.classList.remove('opacity-0');
            successMsg.classList.remove('-translate-y-[100px]');
        }, 300)
        
        setTimeout(() => {
            successMsg.classList.add('opacity-0');
            successMsg.classList.add('-translate-y-[100px]');
        }, 5000)
        
        setTimeout(() => { successMsg.remove(); }, 6000)
    </script>
@endif