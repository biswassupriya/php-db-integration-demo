<?php
    require_once('config/dbconnect.php');
    require_once('includes/header.php');
    require_once('includes/nav.php');
?>
    <main id="test">
        <form method="post" action="result.php">
            <input type="text" id="search" name="search" placeholder="See you jimmy!">
            <input type="submit">
        </form>
    </main>

    
    
    
    <script type="text/javascript">
        // Using jQuery.

        $(function() {
            $('form').each(function() {
                $(this).find('input').keypress(function(e) {
                    // Enter pressed?
                    if(e.which == 10 || e.which == 13) {
                        $("form:first").submit();
                    }
                });

                $(this).find('input[type=submit]').hide();
            });
        });
    </script>   
        
<?php
    require_once('includes/footer.php');
?>