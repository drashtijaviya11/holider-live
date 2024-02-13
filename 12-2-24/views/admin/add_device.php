<h2>Add device</h2>
    <button id="addButton">Add new device</button>
    <div id="output" class="output">
      <div id="content" style="font-size:16px;margin: 20px;"></div>
      <div id="status" style="font-size:16px;margin: 20px;"></div>
    </div>
    <style>
    #addButton{
    margin: 20px;
    padding: 11px;
    font-size: 16px;}
    </style>
<script>  
addButton.addEventListener("click", async () => {
  $('#status').text('');
  $('#content').text('');
  $('#status').text("User clicked scan button");   
  try {
    const ndef = new NDEFReader();
    await ndef.scan();   
    $('#status').text("> Scan started");

    ndef.addEventListener("readingerror", () => {
      $('#status').text("Argh! Cannot read data from the NFC tag. Try another one?");
    });

    ndef.addEventListener("reading", ({ message, serialNumber }) => {
      //$('#content').text(`> Serial Number: ${serialNumber}`); 
      //$('#status').text(`> Records: (${message.records})`);
      var serialNumber = serialNumber; 
      //$('#status').text(serialNumber);
      $.ajax({
                url : "<?= base_url('admin/checkDevice') ?>",
                data : JSON.stringify({serialNumber:serialNumber}),
                dataType : "json",
                type : "POST",
                contentType: false,
                processData: false,
                success : function(res)
                { 
                    if(res.status == true)
                    {
                       $('#status').text(res.message);
                       new Noty({
                            text: res.Message,
                            type: 'success',
                            timeout: 9000,
                        }).show();
                    }
                    else{
                        $('#status').text(res.message);
                        new Noty({
                            text: res.Message,
                            type: 'error',
                            timeout: 9000,
                        }).show();
                    }
                }
            });
    });
  } catch (error) {
    $('#status').text("Argh! " + error);
  }
});

</script>
    