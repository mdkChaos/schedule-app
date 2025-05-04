{{-- Custom scripts --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.querySelector('.alert-dismissible');
        if (alert) {
            setTimeout(() => {
                const bsAlert = bootstrap.Alert.getOrCreateInstance(alert);
                bsAlert.close();
            }, 4000);
        }
    });
</script>
