{{-- Bootstrap scripts --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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
