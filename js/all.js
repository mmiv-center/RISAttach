
jQuery(document).ready(function() {
    jQuery.getJSON('php/getProjects.php', {}, function(data) {
	jQuery('#project').children().remove();
	for (var i = 0; i < data.length; i++) {
	    jQuery('#project').append('<option value="' + data[i]['record_id'] + '">' + data[i]['record_id'] + "</option>");
	}
    });
    jQuery('#project').on('change', function() {
	var project = jQuery(this).val();
	jQuery('#participant').children().remove();
	jQuery.getJSON('php/infoForThisProject.php', { 'project': project }, function(data) {
	    // ignore bad returns
	    if (Array.isArray(data) == 0)
		return;
	    // remove duplicates
	    var kk = [];
	    kk = data.map(function(a) { return a['record_id']; });
	    var ulist = [...new Set(kk)];
	    
	    for (var i = 0; i < ulist.length; i++) {
		jQuery('#participant').append('<option value="' + ulist[i] + '">' + ulist[i] + "</option>");
	    }
	});
    });
    
    
});
