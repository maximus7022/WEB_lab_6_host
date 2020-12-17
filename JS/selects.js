function select_all() {
	$.post(
        './PHP/select_all.php',    
        function(msg) {
            $('#message_1').html(msg);
        }
    );
}

function select_ten() {
	$.post(
        './PHP/select_ten.php',    
        function(msg) {
           	$('#message_1').html(msg);
        }
    );
}

function select_count() {
	$.post(
        './PHP/select_count.php',    
        function(msg) {
           	$('#message_1').html(msg);
        }
    );
}