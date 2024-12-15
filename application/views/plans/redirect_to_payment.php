<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirecting to Payment</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $this->config->item('midtrans_client_key'); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            snap.pay('<?= $snapToken ?>', {
                onSuccess: function (result) {
                    alert('Payment success!');
                    window.location.href = '<?= base_url('dashboard'); ?>';
                },
                onPending: function (result) {
                    alert('Waiting for payment...');
                },
                onError: function (result) {
                    alert('Payment failed!');
                }
            });
        });
    </script>
</head>
<body>
    <h1>Redirecting to payment...</h1>
</body>
</html>
