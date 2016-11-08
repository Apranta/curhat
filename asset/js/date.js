/**
 * Created by Rocky on 27/05/2015.
 */
(function() {
    var elem = document.createElement('input');
    elem.setAttribute('type', 'date');

    if ( elem.type === 'text' ) {
        $('#tanggal_lahir').datepicker({
		      changeMonth: true,
		      changeYear: true
        );
    }
})();