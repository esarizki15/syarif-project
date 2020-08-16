<script>
$(document).ready( function () {
    $('.table').DataTable({
        rowReorder: {
            selector: 'td:nth-child(2)'
        },
        responsive:true
    });
    
});
</script>