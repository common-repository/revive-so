jQuery("select.reviveso-post-types").select2({
    placeholder: revsAdminL10n.select_post_types
});

jQuery("select.reviveso-post-statuses").select2({
    placeholder: revsAdminL10n.select_post_statuses
});

jQuery("select.reviveso-taxonomies").select2({
    placeholder: revsAdminL10n.select_taxonomies,
    minimumInputLength: 3,
    ajax: {
        url: revsAdminL10n.ajaxurl,
        method: "POST",
        dataType: "json",
        delay: 500,
        data: function (e) {
            return {
                searchTerm: e.term,
                action: "reviveso_process_get_taxonomies",
                _wpnonce: revsAdminL10n.nonce,
            }
        },
        processResults: function (e) {
            return {
                results: e.results
            }
        },
        cache: !0
    }
});


jQuery("select#reviveso_days").select2({
    placeholder: revsAdminL10n.select_weekdays
});

jQuery("select.reviveso-force-include, select.reviveso-force-exclude").select2({
    placeholder: revsAdminL10n.post_ids,
    tags: !0,
    tokenSeparators: [",", " "],
    createTag: function (e) {
        let t = /^\d+$/;
        return t.test(e.term) ? {
            id: e.term,
            text: e.term
        } : null
    }
});

jQuery(".reviveso-datepicker").datepicker({
    dateFormat: "dd/mm/yy",
    maxDate: -1,
    changeMonth: !0,
    changeYear: !0,
    yearRange: "-25:+0",
    defaultDate: "-5y"
});

jQuery(".reviveso-timepicker").timepicker({
    timeFormat: "HH:mm:ss",
    stepHour: 1,
    stepMinute: 1,
    stepSecond: 1,
    showMillisec: !1,
    showMicrosec: !1,
    showTimezone: !1,
    timeOnly: !0
});




let evaluate = (value, condition, operator) => {
    switch (operator) {
        case "=":
            return value == condition;
        case ">":
            return value > condition;
        case "<":
            return value < condition;
        case "!=":
            return value != condition;
        case ">=":
            return value >= condition;
        case "<=":
            return value <= condition;
    }
};
jQuery(".reviveso-metaboxes").find(".reviveso-form-el[data-condition]").each(function(event, input) {
    let condition = jQuery(input).data("condition");
    jQuery(`#${condition[0]}`).on("change", function() {
        evaluate(jQuery(this).val(), condition[2], condition[1] ) ? jQuery(input).closest("tr").slideDown() : jQuery(input).closest("tr").hide();
    }).trigger("change");
});

    // Select checkboxes with a data-children attribute inside .reviveso-form-el containers
    jQuery('.reviveso-form-el[data-children]').find('input[type="checkbox"]').change(function() {
        
        // Parse the JSON-encoded array from the data-children attribute
        var childrenData = jQuery(this).parents('.reviveso-form-el[data-children]').attr('data-children');

        if( 'all' == childrenData ){
            parentClass  = jQuery(this).attr('id');
            childrenIds = ['reviveso_settings_pannel tr:not(.' + parentClass + ')'];
        }else{
            childrenIds = childrenData.split(',');
        }

        if( jQuery(this).parents('tr').hasClass( "reviveso-hide-setting" ) ){
            return;
        }
        // Check the checkbox's checked state
        if ( jQuery(this).is(':checked') ) {
          
            // If the checkbox is checked, remove the .reviveso-hide-setting class from each element
            childrenIds.forEach(function(id) {
                jQuery('.' + id).removeClass('reviveso-hide-setting');
            });
        } else {
            // If the checkbox is not checked, add the .reviveso-hide-setting class to each element
            childrenIds.forEach(function(id) {
                jQuery('.' + id).addClass('reviveso-hide-setting');
            });
        }
    }).trigger("change");
