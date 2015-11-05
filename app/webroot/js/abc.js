function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}
$(function() {
	var $wrapper = $('#wrapper');
	// display scripts on the page
	$('script', $wrapper).each(function() {
		var code = this.text;
		if (code && code.length) {
			var lines = code.split('\n');
			var indent = null;

			for (var i = 0; i < lines.length; i++) {
				if (/^[	 ]*$/.test(lines[i])) continue;
				if (!indent) {
					var lineindent = lines[i].match(/^([ 	]+)/);
					if (!lineindent) break;
					indent = lineindent[1];
				}
				lines[i] = lines[i].replace(new RegExp('^' + indent), '');
			}

			var code = $.trim(lines.join('\n')).replace(/	/g, '    ');
			var $pre = $('<pre>').addClass('js').text(code);
			$pre.insertAfter(this);
		}
	});

	// show current input values
	$('select.selectized,input.selectized', $wrapper).each(function() {
		var $container = $('<div>').addClass('value').html('Current Value: ');
		var $value = $('<span>').appendTo($container);
		var $input = $(this);
		var update = function(e) { $value.text(JSON.stringify($input.val())); }

		$(this).on('change', update);
		update();

		$container.insertAfter($input);
	});
});
// Extend jQuery.fn with our new method
jQuery.extend(jQuery.fn, {
    // Name of our method & one argument (the parent selector)
    hasParent: function(p) {
        // Returns a subset of items using jQuery.filter
        return this.filter(function() {
            // Return truthy/falsey based on presence in parent
            return $(p).find(this).length;
        });
    }
});
var current_href;
function update_limit(obj) {
    if ($('#SelectRecPerPage').attr('action').indexOf('index') == -1) {
        $('#SelectRecPerPage').attr('href', $('#SelectRecPerPage').attr('action') + '/index/limit:' + $(obj).val() + '/');
    } else {
        $('#SelectRecPerPage').attr('href', $('#SelectRecPerPage').attr('action') + '/limit:' + $(obj).val() + '/');
    }
    getData($('#SelectRecPerPage'), '.sub_div0');
}
function hideSubDiv() {
    $.each($('.cont-box'), function(k, v) {
	if(k > 0) {
	    var class_name = '.sub_div' + (k);
//            var tab_selector = 'li[aria-controls=tabs-' + k + ']';
	    $(class_name).hide();
//	    $(tab_selector).hide();
            
	}
    });
}
function appendToHref(href, class_name) {
    var count = (href.split(/\//g).length - 1);
    var id, model_name;
    class_name = (typeof class_name == 'undefined') ? '.sub_div0' : class_name;
    var current_update_div = (parseInt(class_name[class_name.length - 1]) + 1);
    $.each($('.cont-box'), function(k, v) {	
	class_name = '.sub_div' + (k);
        var classes_attached = $(this).attr('class');
        var div_id = classes_attached.substring(parseInt(classes_attached.indexOf('sub_div')) + 8, parseInt(classes_attached.indexOf('sub_div')) + 7)
//	if($(this).is(':visible')) {
	if(parseInt(div_id) < current_update_div) {
	    id = $(class_name).find('tr:first').children(':last').html();
	    if(typeof id != 'undefined') {
		id = id.trim();
	    }
	    model_name = $(class_name).children(':first').children(':first').find('h2').html();
	    if(typeof model_name != 'undefined') {
                var arr_model_name = model_name.split(' - ');
                model_name = arr_model_name[0];
		model_name = model_name.trim();
	    }
	    if(typeof model_name != 'undefined' && typeof id != undefined && id > 0) {
		model_name = model_name.replace(" ", "_");
		model_name = model_name.toLowerCase()
		if(count == 2) {
		    href += '/index'
		}
		var append_href = '/sub_div_view' + k + ':' + model_name + '-' + id;
		if(href.indexOf (append_href) == -1)
		    href += append_href;
	    }
	}
    });    
    
    return href;
}

function initDatePicker() {
    $("input[maxlength=10]").addClass("inputDate");
    $("input[maxlength=10]").datepicker({
        showOn: "button",
        buttonImage: "/img/images/calendar.gif",
        buttonImageOnly: true,
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true
    });
}
function initDatePickerPastDates() {
    $("#PrintingCenterDateOfFirstIssue, #MembershipDateOfEstablishment, #MembershipDateOfFirstIssue, #AuditorFirmDateOfEstablishment").addClass("inputDate");
    $("#PrintingCenterDateOfFirstIssue, #MembershipDateOfEstablishment, #MembershipDateOfFirstIssue, #AuditorFirmDateOfEstablishment").datepicker({
        showOn: "button",
        buttonImage: "/img/images/calendar.gif",
        buttonImageOnly: true,
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        maxDate: '0'
    });
    $("#PrintingCenterDateOfFirstIssue, #MembershipDateOfEstablishment, #MembershipDateOfFirstIssue, #AuditorFirmDateOfEstablishment").off('blur');
    $("#PrintingCenterDateOfFirstIssue, #MembershipDateOfEstablishment, #MembershipDateOfFirstIssue, #AuditorFirmDateOfEstablishment").on('blur', function() {
        var myDate = $(this).val();
        myDate = myDate.split("-");
        var newDate = myDate[1] + "/" + myDate[0] + "/" + myDate[2];
        if (new Date(newDate).getTime() > new Date().getTime()) {
            $(this).val('');
        }
    });
}
// As per ticket: http://mantis.quadzero.in/view.php?id=781
function initDatePickerChqDates() {
    $("#MembershipPaymentDateOfChqueDdNo").attr("readonly", "readonly");
    $("#MembershipPaymentDateOfChqueDdNo").addClass("inputDate highlighted");
    $("#MembershipPaymentDateOfChqueDdNo").datepicker({
        showOn: "button",
        buttonImage: "/img/images/calendar.gif",
        buttonImageOnly: true,
        dateFormat: "dd-mm-yy",
        changeMonth: true,
        changeYear: true,
        maxDate: '0',
        minDate: '-90'
    });
}
function resetButtonClick() {
    $('.searchHeader input, .searchHeader select').val('');
    $('.submit input[type=submit]').submit();

}
function multiSelectValidate() {    
    var last_valid_selection = [];
    $.each($('select[maximum-select-option]'), function(k, v) {
        last_valid_selection[$(this).attr('id')] = $(this).val();
    });


    $('select[maximum-select-option]').change(function(event) {
        var maxSelection = $('select[maximum-select-option]').attr('maximum-select-option');
        if ($(this).val().length > maxSelection) {
            alert('You can only choose ' + maxSelection);
            $(this).val(last_valid_selection[$(this).attr('id')]);
        } else {
            last_valid_selection[$(this).attr('id')] = $(this).val();
        }
    });
}
function bindUnbindActions() {
    // inner pages somehow are having duplicate
    $(".dashboardTable").length > 1 ?  $(".dashboardTable").siblings('.dashboardTable:last').remove() : '';
//    bindUnbindAddress();
    validateProposer();
    hideShowPCNewlyStarted();
    setTimeout("$('#flashMessage').delay('10000').slideUp('slow');", 3000);
    city_state();
    initDatePickerChqDates();
    initDatePickerPastDates();
    initDatePicker();
    $("#MembershipProposer1RepresentativeId, #MembershipProposer2RepresentativeId").change(function(){validateProposer();})
    multiSelectValidate();    
    $.each($('a'), function(index, obj) {
        if (typeof $(obj).attr('href') != 'undefined' && ($(obj).attr('href').indexOf("delete") > -1 || $(obj).attr('target') != '_blank')) {
            $(obj).attr('confirm', $(obj).attr('onclick'));
            $(obj).removeAttr('onclick');
        }
    });
    $('body a').not('.ui-tabs-anchor').unbind('click');
    $('body a').not('.ui-tabs-anchor').click(function(e) {
        return getData(this, '.sub_div0');
    });
    $('.submitBar button[type=reset]').unbind('click');
    $('.submitBar button[type=reset]').click(function(e) {
        resetButtonClick();
    });
    $.each($('form'), function(k, obj) {
        addJqueryValidation($(obj));
    });

    if (typeof datePickerController != 'undefined') {
        datePickerController.destroy();
        datePickerController.create();
    }

    customBindUnbind();   
    start_alaxos();
}
function populateSelectFromArr(data, selector, empty_value) {
    $(selector).html('');
    if (typeof empty_value !== 'undefined') {
        populateSelect(selector, '', empty_value);
    }
    $.each(data, function(key, value) {
        if (typeof value != 'undefined') {
            populateSelect(selector, key, value);
        }
    });
}
function populateSelect(selector, key, value)
{    
    $(selector).
    append($("<option></option>").
        attr("value",key).
        text(value));
}
function resetZone() {
    resetState();
    populateSelectFromArr([], ".AddressZoneId", 'Select Zone');
}
function resetState() {
    resetDistrict();
    populateSelectFromArr([], ".AddressStateId", 'Select State');
}
function resetDistrict() {
    resetCity();
    populateSelectFromArr([], ".AddressDistrictId", 'Select District');
}
function resetCity() {
    populateSelectFromArr([], ".AddressCityId", 'Select City');
}
$(document).ready(function() {    
    tabs = $( "#tabs" ).tabs();
    hideSubDiv();
    bindUnbindActions(); 
    History.Adapter.bind(window,'statechange',function(){    
    var State = History.getState();
        goToPage(State.data.page, State.data.update_div);
        return false;
    });
    $(document).ajaxStart(function() {
        loadAjaxDiv();
    });
    $(document).ajaxStop(function() {
        bindUnbindActions();
        hideAjaxDiv();
        showSessionMessage();
    });
    $( document ).ajaxError(function( event, jqxhr, settings, exception ) {
        if (jqxhr.status == '403') {
            location.href = '/users/login';
        }
    });
    $('#ajax_message').delay('10000').slideUp('slow');
    tab_selector = '#ui-id-1';
    update_div = '.sub_div0';
    update_tab_title(tab_selector, update_div, 1);
});
function cursorPosition() {
    $('.form input:visible:first').focus();
    if ($('#MembershipPublicationId').attr('id') != 'undefined') {
        $('#MembershipPublicationId').focus();
    }
    if ($('#QualifyingCirculationSingleCopy').attr('id') != 'undefined') {
        $('#QualifyingCirculationSingleCopy').focus();
    }
    if ($('#SubscriptionSchemeNameOfTheScheme').attr('id') != 'undefined') {
        $('#SubscriptionSchemeNameOfTheScheme').focus();
    }
}
function loadAjaxDiv() {
    $("div.bgAjaxLoad, img.ajaxLoading").show();
}
function hideAjaxDiv() {
    $("div.bgAjaxLoad, img.ajaxLoading").hide();
}
function showSessionMessage() {
    $.ajax({
        url: "/dynamic_pages/display_session_message",
        global: false,
        success: function(data) {
            showMessage(data)
        }              
    });
}
function showMessage(data) {
    if ($.trim(data) != '') {
        $('#ajax_message').html(data);
        if ($('#ajax_message').is(":hidden")) {
            $('#ajax_message').slideDown('slow').delay('10000').slideUp('slow');
        }
    }
}
function display_result(update_div, url, data) {
//	hideSubDiv();
    if ((url.indexOf("/users/login") > -1) && $.trim(data) == "") {
        location.reload(true);
    }
    var tab_index = (parseInt(update_div[update_div.length - 1]) + 1);
    if (isNumber(tab_index)) {
        var tab_selector = '#ui-id-' + tab_index;    
        $(tab_selector).click(); 
    }
    $(update_div).html(data);
    $(update_div).show();
    if (isNumber(tab_index)) {
//      console.log($(update_div + " h2").text());
        update_tab_title(tab_selector, update_div, tab_index);
        removeFKSelections(update_div, tab_index);
    }
}
function removeFKSelections(update_div, tab_index) {
    if (typeof $(update_div + ' form:first').attr('id') == 'undefined' || typeof $(update_div + ' form:first').attr('id') == '') {
        return;
    }
    if (tab_index > 1) {
        var len = 0;
        if ($(update_div + ' form:first').attr('id').substr($(update_div + ' form:first').attr('id').length - 14) == 'AdminIndexForm') {
            len = 14;
        } else if ($(update_div + ' form:first').attr('id').substr($(update_div + ' form:first').attr('id').length - 14) == 'AdminIndexForm') {
            len = 15;
        }
        var currentModel = $(update_div + ' form:first').attr('id').substr(0, $(update_div + ' form:first').attr('id').length - len);
        var field, temp_field;
        $.each($('.h2-center h2'), function(k,v){
            temp_field = $(v).parent().parent().parent().find('.view td:first').text().trim().replace(/\ /g, '');
            if (temp_field) {
                field = currentModel + $(v).parent().parent().parent().find('.view td:first').text().trim().replace(/\ /g, '');
                $('#'+field).hide();
            }
        })
    }
}
function update_tab_title(tab_selector, update_div, tab_index) {
    var text = $(update_div + " h2").text();
    if ($.trim(text) == '') {
        text = $(update_div + " h3").text();
    }
    if (text == '' && tab_selector == '#ui-id-1') {
        text = 'Home';
    }
    $(tab_selector).html(text);
    enable_disable_tabs(tab_index);
}
function enable_disable_tabs(tab_index) {    
    $.each($('.tabslink'), function() {
        var tab_id = $(this).attr('id');
        var tabNum = parseInt(tab_id[tab_id.length - 1]);
        if (tabNum > tab_index) {
            $(this).parent().hide();
        } else {
            $(this).parent().show();
        }
    })
}
function ajaxGet(href, update_div) {
    $.get(href, function(data) {        
//            $(update_div).show();
        display_result(update_div, href, data);
    });
}
function getData(obj, update_div, href) {
    if (typeof href != 'undefined') {
        ajaxGet(href, update_div);
        return false;
    }    
    var href = $(obj).attr('href');
    if (checkIfValidHref(obj) === true) {
//        hideSubDiv();
        /*
        if(href == 'history_back#') {
            var State = History.getState();
            href = State.data.page;
        }
        else {
            History.pushState({'page':current_href});
        }
        */
        var has_class = '';
        var class_name = '';
        var final_k = 0;
        $.each($('.cont-box'), function(k, v) {            
            parent_class_name = '.sub_div' + (k-1);		
            has_class = 'sub_form';
            class_name = '.sub_div' + (k+1);
            if($(obj).hasClass(has_class) && $(obj).hasParent(parent_class_name).length > 0) {
                class_name = '.sub_div' + (k);
                update_div = class_name;
                final_k = k;

            } else if(final_k === 0 && $(obj).hasParent(class_name).length > 0) {
                update_div = class_name;
                final_k = k + 1;
            } 
        });	    
        for(var i=0; i < $('.cont-box').length; ++i) {
            class_name = '.sub_div' + (i);
            if(i <= final_k) {                
//                $(class_name).show();
                if(i == final_k) {                    
                    $(class_name).html('');
                }
            } else {
                $(class_name).hide();
                $(class_name).html('');
            }

        }
        href = appendToHref(href, '.sub_div' + (final_k - 1));
        href = href + '?t=' + Date.now();
        History.pushState({'page':href,'update_div':update_div});
//        ajaxGet(href, update_div);
    } else if (href == "" || href == [] || typeof href == "undefined") { // required for features like autocomplete
        return true;
    } else if (checkIfReload(obj)) {
        return true;
    }
    return false;
}
function checkIfReload(obj) {
    var href = $(obj).attr('href'); 
    if (href.indexOf("/print:1") > -1 || href.indexOf("export_excel") > -1 || href.indexOf("/users/logout") > -1 || href.indexOf("/download/") > -1 || $(obj).attr('target') == '_blank') {
        return true;
    }
}
function checkIfValidHref(obj) {
    var href = $(obj).attr('href');
    if (typeof href == 'undefined' || href[0] == '#' || checkIfReload(obj)) {
        return false;
    }
    if (href.indexOf("delete") > -1) {
        return eval($(obj).attr('confirm').substring(6));
    }
    return true;
}
function postForm($form, update_div) {
    customPostCkEditor();
    /* get some values from elements on the page: */
//	    var $form = $( this ),
    var formID = $($form).attr('id');
    var post_data = null;
    if (typeof formID != 'undefined') {
        if(formID.indexOf("IndexForm") > 0) {
            post_data = $("#" + formID + " .searchHeader input, #" + formID + " .searchHeader select").serialize();
        }
    }
            if (!post_data) {
                post_data = $form.serialize();
            }
            url = $form.attr('action');
    
    if (typeof update_div == 'undefined') {
        var update_div = '.sub_div0';
        $.each($('.cont-box'), function(k, v) {
            if (k > 0) {
                var class_name = '.sub_div' + k;
                if ($form.hasParent(class_name).length > 0) {
                    update_div = class_name;
                    url = appendToHref($form.attr('action'), '.sub_div' + k);
                }
            }
        });   
    }
    /* Send the data using post */
    var posting = $.post(url, post_data);

    /* Put the results in a div */
    posting.done(function(data) {
        display_result(update_div, url, data);
    });
    return false;
}
function addCustomValidation() {
    if(typeof $('#CoverPriceCoverPrice').attr('id') != 'undefined') {
        $("#CoverPriceCoverPrice").rules("add", {
            required: true,
             min: 0.50,
             max: 99.99,
        });
    }
    if(typeof $('#SubscriptionSchemeCoverPrice').attr('id') != 'undefined') {
        $("#SubscriptionSchemeCoverPrice").rules("add", {
            required: true,
             min: 0.50,
        });
    }
    if(typeof $('#DistributionCenterApproxAverageNoOfCopiesSupplied').attr('id') != 'undefined') {
        $("#DistributionCenterApproxAverageNoOfCopiesSupplied").rules("add", {
            required: true,
             min: 1,
        });
    }
    if(typeof $('#RniDetailAdminAddForm #RniDetailFileRniDocument, #RniDetailAdminCopyForm #RniDetailFileRniDocument, #RniDetailClientAddForm #RniDetailFileRniDocument').attr('id') != 'undefined') {
        $("#RniDetailFileRniDocument").rules("add", {
                required: true,
                messages: {
                    required: 'Please select file'
                }
        });
    }
    if(typeof $('#MembershipClientAddForm #MembershipFilePubConfrLetter, #MembershipAdminCopyForm #MembershipFilePubConfrLetter, #MembershipAdminAddForm #MembershipFilePubConfrLetter').attr('id') != 'undefined') {
        $("#MembershipFilePubConfrLetter").rules("add", {
                required: true,
                messages: {
                    required: 'Please select file'
                }
        });
    }
    if(typeof $('#MembershipClientAddForm #MembershipFileLetterOfAuth, #MembershipAdminCopyForm #MembershipFileLetterOfAuth, #MembershipAdminAddForm #MembershipFileLetterOfAuth').attr('id') != 'undefined') {
        $("#MembershipFileLetterOfAuth").rules("add", {
                required: true,
                messages: {
                    required: 'Please select file'
                }
        });
    }
    // trigger key to check for total
    if (typeof $('#QualifyingCirculationClientAddForm, #QualifyingCirculationClientEditForm').attr('id') != 'undefined') {
        setTimeout("$('#QualifyingCirculationTotalSsSaAverageMonthlyQualifyingCirculation1').keyup();", 10);
    }
    if(typeof $('#MembershipChqueDdNo').attr('id') != 'undefined') {
        $("#MembershipChqueDdNo").rules("add", {
            number: true
        });
    }
    if(typeof $('#AddressStdCode').attr('id') != 'undefined') {
        $("#AddressStdCode").rules("add", {
            number: true
        });
    }
    if(typeof $('#UserConfirmPassword').attr('id') != 'undefined') {
        $("#UserConfirmPassword").rules("add", {
            equalTo: "#UserPassword",
            required: true
        });
    }
    
    if(typeof $('#UserRegisterForm, #UserAdminAddForm').attr('id') != 'undefined') {
        $("#UserUsername").rules("add", {
            alphanum: true
        });
    }
}
function addRequiredValidationForAddress() {
    if(typeof $('#AddressPin').attr('id') != 'undefined') {
        $("#AddressPin").rules("add", {
            required: true,
             minlength: 6,
             maxlength: 6
        });
    }
    if(typeof $('#AddressStdCode').attr('id') != 'undefined') {
        $("#AddressStdCode").rules("add", {
            required: true,
             minlength: 2,
             maxlength: 5
        });
    }
    if(typeof $('#AddressPhoneNumber1').attr('id') != 'undefined') {
        $("#AddressPhoneNumber1").rules("add", {
            required: true,
             minlength: 5,
             maxlength: 8
        });
    }
//    if ((typeof $('#AuditorBranchAdminAddForm').attr('id') != 'undefined' || typeof $('#AuditorBranchAdminEditForm').attr('id') != 'undefined' || typeof $('#AuditorBranchAdminCopyForm').attr('id') != 'undefined' || typeof $('#PartnerAdminAddForm').attr('id') != 'undefined' || typeof $('#PartnerAdminEditForm').attr('id') != 'undefined' || typeof $('#PartnerAdminCopyForm').attr('id') != 'undefined') == false) {
//        if(typeof $('#AddressPhoneNumber2').attr('id') != 'undefined') {
//            $("#AddressPhoneNumber2").rules("add", {
//                required: true,
//                 minlength: 10,
//                 maxlength: 11
//            });
//        }
//    }
    if(typeof $('#AddressFaxNumber').attr('id') != 'undefined') {
        $("#AddressFaxNumber").rules("add", {
            required: false,
             minlength: 5,
             maxlength: 8
        });
    }
}
function addRequiredValidation(fieldId, message) {
    if ($("#" + fieldId).length > 0 && !($("#" + fieldId).prop("tagName") == 'span' || $("#" + fieldId).prop("tagName") == 'SPAN')) {
        $("#" + fieldId).rules("add", {
            required: true,
            messages: {
                required: message
            }
        });
    }
}
/* Start: Validation function */
function addJqueryValidation(obj) {
    if (obj.length > 0) {
        var arrTypes = ['EditForm', 'CopyForm', 'AddForm', 'UserRegisterForm', 'UserLoginForm'];
        var form_id = obj.attr('id');
        if (!form_id) {
            return;
        }
        var editType = obj.attr('id').substr(obj.attr('id').length - 8);
        var addType = obj.attr('id').substr(obj.attr('id').length - 7);
        if ($.inArray(addType, arrTypes) >= 0 || $.inArray(editType, arrTypes) >= 0 || $.inArray(obj.attr('id'), arrTypes) >= 0) {
            obj.validate({
                submitHandler: function(form) {
                    if ($("input[type=file]").length > 0) {
                        form.submit();
                    } else {
                        postForm($(form));
                    }
                }
            });
            var reqFields = [
                /* Signup Start */
                ['UserUsername', 'Please enter username'],
                ['UserPassword', 'Please enter password'],
                ['UserEmailAddress', 'Please enter email'],
                ['UserFirstName', 'Please enter first name'],
                ['UserLastName', 'Please enter last name'],
                /* Client add membership */
                ['MembershipPublicationId', 'Please enter'],
                ['MembershipEditionId', 'Please enter'],
                ['MembershipPublicationTypeId', 'Please enter'],
                ['MembershipLanguageId', 'Please enter'],
                ['MembershipFrequencyTypeId', 'Please enter'],
                ['MembershipCoverPrice', 'Please enter'],
                ['MembershipDateOfFirstIssue', 'Please enter'],
                ['MembershipBankName', 'Please enter'],
                ['MembershipBranchName', 'Please enter'],
                ['MembershipChqueDdNo', 'Please enter'],
                ['MembershipDateOfChqueDdNo', 'Please enter'],
                ['MembershipProposer2RepresentativeId', 'Please enter'],
                ['MembershipProposer1RepresentativeId', 'Please enter'],
                ['MembershipCategoryId', 'Please enter'],
                /*Client add membership*/
                ['MembershipName', 'Please enter'],
                ['MembershipDateOfEstablishment', 'Please enter'],
                ['MembershipCompanyTypeId', 'Please enter'],
                ['MembershipNatureOfBusiness', 'Please enter'],
                ['MembershipProductOrServicesAdvertised', 'Please enter'],
                ['MembershipTotalExpOnPressAdverDuringPrevYr', 'Please enter'],
                ['MembershipNameOfPublicationsUsedForAdvert', 'Please enter'],
                /*Client add cover price*/
                ['CoverPricePrice', 'Please enter'],
                /*Client add rni detail*/
                ['RniDetailRniNumber', 'Please enter'],
                /*Client add representative*/
                ['RepresentativeRepresentativeName', 'Please enter'],
                ['RepresentativeDesignation', 'Please enter'],
                /*Company / Proprietor Name*/
                ['HoldingCompanyHoldingCompanyName', 'Please enter'],
                /*address_form*/
                ['AddressEmail', 'Please enter'],
                ['AddressAddressLine1', 'Please enter'],
//                ['AddressAddressLine2', 'Please enter'],
                ['AddressCountryId', 'Please enter'],
                ['AddressZoneId', 'Please enter'],
                ['AddressDistrictId', 'Please enter'],
                ['AddressPin', 'Please enter'],
                ['AddressStdCode', 'Please enter'],
                ['AddressPhoneNumber1', 'Please enter'],
                ['AddressStateId', 'Please enter'],
                ['AddressCityId', 'Please enter'],
                ['SubscriptionSchemeNameOfTheScheme', 'Please enter'],
                ['SubscriptionSchemeCoverPrice', 'Please enter'],
                ['SubscriptionSchemeSubscriptionRate', 'Please enter'],
                ['SubscriptionSchemeDiscount', 'Please enter'],
                ['SubscriptionSchemeValueOfTheGift', 'Please enter'],
                ['SubscriptionSchemeTradeDiscount', 'Please enter'],
                ['SubscriptionSchemeAnyOtherExpenses', 'Please enter'],
                ['SubscriptionSchemeBalanceAmountRetained', 'Please enter'],
                ['SubscriptionSchemeNoOfCopies', 'Please enter'],
                ['DistributionCenterDistributionCenterName', 'Please enter'],
                //['DistributionCenterNameAddress', 'Please enter']
                //printing centers
                ['PrintingCenterDateOfFirstIssue', 'Please enter'],
                ['PrintingCenterClaimedCirculation', 'Please enter'],
                ['PrintingCenterSizeOfPage', 'Please enter'],
                ['PrintingCenterNumberOfPages', 'Please enter'],
                ['PrintingCenterWidthOfColumn', 'Please enter'],
                ['PrintingCenterLengthOfColumn', 'Please enter'],
                ['PrintingCenterNumberOfColumnsPerPage', 'Please enter'],
                ['PrintingCenterTypeOfPaperUsed', 'Please enter'],
                ['PrintingCenterTypeOfPrintingMachine', 'Please enter'],
                ['PrintingCenterPrintingCapacity', 'Please enter'],
                ['PrintingCenterPrintingUnits', 'Please enter'],
                ['PrintingCenterCapacityPerPrintingUnits', 'Please enter']
            ];
            $(reqFields).each(function(index) {
                addRequiredValidation(reqFields[index][0], reqFields[index][1]);
            });
            addRequiredValidationForAddress();
            addCustomValidation();
        } else {
            obj.submit(function(event) {
                postForm($(this));
                event.preventDefault();
            });
        }
    }
}
function resetCountryZoneDistrict() {
    var data = [];
    populateSelectFromArr(data, ".AddressCountryId", 'Select Country');                                      
    populateSelectFromArr(data, ".AddressZoneId", 'Select Zone');                                          
    populateSelectFromArr(data, ".AddressDistrictId", 'Select District'); 
    populateSelectFromArr(data, ".AddressStateId", 'Select State');                                          
}
function city_state() {
    var $select = $('#AddressCityId, #MembershipEditionId, #PrintingCenterPrintedAtId, #WhiteFormCityId').selectize({
    valueField: 'city_id',
    labelField: 'city_name',
    searchField: 'city_name',
    create: false,
    onChange: function(value) {
                if ($(this.$input).attr('id') != 'AddressCityId') return;
                var data = [];
                if (!value.length) {                                               
                    resetCountryZoneDistrict();
                    return;
                }
                $ul = $('div [city_id=' + value + ']');
                if($ul.length > 0) {
                    data[$($ul).children('.country').attr('country_id')] = $($ul).children('.country').attr('country_name');
                    populateSelectFromArr(data, ".AddressCountryId");
                    data = [];
                    data[$($ul).children('.zone').attr('zone_id')] = $($ul).children('.zone').attr('zone_name');
                    populateSelectFromArr(data, ".AddressZoneId");                        
                    data = [];
                    data[$($ul).children('.state').attr('state_id')] = $($ul).children('.state').attr('state_name');
                    populateSelectFromArr(data, ".AddressStateId");
                    data = [];
                    data[$($ul).children('.district').attr('district_id')] = $($ul).children('.district').attr('district_name');
                    populateSelectFromArr(data, ".AddressDistrictId");
                }
            },
    render: {
        option: function(item, escape) {
            var strCity = escape(item.city_name);
            if (("district_name" in item)) {
                strCity += ', ' + item.district_name;
            }
            if (("state_name" in item)) {
                strCity += ', ' + item.state_name;
            }
            return '<div>' +
                '<span class="title">' +
                    '<span class="by">' + strCity + '</span>' +
                '</span>' +
                '<ul class="meta display_none" city_id="' + escape(item.city_id) + '">' +
                    (item.district_name ? '<li district_id="' + escape(item.district_id) + '"  district_name="' + escape(item.district_name) + '" class="district">' + "District Name: " + escape(item.district_name) + '</li>' : '') +
                    (item.state_name ? '<li state_id="' + escape(item.state_id) + '"  state_name="' + escape(item.state_name) + '" class="state">' + "State Name: " + escape(item.state_name) + '</li>' : '') +
                    (item.zone_name ? '<li zone_id="' + escape(item.zone_id) + '" zone_name="' + escape(item.zone_name) + '" class="zone">' + "Zone Name: " + escape(item.zone_name) + '</li>' : '') +
                    (item.country_name ? '<li country_id="' + escape(item.country_id) + '" country_name="' + escape(item.country_name) + '" class="country">' + "Country Name: " + escape(item.country_name) + '</li>' : '') +
                '</ul>' +
            '</div>';
        }
    },
    score: function(search) {
        var score = this.getScoreFunction(search);
        return function(item) {
            return score(item) * (1);
        };
    },
    load: function(query, callback) {
        if (!query.length || query.length < 1) return callback();
        var stateName = ($('#WhiteFormStateId').length > 0 && $('#WhiteFormStateId').val() > 0) ? ('/State.id:' + encodeURIComponent($('#WhiteFormStateId').val())) : '';
        var districtName = ($('#WhiteFormDistrictId').length > 0 && $('#WhiteFormDistrictId').val() > 0) ? ('/District.id:' + encodeURIComponent($('#WhiteFormDistrictId').val())) : '';
        $.ajax({
            url: '/users/getCityState/City/city_name%20like:' + encodeURIComponent(query) + '%25' + stateName + '%25' + districtName,
            type: 'GET',
            error: function() {
                callback();
            },
            success: function(res) {
                callback(res.slice(0, 500));
            },
            global: false
        });
    }
});
if ($select[0]) {
    // fetch the instance
    selectizeCityState = $select[0].selectize; 
    $('#WhiteFormStateId').unbind('change');
    $('#WhiteFormStateId').bind('change', function() {
        selectizeCityState.clearOptions();
        populateSelectFromArr([], "#WhiteFormDistrictId", 'Select District');
        if ($(this).val() != "") {
            $.ajax({
                url: '/districts/getDistrict/' + $(this).val(),
                success: function(data) {
                    populateSelectFromArr(data, "#WhiteFormDistrictId", 'Select District');
                },
                global: false
              });
        }
    });
//    $('#WhiteFormDistrictId').bind('change', function() {
//        selectizeCityState.clearOptions();
//        populateSelectFromArr([], "#WhiteFormCityId", 'Select City');
//        if ($(this).val() != "") {
//            $.get('/cities/getCities/' + $(this).val(), function(data) {
//                populateSelectFromArr(data, "#WhiteFormCityId", 'Select City');
//            });
//        }
//    });
    $('#WhiteFormDistrictId').unbind('change');
    $('#WhiteFormDistrictId').bind('change', function() {
        selectizeCityState.clearOptions();
    });
}

}
function customBindUnbind() {
    setCursorForWhiteForm();
    manageMembershipFields();
    manageFeebSlabsFields();
    _tenPerctRule();
    var temp_html = $('.pending').html() ? $('.pending').html() : '';
    if(temp_html.length > 0 && temp_html.trim() == '') {
        $('.pending').hide();
    }
     monthsOnIncoming();
    if ($("#QualifyingCirculationClientAddForm").length > 0 || $("#QualifyingCirculationClientEditForm").length > 0) {
        $('input[readonly=readonly]').not('.average_monthly').removeClass('inputInteger');
        subTotalIncoming();
    }
    if ($("#QualifyingCirculationClientEditForm").length > 0) {
        updateSubTotalOnload();
        updateAverageMonthlyOnload();
        updateTotal();
        $("#QualifyingCirculationClientEditForm input[type=text]:last").keyup();
    }    
    bindCkEditor();
    if (typeof $('#MembershipPaymentDateOfChqueDdNo').attr('id') !== 'undefined') {
       addLinkToGetFees();
    }
    bindGetFeeSlabsLink();    
    updateHaveRNIno();
    if (typeof $('.add #PartnerAuditorBranchId, .edit #PartnerAuditorBranchId, .copy #PartnerAuditorBranchId').attr('id') !== 'undefined') {
        $('#PartnerAuditorBranchId').on('change', function() {
            var tempVal = $(this).val();
            var tempId = $(this).attr('id');
            getData('', '.' + $(this).parents('.cont-box').attr('class').substring(9,17), '/admin/partners/add/copy_address:1/field_to_set:auditor_branch_id/model:AuditorBranch/id:' + $(this).val());            
        })
    }
    hideAddEditLinksOnPartnersIndex();
    populate_representatives();
    getPublication(); 
    getHoldingCompany();
    nrr_calculation();
    subscription_scheme_calculation();
    incoming_validtion();
    default_variants();
    cover_price();
    getDistributionCenterName();
    bindWeekdaysSunday();
    white_form();
    SubscriptionSchemeSale();
    StatementANewsprint();
    tradeTermsValid();
    wasteRateValid();
    subscriptionSchemesValid();
    setTimeout("cursorPosition();", 700);
}
function getTotal(selector) {
    var sum = 0;
        //iterate through each textboxes and add the values
        $(selector).each(function(k, v) {
            //add only if the value is number
            if(!isNaN($(v).val()) && $(v).val() > 0) {
                sum += parseFloat($(v).val());
            }
        });
        //.toFixed() method will roundoff the final sum to 2 decimal places
        return sum.toFixed(2);
}
function getTotalFloat(selector) {
    var sum = 0;
        //iterate through each textboxes and add the values
        $(selector).each(function(k, v) {
            //add only if the value is number
            if(!isNaN($(v).val()) && $(v).val() > 0) {
                sum += parseFloat($(v).val());
            }
        });
        return sum;
}
function StatementANewsprint() {
    if ($('#StatementANewsprintClientAddForm').length > 0 || $('#StatementANewsprintClientEditForm').length > 0) {
        $.each($('.add_extra_row'), function(krow, elem) {
            var hide = 1;
            $.each($(this).children().children(), function(kinput, elementInput){
                var inputElm = elementInput;
                if ($(elementInput).children('input').length) {
                    inputElm = $(elementInput).children();
                }
                if (!($(inputElm).val() == "" || $(inputElm).val() == "Add more rows")) {
                    hide = 0;
                }
            });
            if (hide) {
                $(elem).hide()
            }
        })
//        $('.add_extra_row').hide();
        $('.row15').children().last().append('<input type="button" value="Add more rows" class="add_new_1"/>');
        $('.row75').children().last().append('<input type="button" value="Add more rows" class="add_new_1"/>');
        $('.row150').children().last().append('<input type="button" value="Add more rows" class="add_new_1"/>');
        $.each($('.add_extra_row'), function(e,v){
            $(v).children().last().append('<input type="button" value="Add more rows" class="add_new_1"/>');
        });
        $('.row65 .add_new_1').remove();
        $('.row125 .add_new_1').remove();
        $('.row200 .add_new_1').remove();
        $('.add_new_1').off('click');
        $('.add_new_1').on('click', function() {
            $(this).hide();
            $(this).parent().parent().next().show();
        });
        if ($("#StatementANewsprintClientAddForm").length > 0 || $("#StatementANewsprintClientEditForm").length > 0) {
            $("#StatementANewsprintClientAddForm input, #StatementANewsprintClientEditForm input").off('keyup');
            $("#StatementANewsprintClientAddForm input, #StatementANewsprintClientEditForm input").on('keyup', function() {
                var col1 = parseFloat(getTotal('input[oper=col1_add]')) - parseFloat(getTotal('input[oper=col1_less]'));
                var col2 = parseFloat(getTotalFloat('input[oper=col2_add]')) - parseFloat(getTotalFloat('input[oper=col2_less]'));
                var col3 = parseFloat(getTotal('input[oper=col3_add]')) - parseFloat(getTotal('input[oper=col3_less]'));
                var col4 = parseFloat(getTotalFloat('input[oper=col4_add]')) - parseFloat(getTotalFloat('input[oper=col4_less]'));
                $('#StatementANewsprintClosingStockAsOnReels').val(col1.toFixed(2));
                $('#StatementANewsprintClosingStockAsOnWeight').val(col2.toFixed(3));
                $('#StatementANewsprintClosingStockAsOnReams').val(col3.toFixed(2));
                $('#StatementANewsprintClosingStockAsOnRweight').val(col4.toFixed(3));
            });
        }
    }
}
function SubscriptionSchemeSale() {
    $("#SubscriptionSchemeSaleTypeId").off('change');
    $("#SubscriptionSchemeSaleTypeId").on('change', function() {
        $('.subscriptionSchemesTrPending').hide();
        $('.subscriptionSchemes' + $("#SubscriptionSchemeSaleTypeId").val()).parent().show();
    });
}
function bindGetFeeSlabsLink() {
    if (typeof $('#getFeeSlabsLink').attr('id') !== 'undefined') {
    $("#getFeeSlabsLink").unbind('click');
    $("#getFeeSlabsLink").on('click', function(e) {
        getFeeSlabs();
        e.stopPropagation();
        e.preventDefault();
    });
}
}
/* ABC specific functions */
function bindCkEditor() {
    if ($("#NotificationHtmlEmailContent").length > 0 && ($("#NotificationAdminAddForm").length > 0 || $("#NotificationAdminEditForm").length > 0 || $("#NotificationAdminCopyForm").length > 0)) {
        delete CKEDITOR.instances;
        CKEDITOR.instances = [];		
        CKEDITOR.replace('NotificationHtmlEmailContent');
        CKEDITOR.instances.NotificationHtmlEmailContent.setData($("#NotificationHtmlEmailContent").val());
    }    
}
function customPostCkEditor() {
    if ($("#NotificationHtmlEmailContent").length > 0) {
        $("#NotificationHtmlEmailContent").val(CKEDITOR.instances.NotificationHtmlEmailContent.getData());
    }
}
function manageMembershipFields() {
    var str_from_id = '#XYZ ';
    if (typeof $('#MembershipAdminAddForm').attr('id') !== 'undefined') {
        str_from_id = '#MembershipAdminAddForm ';
    } else if (typeof $('#MembershipAdminEditForm').attr('id') !== 'undefined') {
        str_from_id = '#MembershipAdminEditForm ';
    } else if (typeof $('#MembershipAdminCopyForm').attr('id') !== 'undefined') {
        str_from_id = '#MembershipAdminCopyForm ';
    } else if (typeof $('#MembershipClientAddForm').attr('id') !== 'undefined') {
        str_from_id = '#MembershipClientAddForm ';
    } else if (typeof $('#MembershipClientEditForm').attr('id') !== 'undefined') {
        str_from_id = '#MembershipClientEditForm ';
    } else if (typeof $('#MembershipClientCopyForm').attr('id') !== 'undefined') {
        str_from_id = '#MembershipClientCopyForm ';
    } else if ($('.memberships .view').children().length !== 'undefined') {
        str_from_id = '.memberships .view ';
    } else {
        return;        
    }
    hideShowMembershipFields($(str_from_id + ' #MembershipMembershipTypeId').val(), str_from_id);
    $(str_from_id + ' #MembershipMembershipTypeId').change(function(){
        hideShowMembershipFields($(this).val(), str_from_id);
    }); 
}
function manageFeebSlabsFields() {
    var str_from_id = '#XYZ ';
    if (typeof $('#FeeSlabAdminAddForm').attr('id') !== 'undefined') {
        str_from_id = '#FeeSlabAdminAddForm ';
    } else if (typeof $('#FeeSlabAdminEditForm').attr('id') !== 'undefined') {
        str_from_id = '#FeeSlabAdminEditForm ';
    } else if (typeof $('#FeeSlabAdminCopyForm').attr('id') !== 'undefined') {
        str_from_id = '#FeeSlabAdminCopyForm ';
    } else {
        return;
    }    
    hideShowFeeSlabsFields($(str_from_id + ' #FeeSlabMembershipTypeId').val(), str_from_id);
    $(str_from_id + ' #FeeSlabMembershipTypeId').change(function(){
        hideShowFeeSlabsFields($(this).val(), str_from_id);
    }); 
}
function hideShowFeeSlabsFields(id, str_from_id) {
    $(
            str_from_id + ' #FeeSlabFrequencyId, '  +
            str_from_id + ' #FeeSlabPublicationTypeId '
    ).parent().parent().parent().hide();
    $(
            str_from_id + ' #FeeSlabCirculationFrom, ' +
            str_from_id + ' #FeeSlabCirculationTo, ' +
            str_from_id + ' #FeeSlabAnnualExpenditureFrom, ' +
            str_from_id + ' #FeeSlabAnnualExpenditureTo, ' +
            str_from_id + ' #FeeSlabAnnualTurnoverFrom, ' +
            str_from_id + ' #FeeSlabAnnualTurnoverTo, ' +
            str_from_id + ' #FeeSlabApplicationFee, ' +
            str_from_id + ' #FeeSlabEntranceFee, ' +
            str_from_id + ' #FeeSlabAnnualSubscription '
        ).parent().parent().hide();
    if (id == 1) {
        $(
            str_from_id + ' #FeeSlabAnnualExpenditureFrom, ' +
            str_from_id + ' #FeeSlabAnnualExpenditureTo, ' +
            str_from_id + ' #FeeSlabEntranceFee, ' +
            str_from_id + ' #FeeSlabAnnualSubscription '
        ).parent().parent().show();
    } else if (id == 2) {        
         $(
            str_from_id + ' #FeeSlabAnnualTurnoverFrom, ' +
            str_from_id + ' #FeeSlabAnnualTurnoverTo, ' +
            str_from_id + ' #FeeSlabEntranceFee, ' +
            str_from_id + ' #FeeSlabAnnualSubscription '
        ).parent().parent().show();
    } else if (id == 3 || id == 4) {
        $(
            str_from_id + ' #FeeSlabEntranceFee, ' +
            str_from_id + ' #FeeSlabAnnualSubscription '
        ).parent().parent().show();
    } else if (id == 5) {
        $(
            str_from_id + ' #FeeSlabFrequencyId, '  +
            str_from_id + ' #FeeSlabPublicationTypeId '
        ).parent().parent().parent().show();
        $(
            str_from_id + ' #FeeSlabCirculationFrom, ' +
            str_from_id + ' #FeeSlabCirculationTo, ' +
            str_from_id + ' #FeeSlabApplicationFee, ' +
            str_from_id + ' #FeeSlabEntranceFee, ' +
            str_from_id + ' #FeeSlabAnnualSubscription '
        ).parent().parent().show();
    }
}
function hideShowMembershipFields(id, str_from_id) {
    $('form h2').html($( str_from_id + ' #MembershipMembershipTypeId option[selected=selected]').text());
    if (id == 1) {        
            $(      
                str_from_id + ' #MembershipPublicationId, ' + 
                str_from_id + ' #MembershipEditionId, ' +
                str_from_id + ' #ViewEditionId, ' +
                str_from_id + ' #MembershipPublicationTypeId, ' + 
                str_from_id + ' #MembershipLanguageId, ' + 
                str_from_id + ' #MembershipFrequencyTypeId, ' + 
                str_from_id + ' #MembershipCoverPrice, ' + 
                str_from_id + ' #MembershipCategoryId, ' +
                str_from_id + ' #MembershipBranchOffices, ' +
                str_from_id + ' #MembershipBelongToOtherProfOrg, ' +
                str_from_id + ' #MembershipOtherPublications, ' +                
//                str_from_id + ' #MembershipProposer1RepresentativeId, ' +                 
//                str_from_id + ' #MembershipProposer2RepresentativeId, ' + 
                str_from_id + ' #MembershipNameOfClientServed, ' + 
                str_from_id + ' #MembershipAgencyAccredited '
            
            ).parent().parent().parent().remove();
    
            $(
                str_from_id + ' #MembershipDateOfFirstIssue, ' +
                str_from_id + ' #MembershipFilePubConfrLetter, ' +
                str_from_id + ' #MembershipFileLetterOfAuth, ' +
                str_from_id + ' #ViewDateOfFirstIssue, ' +
                str_from_id + ' #MembershipClaimedCirculation '
            ).parent().parent().remove();
                
            $(str_from_id + ' .last_yr_exp').text('Total Expenditure on press advertising during the previous year');
    } else if (id == 2) {      
            $(      
                str_from_id + ' #MembershipPublicationId, ' + 
                str_from_id + ' #MembershipEditionId, ' +
                str_from_id + ' #ViewEditionId, ' +
                str_from_id + ' #MembershipPublicationTypeId, ' + 
                str_from_id + ' #MembershipLanguageId, ' + 
                str_from_id + ' #MembershipFrequencyTypeId, ' + 
                str_from_id + ' #MembershipCategoryId, ' +
                str_from_id + ' #MembershipCoverPrice, ' +
                str_from_id + ' #MembershipBranchOffices, ' +
                str_from_id + ' #MembershipBelongToOtherProfOrg, ' +
                str_from_id + ' #MembershipOtherPublications, ' +
//                str_from_id + ' #MembershipProposer1RepresentativeId, ' + 
//                str_from_id + ' #MembershipProposer2RepresentativeId, ' +  
                str_from_id + ' #MembershipNatureOfBusiness, ' + 
                str_from_id + ' #MembershipNameOfPublicationsUsedForAdvert, ' + 
                str_from_id + ' #MembershipProductOrServicesAdvertised '
            
            ).parent().parent().parent().remove();
    
            $(
                str_from_id + ' #MembershipDateOfFirstIssue, ' +
                str_from_id + ' #MembershipFilePubConfrLetter, ' +
                str_from_id + ' #MembershipFileLetterOfAuth, ' +
                str_from_id + ' #ViewDateOfFirstIssue '
            ).parent().parent().remove();
            
            $(str_from_id + ' .last_yr_exp').text('Gross press billing for previous financial year');                
    } else if (id == 3 || id == 4) {
            $(      
                str_from_id + ' #MembershipPublicationId, ' + 
                str_from_id + ' #MembershipEditionId, ' + 
                str_from_id + ' #ViewEditionId, ' +
                str_from_id + ' #MembershipPublicationTypeId, ' + 
                str_from_id + ' #MembershipLanguageId, ' + 
                str_from_id + ' #MembershipFrequencyTypeId, ' + 
                str_from_id + ' #MembershipCoverPrice, ' +
                str_from_id + ' #MembershipCategoryId, ' +
//                str_from_id + ' #MembershipBranchOffices, ' +
//                str_from_id + ' #MembershipBelongToOtherProfOrg, ' +
//                str_from_id + ' #MembershipOtherPublications, ' +
//                str_from_id + ' #MembershipProposer1RepresentativeId, ' +
//                str_from_id + ' #MembershipProposer2RepresentativeId, ' + 
                str_from_id + ' #MembershipNameOfClientServed, ' + 
                str_from_id + ' #MembershipAgencyAccredited, ' + 
                str_from_id + ' #MembershipNatureOfBusiness, ' + 
                str_from_id + ' #MembershipProductOrServicesAdvertised, ' + 
                str_from_id + ' #MembershipNameOfPublicationsUsedForAdvert '
            
            ).parent().parent().parent().remove();
                $(str_from_id + ' #OtherPublications').html('State the purpose for which you desire to avail the bureau\'s Services');
                $(str_from_id + ' #BelongToOtherProfOrg').html('Is the applicant Organisation a member of any other professional Organisation?<br/>If so, please state its name');
            $(
                str_from_id + ' #MembershipDateOfFirstIssue, ' +
                str_from_id + ' #MembershipFilePubConfrLetter, ' +
                str_from_id + ' #MembershipFileLetterOfAuth, ' +
                str_from_id + ' #ViewDateOfFirstIssue, ' +
                str_from_id + ' #MembershipClaimedCirculation, ' +
                str_from_id + ' #MembershipTotalExpOnPressAdverDuringPrevYr '
            ).parent().parent().remove();
    } else if (id == 5) {     
        $(      
                str_from_id + ' #MembershipName, ' + 
                str_from_id + ' #MembershipNameOfClientServed, ' + 
                str_from_id + ' #MembershipAgencyAccredited, ' + 
                str_from_id + ' #MembershipNatureOfBusiness, ' + 
                str_from_id + ' #MembershipProductOrServicesAdvertised, ' + 
                str_from_id + ' #MembershipNameOfPublicationsUsedForAdvert, ' + 
                str_from_id + ' #MembershipCompanyTypeId '
            
            ).parent().parent().parent().remove();
           $(
                str_from_id + ' #MembershipDateOfEstablishment, ' +
                str_from_id + ' #ViewDateOfEstablishment, ' +
                str_from_id + ' #MembershipTotalExpOnPressAdverDuringPrevYr '
            ).parent().parent().remove();
    }
}
function goToPage(href, update_div) {
    getData(null, update_div, href);
}
function subTotalIncoming() {
    $("#QualifyingCirculationClientAddForm .inputInteger, #QualifyingCirculationClientEditForm .inputInteger").unbind('keyup');
    $("#QualifyingCirculationClientAddForm .inputInteger, #QualifyingCirculationClientEditForm .inputInteger").on('keyup', function(event){
        $inputs = $(this).parent().parent().find('.inputInteger');
        updateSubTotal($inputs);
        updateAverageMonthly($inputs)
        updateTotal();
    })
    //$.each($('.subtotal'), function(e){console.log($(this).parent().parent().parent().find('input'))})
}
function updateSubTotalOnload() {
    $.each($(".subtotal").parent().parent(), function(k,v) {
        $inputs = $(this).find(".inputInteger")
        updateSubTotal($inputs)
    });
}
function updateSubTotal($inputs) {
    var subtotal = 0;
    var val = 0;  
    $.each($inputs, function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        subtotal = parseInt(subtotal) + parseInt(val);
    });    
    $($inputs).parent().parent().find('.subtotal').val(subtotal);
}
function updateTotal() {
    var sum_cir1 = 0;
    var sum_cir2 = 0;
    var sum_average_monthly = 0;
    var cir1_total_ns_trade=0;
    var cir2_total_ns_trade=0;
    var cir3_total_ns_trade=0;
    var total_ns_trade=0;
    var cir1_total_single_nnr=0;
    var cir2_total_single_nnr=0;
    var cir3_total_single_nnr=0;
    var total_single_nnr=0;
    var cir1_total_nss_incentive=0;
    var cir2_total_nss_incentive=0;
    var cir3_total_nss_incentive=0;
    var total_nss_incentive=0;
    var cir3_total_non=0;
    var total_non=0;
    var cur1_total_ss_trade=0;
    var cur2_total_ss_trade=0;
    var cur3_total_ss_trade=0;
    var total_ss_trade=0;
    var cur1_total_ss_cat=0;
    var cur2_total_ss_cat=0;
    var cur3_total_ss_cat=0;
    var total_ss_cat=0;
    var cur1_total_ss_incentive=0;
    var cur2_total_ss_incentive=0;
    var cur3_total_ss_incentive=0;
    var total_ss_incentive=0;
    var cur4_total_q_summary=0;


// iterate through each td based on class and add the values
    $.each($('.average_monthly').parent().parent().children(":nth-child(3)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        sum_cir1 = parseInt(sum_cir1) + parseInt(val);
    });
    $.each($('.average_monthly').parent().parent().children(":nth-child(4)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        sum_cir2 = parseInt(sum_cir2) + parseInt(val);
    });
    $.each($(".average_monthly"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        sum_average_monthly = parseInt(sum_average_monthly) + parseInt(val);
    });
    //
    $.each($('.nsstt .subtotal').parent().parent().children(":nth-child(3)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir1_total_ns_trade = parseInt(cir1_total_ns_trade) + parseInt(val);
    });
    $.each($('.nsstt .subtotal').parent().parent().children(":nth-child(4)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir2_total_ns_trade = parseInt(cir2_total_ns_trade) + parseInt(val);
    });
    $.each($('.nsstt .subtotal').parent().parent().children(":nth-child(5)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir3_total_ns_trade = parseInt(cir3_total_ns_trade) + parseInt(val);
    });
    $.each($(".nsstt .subtotal"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        total_ns_trade = parseInt(total_ns_trade) + parseInt(val);
    });
    //
    $.each($('.single_nnr .subtotal').parent().parent().children(":nth-child(3)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir1_total_single_nnr = parseInt(cir1_total_single_nnr) + parseInt(val);
    });
    $.each($('.single_nnr .subtotal').parent().parent().children(":nth-child(4)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir2_total_single_nnr = parseInt(cir2_total_single_nnr) + parseInt(val);
    });
    $.each($('.single_nnr .subtotal').parent().parent().children(":nth-child(5)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir3_total_single_nnr = parseInt(cir3_total_single_nnr) + parseInt(val);
    });
    $.each($(".single_nnr .subtotal"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        total_single_nnr = parseInt(total_single_nnr) + parseInt(val);
    });
   //
    $.each($('.nss_incentive .subtotal').parent().parent().children(":nth-child(3)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir1_total_nss_incentive = parseInt(cir1_total_nss_incentive) + parseInt(val);
    });
    $.each($('.nss_incentive .subtotal').parent().parent().children(":nth-child(4)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir2_total_nss_incentive = parseInt(cir2_total_nss_incentive) + parseInt(val);
    });
    $.each($('.nss_incentive .subtotal').parent().parent().children(":nth-child(5)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir3_total_nss_incentive = parseInt(cir3_total_nss_incentive) + parseInt(val);
    });
    $.each($(".nss_incentive .subtotal"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        total_nss_incentive = parseInt(total_nss_incentive) + parseInt(val);
    });
    //
    $.each($('.non .subtotal').parent().parent().children(":nth-child(5)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cir3_total_non = parseInt(cir3_total_non) + parseInt(val);
    });
    $.each($(".non .subtotal"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        total_non = parseInt(total_non) + parseInt(val);
    });
    //
    //
    $.each($('.ss_trade .subtotal').parent().parent().children(":nth-child(3)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur1_total_ss_trade = parseInt(cur1_total_ss_trade) + parseInt(val);
    });
    $.each($('.ss_trade .subtotal').parent().parent().children(":nth-child(4)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur2_total_ss_trade = parseInt(cur2_total_ss_trade) + parseInt(val);
    });
    $.each($('.ss_trade .subtotal').parent().parent().children(":nth-child(5)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur3_total_ss_trade = parseInt(cur3_total_ss_trade) + parseInt(val);
    });
    $.each($(".ss_trade .subtotal"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        total_ss_trade = parseInt(total_ss_trade) + parseInt(val);
    });
    //
    //
    $.each($('.ss_cat .subtotal').parent().parent().children(":nth-child(3)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur1_total_ss_cat = parseInt(cur1_total_ss_cat) + parseInt(val);
    });
    $.each($('.ss_cat .subtotal').parent().parent().children(":nth-child(4)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur2_total_ss_cat = parseInt(cur2_total_ss_cat) + parseInt(val);
    });
    $.each($('.ss_cat .subtotal').parent().parent().children(":nth-child(5)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur3_total_ss_cat = parseInt(cur3_total_ss_cat) + parseInt(val);
    });
    $.each($(".ss_cat .subtotal"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        total_ss_cat = parseInt(total_ss_cat) + parseInt(val);
    });
    //
    //
    $.each($('.ss_incentive .subtotal').parent().parent().children(":nth-child(3)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur1_total_ss_incentive = parseInt(cur1_total_ss_incentive) + parseInt(val);
    });
    $.each($('.ss_incentive .subtotal').parent().parent().children(":nth-child(4)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur2_total_ss_incentive = parseInt(cur2_total_ss_incentive) + parseInt(val);
    });
    $.each($('.ss_incentive .subtotal').parent().parent().children(":nth-child(5)").children(), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur3_total_ss_incentive = parseInt(cur3_total_ss_incentive) + parseInt(val);
    });
    $.each($(".ss_incentive .subtotal"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        total_ss_incentive = parseInt(total_ss_incentive) + parseInt(val);
    });
    //
    $.each($(".q_summary .inputInteger"), function(k,v) {
        val = (isNaN($(v).val()) || $(v).val() == '') ? 0 : $(v).val();
        cur4_total_q_summary = parseInt(cur4_total_q_summary) + parseInt(val);
    });
    $('.total_qcir1').val(sum_cir1);
    $('.total_qcir2').val(sum_cir2);
    if(sum_cir1 != "" && sum_cir2 != ""){
        $('.total_average_monthly, .cur4_total_q_summary').val(Math.round(sum_cir1/sum_cir2));
    }
    else
    {
        $('.total_average_monthly, .cur4_total_q_summary').val(0);
    }

    $('.cir1_total_ns_trade').val(cir1_total_ns_trade);
    $('.cir2_total_ns_trade').val(cir2_total_ns_trade);
    $('.cir3_total_ns_trade').val(cir3_total_ns_trade);
    $('.total_ns_trade').val(total_ns_trade);
    $('.cir1_total_single_nnr, .total_ss_sa_single_copy_sales').val(cir1_total_single_nnr);
    $('.cir2_total_single_nnr, .total_ss_sa_combo_sales_copies').val(cir2_total_single_nnr);
    $('.cir3_total_single_nnr').val(cir3_total_single_nnr);
    $('.total_single_nnr').val(total_single_nnr);
    $('.cir1_total_nss_incentive').val(cir1_total_nss_incentive);
    $('.cir2_total_nss_incentive').val(cir2_total_nss_incentive);
    $('.cir3_total_nss_incentive').val(cir3_total_nss_incentive);
    $('.total_nss_incentive').val(total_nss_incentive);
    $('.cir3_total_non, .total_ss_sa_institutional_sale_copies').val(cir3_total_non);
    $('.total_non').val(total_non);
    $('.cur1_total_ss_trade').val(cur1_total_ss_trade);
    $('.cur2_total_ss_trade').val(cur2_total_ss_trade);
    $('.cur3_total_ss_trade').val(cur3_total_ss_trade);
    $('.total_ss_trade').val(total_ss_trade);
    $('.cur1_total_ss_cat, .total_ss_sa_single_copy_subscription').val(cur1_total_ss_cat);
    $('.cur2_total_ss_cat, .total_ss_sa_joint_subscription_copies').val(cur2_total_ss_cat);
    $('.cur3_total_ss_cat, .total_ss_sa_institutional_subscription_copies').val(cur3_total_ss_cat);
    $('.total_ss_cat').val(total_ss_cat);
    $('.cur1_total_ss_incentive').val(cur1_total_ss_incentive);
    $('.cur2_total_ss_incentive').val(cur2_total_ss_incentive);
    $('.cur3_total_ss_incentive').val(cur3_total_ss_incentive);
    $('.total_ss_incentive').val(total_ss_incentive);
//    $('.cur4_total_q_summary').val(cur4_total_q_summary);

}
function updateAverageMonthlyOnload() {
    $.each($(".average_monthly").parent().parent(), function(k,v) {
        $inputs = $(this).find(".inputInteger")
        updateAverageMonthly($inputs)
    });
}
function updateAverageMonthly($inputs) {
    if ($($inputs).parent().find('.average_monthly').length > 0) {
        var average_monthly = 0;
        if ($($inputs[0]).val() != "" && $($inputs[1]).val() != ""){
        average_monthly = $($inputs[0]).val() / $($inputs[1]).val()
        $($inputs).parent().find('.average_monthly').val(Math.round(average_monthly));
    }
    else{
            $($inputs).parent().find('.average_monthly').val("");
        }
    }
}
function getFeeSlabs() {
    // @todo: Turn off global Ajax callback to off
    mem_id = $("#MembershipPaymentMembershipId").val();
    if (mem_id) {
        var query_str = "";
                
        $.getJSON("/client/fee_slabs/get_fee_slab/membership_id:" + $("#MembershipPaymentMembershipId").val() + query_str, function(data, status, xhr) {
                var fees = 0;
                var txt_fees = 'Total: INR ' + 0;
                if (data && data.application_fee) {
                    fees = data.application_fee;
                    txt_fees = fees.total_fee;
                } else if (data && data.entrance_fee) {
                    fees = data.entrance_fee;
                    txt_fees = fees.total_fee;
                } else if (typeof data[0] != 'undefined') {
                    fees = data[0].entrance_fee;
                    txt_fees = fees.total_fee;
                }  else if (typeof data[0] != 'undefined' && fees <= 0) {
                    fees = data[0].application_fee;
                    txt_fees = fees.total_fee;
                }
                if (fees.total_fee_amt > 0) {
                    $('#getFeeSlabsSpan').remove();
                    //$('#MembershipPaymentDateOfChqueDdNo').parent().append("<span id='getFeeSlabsSpan'>" +  txt_fees + "<span>");
                    $('#MembershipPaymentAmount').val(txt_fees);
                } else {
                    //$('#MembershipPaymentDateOfChqueDdNo').parent().append("<span id='getFeeSlabsSpan'>No details has been provided in system. Contact Audit Bureau of Circulation office for Fee details.<span>");
                    $('#MembershipPaymentAmount').val('No details has been provided in system. Contact Audit Bureau of Circulation office for Fee details.');
                }
        });
    }
}
function populate_representatives() {
    var $select = $('#MembershipProposer1RepresentativeId, #MembershipProposer2RepresentativeId').selectize({
    valueField: 'id',
    labelField: 'representative_name',
    searchField: 'representative_name',
    create: false,
    onChange: function(value) {
                var data = [];
                if (!value.length) {                                               
                    return;
                }
            },
    render: {
        option: function(item, escape) {
            return '<div>' +
                '<span class="title">' +
                    '<span class="by">' + escape(item.representative_name) + '</span>' +
                '</span>' +
                '<ul class="meta" city_id="' + escape(item.id) + '">' +
                    (item.member_name ? '<li member_name="' + escape(item.member_name) + '" class="member_name">' + "Member Name: " + escape(item.member_name) + '</li>' : '') +
                    (item.edition_name ? '<li edition_name="' + escape(item.edition_name) + '" class="edition_name">' + "Edition Name: " + escape(item.edition_name) + '</li>' : '') +
                    (item.publication_name ? '<li publication_name="' + escape(item.publication_name) + '" class="publication_name">' + "Publication Name: " + escape(item.publication_name) + '</li>' : '') +
                '</ul>' +
            '</div>';
        }
    },
    score: function(search) {
        var score = this.getScoreFunction(search);
        return function(item) {
            return score(item) * (1);
        };
    },
    load: function(query, callback) {
        if (!query.length || query.length < 1) return callback();
        selectizeRepresentative = $select[0].selectize;
        $.ajax({
            url: '/memberships/get_primary_representative/representative_name%20like:%25---' + encodeURIComponent(query) + '%25',
            type: 'GET',
            global: false,
            error: function() {
                callback();
            },
            success: function(res) {
                callback(res.slice(0, 500));
            }
        });
    }
});
}
function addLinkToGetFees() {
    $('#getFeeSlabsLink').remove();
    $('#MembershipPaymentChqueDdNo').parent().append('<span class="span_register"><a href="#" id="getFeeSlabsLink" title="Click To Get Amount Required For Processing Membership">Click To Get Amount Required For Processing Membership Fees</a></span>');
}
function updateHaveRNIno() {
    $('#MembershipAppliedForRniNo').on('click', function(){
        getData('', '', '/client/memberships/applied_for_rni_no/' + $('#MembershipAppliedForRniNo').is(':checked'));
        if ($('#MembershipAppliedForRniNo').is(':checked')) {
            $('#add_edit_rni_details, #link_have_rni_details, #span_have_rni_details').hide();
            $('.appliedForRNI').show();
        } else {
            $('#add_edit_rni_details, #link_have_rni_details, #span_have_rni_details').show();
            $('.appliedForRNI').hide();
        }
    });
}
function  hideAddEditLinksOnPartnersIndex() {
    $('.sub_div0 .partners .toolbar a').last().hide();
    $('.sub_div0 .partners .actions a').hide()
}
function monthsOnIncoming() {
    $(".add #QualifyingCirculationRegularPeriodId, .edit #QualifyingCirculationRegularPeriodId").unbind('keyup, change');
    $('.add #QualifyingCirculationRegularPeriodId, .edit #QualifyingCirculationRegularPeriodId').on('keyup, change', function(){
        _monthsOnIncoming();
    });
    if ($('.add #QualifyingCirculationRegularPeriodId, .edit #QualifyingCirculationRegularPeriodId').length > 0) {
        _monthsOnIncoming();
    }
}
function getDaysInMonth(year, month) {
    return Math.round(((new Date(year, month))-(new Date(year, month-1)))/86400000);
}
function _tenPerctRule() {
    if(typeof $('#SubscriptionSchemeBalanceAmountRetained').attr('id') != 'undefined') {
        $("#SubscriptionSchemeBalanceAmountRetained").rules("add", {
            required: true,
             min: function(element) {
                return Math.round10($("#SubscriptionSchemeCoverPrice").val() * 0.1);
              }
        });
    }
}
function _monthsOnIncoming() {
    // neither should be 0
    // http://mantis.quadzero.in/view.php?id=884
    if ($('#QualifyingCirculationClientAddForm, #QualifyingCirculationClientEditForm').val() > 0) {
        if(typeof $('#QualifyingCirculationTotalMonth1').attr('id') != 'undefined') {
                $("#QualifyingCirculationTotalMonth1").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationNoOfPubDaysMonth1").val() > 0 ? 1 : 0;
                      }
                });
            }
        if(typeof $('#QualifyingCirculationTotalMonth2').attr('id') != 'undefined') {
                $("#QualifyingCirculationTotalMonth2").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationNoOfPubDaysMonth2").val() > 0 ? 1 : 0;
                      }
                });
            }
        if(typeof $('#QualifyingCirculationTotalMonth3').attr('id') != 'undefined') {
                $("#QualifyingCirculationTotalMonth3").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationNoOfPubDaysMonth3").val() > 0 ? 1 : 0;
                      }
                });
            }
        if(typeof $('#QualifyingCirculationTotalMonth4').attr('id') != 'undefined') {
                $("#QualifyingCirculationTotalMonth4").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationNoOfPubDaysMonth4").val() > 0 ? 1 : 0;
                      }
                });
            }
        if(typeof $('#QualifyingCirculationTotalMonth5').attr('id') != 'undefined') {
                $("#QualifyingCirculationTotalMonth5").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationNoOfPubDaysMonth5").val() > 0 ? 1 : 0;
                      }
                });
            }
        if(typeof $('#QualifyingCirculationTotalMonth6').attr('id') != 'undefined') {
                $("#QualifyingCirculationTotalMonth6").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationNoOfPubDaysMonth6").val() > 0 ? 1 : 0;
                      }
                });
            }
    }
    if ($('#QualifyingCirculationClientAddForm #QualifyingCirculationRegularPeriodId option:selected, #QualifyingCirculationClientEditForm #QualifyingCirculationRegularPeriodId option:selected').val() > 0) {
        var d = new Date();
        var year = $('#QualifyingCirculationRegularPeriodId option:selected').html().substr(-4);
        if ($('#QualifyingCirculationClientAddForm #QualifyingCirculationRegularPeriodId option:selected, #QualifyingCirculationClientEditForm #QualifyingCirculationRegularPeriodId option:selected').html().substr(0,3).toLowerCase() == 'jan') {
            $('.row0').html($('.row0').html().replace('July', 'January'));
            $('.row1').html($('.row1').html().replace('August', 'February'));
            $('.row2').html($('.row2').html().replace('September', 'March'));
            $('.row3').html($('.row3').html().replace('October', 'April'));
            $('.row4').html($('.row4').html().replace('November', 'May'));
            $('.row5').html($('.row5').html().replace('December', 'June'));
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth1').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth1").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationTotalMonth1").val() > 0 ? 1 : 0;
                      },
                     max: getDaysInMonth(year, 1),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth2').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth2").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationTotalMonth2").val() > 0 ? 1 : 0;
                      },
                     max: getDaysInMonth(year, 2),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth3').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth3").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationTotalMonth3").val() > 0 ? 1 : 0;
                      },
                     max: getDaysInMonth(year, 3),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth4').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth4").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationTotalMonth4").val() > 0 ? 1 : 0;
                      },
                     max: getDaysInMonth(year, 4),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth5').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth5").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationTotalMonth5").val() > 0 ? 1 : 0;
                      },
                     max: getDaysInMonth(year, 5),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth6').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth6").rules("add", {
                    required: true,
                     min: function(element) {
                        return $("#QualifyingCirculationTotalMonth6").val() > 0 ? 1 : 0;
                      },
                     max: getDaysInMonth(year, 6),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
        } else {                
            $('.row0').html($('.row0').html().replace('January', 'July'));
            $('.row1').html($('.row1').html().replace('February', 'August'));
            $('.row2').html($('.row2').html().replace('March', 'September'));
            $('.row3').html($('.row3').html().replace('April', 'October'));
            $('.row4').html($('.row4').html().replace('May', 'November'));
            $('.row5').html($('.row5').html().replace('June', 'December'));
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth1').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth1").rules("add", {
                    required: true,
                     min: 0,
                     max: getDaysInMonth(year, 7),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth2').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth2").rules("add", {
                    required: true,
                     min: 0,
                     max: getDaysInMonth(year, 8),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth3').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth3").rules("add", {
                    required: true,
                     min: 0,
                     max: getDaysInMonth(year, 9),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth4').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth4").rules("add", {
                    required: true,
                     min: 0,
                     max: getDaysInMonth(year, 10),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth5').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth5").rules("add", {
                    required: true,
                     min: 0,
                     max: getDaysInMonth(year, 11),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
            if(typeof $('#QualifyingCirculationNoOfPubDaysMonth6').attr('id') != 'undefined') {
                $("#QualifyingCirculationNoOfPubDaysMonth6").rules("add", {
                    required: true,
                     min: 0,
                     max: getDaysInMonth(year, 12),
                     pattern: /^(\d+|\d+,\d{1,2})$/
                });
            }
        }
    }
}
function default_variants() {
    if(typeof $('#CoverPriceSingleComboOtherVariant').attr('id') != 'undefined') {
        var availableTags = [
            "Single",
            "Combo"
        ]
        $( "#CoverPriceSingleComboOtherVariant" ).autocomplete({
          source: availableTags
        });
    }
}
function cover_price() {
    if(typeof $('#CoverPriceCopiesPerPublishingDay').attr('id') != 'undefined') {
        $("#CoverPriceClientAddForm, #CoverPriceClientEditForm, #CoverPriceClientCopyForm, #CoverPriceAdminAddForm, #CoverPriceAdminEditForm, #CoverPriceAdminCopyForm").unbind('keyup');
        $('#CoverPriceClientAddForm, #CoverPriceClientEditForm, #CoverPriceClientCopyForm, #CoverPriceAdminAddForm, #CoverPriceAdminEditForm, #CoverPriceAdminCopyForm').on('keyup', function() {            
            var total = Math.round(parseInt($('#CoverPriceTotalCopies').val()) / parseInt($('#CoverPriceNoOfPublishingDays').val()));
            if (total > 0) {
                $( "#CoverPriceCopiesPerPublishingDay" ).val(total);
            } else {
                $( "#CoverPriceCopiesPerPublishingDay" ).val('');
            }
        });
    }
}
function getHoldingCompany() {
    if (typeof $("#HoldingCompanyHoldingCompanyName").attr('id') != 'undefined') {
        cache = {};
        $("#HoldingCompanyHoldingCompanyName").autocomplete({
            minLength: 3,
            source: function(request, response) {
                var term = request.term;
                if (term in cache) {
                    response(cache[ term ]);
                    return;
                }
                $.ajax({
                    url: "/users/autocomplete/HoldingCompany/holding_company_name%20like:%25---"+ encodeURIComponent(term) + '%25',
                    dataType: 'json',
                    global: false,
                    success: function(data) {
                        cache[ term ] = data.results;
                        response(data);
                    }
                  });
            }
        });
    }
}
function getPublication() {
    if (typeof $("#ComboComboName").attr('id') != 'undefined') {
        cache = {};
        $("#ComboComboName").autocomplete({
            minLength: 3,
            source: function(request, response) {
                var term = request.term;
                if (term in cache) {
                    response(cache[ term ]);
                    return;
                }
                $.ajax({
                    url: "/users/autocomplete/Publication/publication_name%20like:%25---"+ encodeURIComponent(term) + '%25',
                    dataType: 'json',
                    global: false,
                    success: function(data) {
                        cache[ term ] = data.results;
                        response(data);
                    }
                  });
            }
        });
    }
}
function getDistributionCenterName() {
    if (typeof $("#DistributionCenterDistributionCenterName").attr('id') != 'undefined') {
        cache = {};
        $("#DistributionCenterDistributionCenterName").autocomplete({
            minLength: 3,
            source: function(request, response) {
                var term = request.term;
                if (term in cache) {
                    response(cache[ term ]);
                    return;
                }
                $.ajax({
                    url: "/users/autocomplete/DistributionCenter/distribution_center_name%20like:%25---"+ encodeURIComponent(term) + '%25/display_field:distribution_center_name',
                    dataType: 'json',
                    global: false,
                    success: function(data) {
                      cache[ term ] = data.results;
                        response(data);
                    }
                  });
            }
        });
    }
//    if (typeof $("#DistributionCenterNameAddress").attr('id') != 'undefined') {
//        cache = {};
//        $("#DistributionCenterNameAddress").autocomplete({
//            minLength: 3,
//            source: function(request, response) {
//                var term = request.term;
//                if (term in cache) {
//                    response(cache[ term ]);
//                    return;
//                }
//                $.getJSON("/users/autocomplete/DistributionCenter/name_address%20like:%25---"+ encodeURIComponent(term) + '%25/display_field:name_address', request, function(data, status, xhr) {
//                    cache[ term ] = data.results;
//                    response(data);
//                });
//            }
//        });
//    }
}
function nrr_calculation() {
    if ($('#NrrCalculationClientAddForm, #NrrCalculationClientEditForm, #NrrCalculationClientCopyForm, #NrrCalculationAdminAddForm, #NrrCalculationAdminEditForm, #NrrCalculationAdminCopyForm').length > 0) {
        $("#NrrCalculationClientAddForm, #NrrCalculationClientEditForm, #NrrCalculationClientCopyForm, #NrrCalculationAdminAddForm, #NrrCalculationAdminEditForm, #NrrCalculationAdminCopyForm").unbind('keyup keydown mousedown');
        $('#NrrCalculationClientAddForm, #NrrCalculationClientEditForm, #NrrCalculationClientCopyForm, #NrrCalculationAdminAddForm, #NrrCalculationAdminEditForm, #NrrCalculationAdminCopyForm').on('keyup keydown mousedown', function(event){
            $('#NrrCalculationNetRealisation').val($('#NrrCalculationCoverPriceOfThePublication').val() - $('#NrrCalculationTradeDiscountOfferedToTrade').val());
            $('#NrrCalculationWeightPerPage').val(($('#NrrCalculationSizeOfThePage').val()*($('#NrrCalculationGsm').val()/10000)/2).toFixed(2));
            $('#NrrCalculationValueInWastePerPage').val(($('#NrrCalculationWasteRatePerKg').val() * $('#NrrCalculationWeightPerPage').val()/1000).toFixed(2));
            $('#NrrCalculationActualWeightOfTheCopyMin').val(($('#NrrCalculationNoOfPagesPerIssueMinimum').val() * $('#NrrCalculationWeightPerPage').val()).toFixed(2));
            $('#NrrCalculationActualWeightOfTheCopyMax').val(($('#NrrCalculationNoOfPagesPerIssueMaximum').val() * $('#NrrCalculationWeightPerPage').val()).toFixed(2));
            
            $('#NrrCalculationWeightNetPrice').val(($('#NrrCalculationValueInWastePerPage').val() * $('#NrrCalculationNoOfPagesNetPrice').val()).toFixed(2));
            $('#NrrCalculationNoOfPagesNetPrice').val(($('#NrrCalculationNetRealisation').val() / $('#NrrCalculationValueInWastePerPage').val()).toFixed(2));
            $('#NrrCalculationWastePricePerIssueMin').val(($('#NrrCalculationNoOfPagesPerIssueMinimum').val() * $('#NrrCalculationValueInWastePerPage').val()).toFixed(2));
            $('#NrrCalculationWastePricePerIssueMax').val(($('#NrrCalculationNoOfPagesPerIssueMaximum').val() * $('#NrrCalculationValueInWastePerPage').val()).toFixed(2));
            $('#NrrCalculationWastePricePerIssueCutoff').val($('#NrrCalculationNetRealisation').val() + 0);
        });
        
    }
}
function subscription_scheme_calculation() {
    if ($('#SubscriptionSchemeClientAddForm, #SubscriptionSchemeClientEditForm, #SubscriptionSchemeClientCopyForm, #SubscriptionSchemeAdminAddForm, #SubscriptionSchemeAdminEditForm, #SubscriptionSchemeAdminCopyForm').length > 0) {
        $("#SubscriptionSchemeClientAddForm, #SubscriptionSchemeClientEditForm, #SubscriptionSchemeClientCopyForm, #SubscriptionSchemeAdminAddForm, #SubscriptionSchemeAdminEditForm, #SubscriptionSchemeAdminCopyForm").unbind('keyup');
        $('#SubscriptionSchemeClientAddForm, #SubscriptionSchemeClientEditForm, #SubscriptionSchemeClientCopyForm, #SubscriptionSchemeAdminAddForm, #SubscriptionSchemeAdminEditForm, #SubscriptionSchemeAdminCopyForm').on('keyup', function(event){            
            $('#SubscriptionSchemeDiscount').val(($('#SubscriptionSchemeCoverPrice').val() - $('#SubscriptionSchemeSubscriptionRate').val()).toFixed(2));
            $('#SubscriptionSchemeBalanceAmountRetained').val(($('#SubscriptionSchemeCoverPrice').val() - $('#SubscriptionSchemeDiscount').val()-$('#SubscriptionSchemeValueOfTheGift').val() - $('#SubscriptionSchemeTradeDiscount').val()-$('#SubscriptionSchemeAnyOtherExpenses').val()).toFixed(2));
        });
        
    }
}
function tradeTermsValid() {
    if ($('#TradeTermClientAddForm, #TradeTermClientEditForm, #TradeTermClientCopyForm, #TradeTermAdminAddForm, #TradeTermAdminEditForm, #TradeTermAdminCopyForm').length > 0) {
        if(typeof $('#TradeTermSoldAtTradeTerm').attr('id') != 'undefined') {
            $("#TradeTermSoldAtTradeTerm").rules("add", {
                required: true,
                min: 0,
                max: 99.99
            });
        }       
        if(typeof $('#TradeTermCopiesSold').attr('id') != 'undefined') {
            $("#TradeTermCopiesSold").rules("add", {
                required: true,
                min: 1,
                max: function() {
                     return parseInt($('.trade_term_cnt_limit').text()) ? parseInt($('.trade_term_cnt_limit').text()) : 0;
                 }
            });
        }       
    }
}
function wasteRateValid() {
    if ($('#WasteRateClientAddForm, #WasteRateClientEditForm, #WasteRateClientCopyForm, #WasteRateAdminAddForm, #WasteRateAdminEditForm, #WasteRateAdminCopyForm').length > 0) {
        if(typeof $('#WasteRateAverageRateInWastePerKgPrevalentInTheMarketPlace').attr('id') != 'undefined') {
            $("#WasteRateAverageRateInWastePerKgPrevalentInTheMarketPlace").rules("add", {
                required: true,
                min: 0,
                max: 99.99
            });
        }
        if(typeof $('#WasteRateSummaryReconcilingAcquisitionWithConsumption').attr('id') != 'undefined') {
            $("#WasteRateSummaryReconcilingAcquisitionWithConsumption").rules("add", {
                required: true,
                min: 0,
                max: 99.99
            });
        }       
    }
}
function subscriptionSchemesValid() {
    if ($('#SubscriptionSchemeClientAddForm, #SubscriptionSchemeClientEditForm, #SubscriptionSchemeClientCopyForm, #SubscriptionSchemeAdminAddForm, #SubscriptionSchemeAdminEditForm, #SubscriptionSchemeAdminCopyForm').length > 0) {     
        if(typeof $('#SubscriptionSchemeNoOfCopies').attr('id') != 'undefined') {
            $("#SubscriptionSchemeNoOfCopies").rules("add", {
                required: true,
                min: 1,
                max: function() {
                    var tempMax = parseInt($('.subscriptionSchemes' + $("#SubscriptionSchemeSaleTypeId").val()).parent().find('b').text());
                    if ($("#SubscriptionSchemeId").val() > 0) {
                        tempMax += parseInt($("#SubscriptionSchemeNoOfCopies").val())
                    }
                    return tempMax ? tempMax : 0;
                 }
            });
        }
    }
}
function incoming_validtion() {
    if (typeof $('#QualifyingCirculationClientAddForm, #QualifyingCirculationClientEditForm, #QualifyingCirculationClientCopyForm, #QualifyingCirculationAdminAddForm, #QualifyingCirculationAdminEditForm, #QualifyingCirculationAdminCopyForm').attr('id') != 'undefined') {
        $("#QualifyingCirculationClientAddForm, #QualifyingCirculationClientEditForm, #QualifyingCirculationClientCopyForm, #QualifyingCirculationAdminAddForm, #QualifyingCirculationAdminEditForm, #QualifyingCirculationAdminCopyForm").unbind('keyup');
        $('#QualifyingCirculationClientAddForm, #QualifyingCirculationClientEditForm, #QualifyingCirculationClientCopyForm, #QualifyingCirculationAdminAddForm, #QualifyingCirculationAdminEditForm, #QualifyingCirculationAdminCopyForm').on('keyup', function() {
            $("#QualifyingCirculationTotalSsSaAverageMonthlyQualifyingCirculation1").val(parseInt($('#QualifyingCirculationSsSaSingleCopySales').val()) + parseInt($('#QualifyingCirculationSsSaComboSalesCopies').val()) + parseInt($('#QualifyingCirculationSsSaSingleCopySubscription').val()) + parseInt($('#QualifyingCirculationSsSaJointSubscriptionCopies').val()) + parseInt($('#QualifyingCirculationSsSaInstitutionalSubscriptionCopies').val()) + parseInt($('#QualifyingCirculationSsSaInstitutionalSaleCopies').val()));
        })
        
        if(typeof $('#QualifyingCirculationTotalNssIncentiveSingle').attr('id') != 'undefined' && typeof $('#QualifyingCirculationTotalSingleNnr').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalNssIncentiveSingle").rules("add", {
                equalTo: "#QualifyingCirculationTotalSingleNnr",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSingleNnr').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSingleNnr").rules("add", {
                equalTo: "#QualifyingCirculationTotalNssIncentiveSingle",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSingleNnr').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSingleNnr").rules("add", {
                equalTo: "#QualifyingCirculationTotalNssIncentiveSingle",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalComboNnr').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalComboNnr").rules("add", {
                equalTo: "#QualifyingCirculationTotalNssIncentiveCombo",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalNssIncentiveCombo').attr('id') != 'undefined' && typeof $('#QualifyingCirculationTotalComboNnr').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalNssIncentiveCombo").rules("add", {
                equalTo: "#QualifyingCirculationTotalComboNnr",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalInstnNnr').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalInstnNnr").rules("add", {
                equalTo: "#QualifyingCirculationTotalNssIncentiveInstn",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalNssIncentiveInstn').attr('id') != 'undefined' && typeof $('#QualifyingCirculationTotalComboNnr').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalNssIncentiveInstn").rules("add", {
                equalTo: "#QualifyingCirculationTotalInstnNnr",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalCorporatesInstn').attr('id') != 'undefined' && typeof $('#QualifyingCirculationTotalComboNnr').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalCorporatesInstn").rules("add", {
                equalTo: "#QualifyingCirculationTotalInstnNnr",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSsCatSingle').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsCatSingle").rules("add", {
                equalTo: "#QualifyingCirculationTotalSsIncentiveSingle",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSsIncentiveSingle').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsIncentiveSingle").rules("add", {
                equalTo: "#QualifyingCirculationTotalSsCatSingle",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSsCatJoint').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsCatJoint").rules("add", {
                equalTo: "#QualifyingCirculationTotalSsIncentiveJoint",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSsIncentiveJoint').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsIncentiveJoint").rules("add", {
                equalTo: "#QualifyingCirculationTotalSsCatJoint",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSsCatInstitutional').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsCatInstitutional").rules("add", {
                equalTo: "#QualifyingCirculationTotalSsIncentiveInstitutional",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSsIncentiveInstitutional').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsIncentiveInstitutional").rules("add", {
                equalTo: "#QualifyingCirculationTotalSsCatInstitutional",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSsCatInstitutional').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsCatInstitutional").rules("add", {
                equalTo: "#QualifyingCirculationTotalSsIncentiveInstitutional",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
        }
        if(typeof $('#QualifyingCirculationTotalSsIncentiveInstitutional').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsIncentiveInstitutional").rules("add", {
                equalTo: "#QualifyingCirculationTotalSsCatInstitutional",
                required: true,
                messages: {
                    equalTo: 'Total does not match'
                }
            });
    }
        if(typeof $('#QualifyingCirculationTotalSsSaAverageMonthlyQualifyingCirculation1').attr('id') != 'undefined') {
            $("#QualifyingCirculationTotalSsSaAverageMonthlyQualifyingCirculation1").rules("add", {
            equalTo: "#QualifyingCirculationFtAverageMonthlyQualifyingCirculation",
            required: true,
            messages: {
                equalTo: 'Total does not match'
            }
        });
        }
        if(typeof $('#QualifyingCirculationFtAverageMonthlyQualifyingCirculation').attr('id') != 'undefined') {
            $("#QualifyingCirculationFtAverageMonthlyQualifyingCirculation").rules("add", {
            equalTo: "#QualifyingCirculationTotalSsSaAverageMonthlyQualifyingCirculation1",
            required: true,
            messages: {
                equalTo: 'Total does not match'
            }
        });
        }
    }
}
function bindWeekdaysSunday() {
    if ($('#WeekdaysSundayClientAddForm, #WeekdaysSundayClientEditForm, #WeekdaysSundayClientCopyForm, #WeekdaysSundayAdminAddForm, #WeekdaysSundayAdminEditForm, #WeekdaysSundayAdminCopyForm').length > 0) {
        $("#WeekdaysSundayClientAddForm, #WeekdaysSundayClientEditForm, #WeekdaysSundayClientCopyForm, #WeekdaysSundayAdminAddForm, #WeekdaysSundayAdminEditForm, #WeekdaysSundayAdminCopyForm").unbind('keyup');
        $('#WeekdaysSundayClientAddForm, #WeekdaysSundayClientEditForm, #WeekdaysSundayClientCopyForm, #WeekdaysSundayAdminAddForm, #WeekdaysSundayAdminEditForm, #WeekdaysSundayAdminCopyForm').bind('keyup', function(event){
            calcWeekdaysSunday();
        });
    }
}
function calcWeekdaysSunday() {
    var totalCirc, numPubDays; 
    for(var i = 1; i < 7; ++i) {
        weekdaysCirc = parseInt($('#WeekdaysSundayTotalMonthlyQualifyingCirculationWeekdaysMonth' + i).val()) ? parseInt($('#WeekdaysSundayTotalMonthlyQualifyingCirculationWeekdaysMonth' + i).val()) : 0;
        weekdaysNoOfDays = parseInt($('#WeekdaysSundayNumberOfPublishingDaysWeekdaysMonth' + i).val()) ? parseInt($('#WeekdaysSundayNumberOfPublishingDaysWeekdaysMonth' + i).val()) : 0;
        totalCirc = parseInt($('#WeekdaysSundayTotalMonth' + i).val()) - weekdaysCirc;
        numPubDays = parseInt($('#WeekdaysSundayNoOfPubDaysMonth' + i).val()) - weekdaysNoOfDays;
        if (totalCirc > 0) {
            $('#WeekdaysSundayTotalMonthlyQualifyingCirculationSundayMonth' + i).val(totalCirc);
        } else {
            $('#WeekdaysSundayTotalMonthlyQualifyingCirculationSundayMonth' + i).val(0);
        }
        if (parseInt($('#WeekdaysSundayTotalMonthlyQualifyingCirculationSundayMonth' + i).val()) > 0 || numPubDays > 0) {
            $('#WeekdaysSundayNumberOfPublishingDaysSundayMonth' + i).val(numPubDays);
        } else {
            $('#WeekdaysSundayNumberOfPublishingDaysSundayMonth' + i).val(0);
        }
        if ((totalCirc / numPubDays) > 0) {
            $('#WeekdaysSundayAverageMonthlyQualifyingCirculationSundayMonth' + i).val(Math.round(totalCirc / numPubDays));
        } else {
            $('#WeekdaysSundayAverageMonthlyQualifyingCirculationSundayMonth' + i).val(0);
        }
        if ((weekdaysCirc / weekdaysNoOfDays) > 0) {
            $('#WeekdaysSundayAverageMonthlyQualifyingCirculationWeekdaysMonth' + i).val(Math.round(weekdaysCirc / weekdaysNoOfDays));
        } else {
            $('#WeekdaysSundayAverageMonthlyQualifyingCirculationWeekdaysMonth' + i).val(0);
        }
    }
}
function white_form() {    
    if(typeof $('#WhiteFormClientAddForm').attr('id') != 'undefined' || typeof $('#WhiteFormClientEditForm').attr('id') != 'undefined' ||  typeof $('#WhiteFormClientCopyForm').attr('id') != 'undefined') {
        if(typeof $('#WhiteFormCirculation').attr('id') != 'undefined') {
            $("#WhiteFormCirculation").rules("add", {
                required: true,
                min: function() {
                    return ($("#WhiteFormCirculation").val() + $("#WhiteFormSunday").val()) > 0 ? 0 : 1;
                },
                max: function() {
                     return parseInt($('.white_form_cnt_limit').text()) ? parseInt($('.white_form_cnt_limit').text()) - $("#WhiteFormSunday").val() : 0;
                 },
                 pattern: /^(\d+|\d+,\d{1,2})$/
            });
        }
        if(typeof $('#WhiteFormSunday').attr('id') != 'undefined') {
            $("#WhiteFormSunday").rules("add", {
                required: true,
                min: 0,
                max: function() {
                     return parseInt($('.white_form_cnt_limit').text()) ? parseInt($('.white_form_cnt_limit').text()) - $("#WhiteFormCirculation").val() : 0;
                 }
            });
        }
    }
}
function regular_period() {
    if(typeof $('#RegularPeriodAdminAddForm').attr('id') != 'undefined' || typeof $('#RegularPeriodAdminEditForm').attr('id') != 'undefined' ||  typeof $('#RegularPeriodAdminCopyForm').attr('id') != 'undefined') {
        if(typeof $('#RegularPeriodGraceDaysReminder1').attr('id') != 'undefined') {
            $("#RegularPeriodGraceDaysReminder1").rules("add", {
                required: true,
                 min: 1,
                 pattern: /^(\d+|\d+,\d{1,2})$/
            });
        }
        if(typeof $('#RegularPeriodGraceDaysReminder2').attr('id') != 'undefined') {
            $("#RegularPeriodGraceDaysReminder2").rules("add", {
                required: true,
                 min: 1,
                 pattern: /^(\d+|\d+,\d{1,2})$/
            });
        }
        if(typeof $('#RegularPeriodGraceDaysReminder3').attr('id') != 'undefined') {
            $("#RegularPeriodGraceDaysReminder3").rules("add", {
                required: true,
                 min: 1,
                 pattern: /^(\d+|\d+,\d{1,2})$/
            });
        }
    }
}
function setCursorForWhiteForm() {
    if(typeof $('#WhiteFormStateId').attr('id') != 'undefined') {
        setTimeout("$('#WhiteFormStateId').focus();", 100);
    }
}
if (!Math.round10) {
        Math.round10 = function(value, exp) {
            if (!exp) {
                exp = -2;
            }
                return decimalAdjust('round', value, exp);
        };
}
/**
 * Decimal adjustment of a number.
 *
 * @param	{String}	type	The type of adjustment.
 * @param	{Number}	value	The number.
 * @param	{Integer}	exp		The exponent (the 10 logarithm of the adjustment base).
 * @returns	{Number}			The adjusted value.
 */
function decimalAdjust(type, value, exp) {
        // If the exp is undefined or zero...
        if (typeof exp === 'undefined' || +exp === 0) {
                return Math[type](value);
        }
        value = +value;
        exp = +exp;
        // If the value is not a number or the exp is not an integer...
        if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
                return NaN;
        }
        // Shift
        value = value.toString().split('e');
        value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
        // Shift back
        value = value.toString().split('e');
        return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
}
function validateProposer() {
    if(typeof $('#MembershipProposer1RepresentativeId').attr('id') != 'undefined' && typeof $("#MembershipProposer2RepresentativeId").attr('id') != 'undefined') {
        if ($("#MembershipProposer1RepresentativeId").val() != "" && $("#MembershipProposer2RepresentativeId").val() != "" && $("#MembershipProposer1RepresentativeId").val() != $("#MembershipProposer2RepresentativeId").val()) {
            $(".memberships.form input[type=submit]").removeAttr("disabled");
            if ($("#MembershipProposer1RepresentativeId").val() != "" && $("#MembershipProposer2RepresentativeId").val() != "") {
                $("label.MembershipProposer1RepresentativeId").hide();
                $("label.MembershipProposer2RepresentativeId").hide();
                $("label.MembershipProposer1RepresentativeId").html("");
                $("label.MembershipProposer2RepresentativeId").html("");
            }
        } else {
            $(".memberships.form input[type=submit]").attr("disabled", "disabled");
            if (($("#MembershipProposer1RepresentativeId").val() == "" && $("#MembershipProposer2RepresentativeId").val() != "") || ($("#MembershipProposer1RepresentativeId").val() != "" && $("#MembershipProposer2RepresentativeId").val() == "")) {
                $("label.MembershipProposer1RepresentativeId").show();
                $("label.MembershipProposer2RepresentativeId").show();
                $("label.MembershipProposer1RepresentativeId").html("Please select different Proposers");
                $("label.MembershipProposer2RepresentativeId").html("Please select different Proposers");
            }
        }
    }
}
function hideShowPCNewlyStarted() {
    $('#QualifyingCirculationFlagPcStartedCurrentPeriod').change(function() {
        if ($('#QualifyingCirculationFlagPcStartedCurrentPeriod:checked').length) {
            $('#QualifyingCirculationPcStartedCurrentPeriod').parent().parent().parent().show();
        } else {
            $('#QualifyingCirculationPcStartedCurrentPeriod').val('');
           $('#QualifyingCirculationPcStartedCurrentPeriod').parent().parent().parent().hide();
        }
    });
    $('#QualifyingCirculationFlagPcStartedCurrentPeriod').change();
}