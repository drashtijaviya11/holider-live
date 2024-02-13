<!-- application/views/qr_scanner.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Scanner</title>
    <style>
        #interactive {
            width: 100%;
            max-width: 640px;
            margin: auto;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="interactive"></div>
    <script src="https://rawgit.com/mebjas/html5-qrcode/master/dist/html5-qrcode.min.js"></script>
    <!-- Include the Html5Qrcode library from a CDN -->
<script src="https://cdn.jsdelivr.net/npm/html5-qrcode@1.3.2/dist/html5-qrcode.min.js"></script>

    <script>
        const qrCodeScanner = new Html5Qrcode("interactive");

        function onScanSuccess(qrCodeMessage) {
            // Handle the scanned QR code data
            // You can send this data to the server using AJAX
            sendScannedData(qrCodeMessage);
        }

        function onScanError(error) {
            console.log(`Error scanning QR code: ${error}`);
        }

        function sendScannedData(qrCodeData) {
            // AJAX request to send scanned data to the server
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "<?= site_url('qrscanner/processQrCode') ?>", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    console.log(xhr.responseText);
                }
            };
            xhr.send("qr_data=" + encodeURIComponent(JSON.stringify({ data: qrCodeData })));
        }

        qrCodeScanner.start({ facingMode: "environment" }, onScanSuccess, onScanError);
    </script>
</body>
</html>
