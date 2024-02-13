<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    const ndef = new NDEFReader();
    ndef.scan().then(() => {
      console.log("Scan started successfully.");
      ndef.onreadingerror = () => {
        console.log("<?php echo lang('argh_cannot_read_data') ?>");
      };
      ndef.onreading = event => {
        console.log("<?php echo lang('NDEF_message_read') ?>");
      };
    }).catch(error => {
      console.log(`<?php echo lang('error_scan_failed_to_start') ?>: ${error}.`);
    });
</script>