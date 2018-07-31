<?php
    $myVariable = 12;
?>
<script type='text/javascript'>
    var fromTheServer = '<?php  $myVariable; ?>';
    console.log(fromTheServer)
</script>