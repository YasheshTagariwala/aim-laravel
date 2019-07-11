jQuery(document).ready(function($) { 
setButtonAjx()
$('body').append('<div class="loading_admin"><div class="loading_admin_loader"></div></div>');



$('.releasefunds').click(function(){
	var projectID=$(this).attr('data-projectid');
	$('#projectId').val(projectID);
	
});

$('.transferfunds').click(function(){
	var projectID=$(this).attr('data-projectid');
	var amount=$(this).attr('data-amount');
	$('#projectId').val(projectID);
	$('#amount').val(amount);
	
});

$('.sendmoney').click(function(){

if($('#bank').val()!='' && $('#refrence').val()!='' && $('#amount').val()!='' && $('#comment').val()!=''){
	
	var button=jQuery(this);

	button.addClass('disabled');
	jQuery.ajax({
        url: ajaxurl,
		type:'POST',
        data: {
            'action':'admin_send_money',
            'projectId' : $('#projectId').val(),
			'bank' : $('#bank').val(),
			'refrence' : $('#refrence').val(),
			'amount' :$('#amount').val(),
			'comment' : $('#comment').val()
        },
        success:function(data) {
			if(data!=""){
			alert('Funds Released and an email notification sent to user');	
			$('#bank').val('');
			$('#refrence').val('');
			$('#amount').val('');
			$('#comment').val('');
			button.removeClass('disabled');
			location.reload();
			}
			jQuery('.loading_admin').hide();
        },
        error: function(errorThrown){
			alert('Please try again. something went wrong');
        }
    });  
	
	
	
	
}else{
alert('Please enter all the required information');	
}

return false;
	
});

$('.resleasefunds').click(function(){

if($('#name').val()!='' && $('#amount').val()!='' && $('#comment').val()!=''){
	
	var button=jQuery(this);

	button.addClass('disabled');
	jQuery.ajax({
        url: ajaxurl,
		type:'POST',
        data: {
            'action':'admin_invest_money',
            'projectId' : $('#projectId').val(),
			'name' : $('#name').val(),
			'amount' :$('#amount').val(),
			'comment' : $('#comment').val()
        },
        success:function(data) {
			if(data!=""){
			alert('Amount Invested and an email notification sent to user');	
			$('#name').val('');
			$('#amount').val('');
			$('#comment').val('');
			button.removeClass('disabled');
			location.reload();
			}
			jQuery('.loading_admin').hide();
        },
        error: function(errorThrown){
			alert('Please try again. something went wrong');
        }
    });  
}else{
alert('Please enter all the required information');	
}

return false;
	
});


jQuery(".organization_search").click(function(e) {
    var thi = jQuery(this);
	var pare = thi.parents("div#TB_ajaxContent");
	var orgname = pare.find("#organization_name").val();
	pare.find('.loading_admin').height(pare.height() + 50).width(pare.width() + 50).css('opacity',0.6).show();
	thi.addClass('disabled');
	jQuery.ajax({
        url: ajaxurl,
		type:'POST',
        data: {
            'action':'get_organizations',
            'orgname' : orgname
        },
        success:function(data) {
			pare.find("div.organization-result").html(data);
			setOrgnization();
			thi.removeClass('disabled');
			jQuery('.loading_admin').hide();
        },
        error: function(errorThrown){
			alert('Please try again. something went wrong');
			thi.removeClass('disabled');
			jQuery('.loading_admin').hide();
        }
    }); 

})
jQuery(".org-a").click(function(e) {
    $("input.organization_name_class").val();
	$("div.organization-result").html('');
});


});

function setOrgnization()
{
	jQuery("button.assin-button").click(function(e) {
		var thi = jQuery(this);
		var pare = thi.parents("div#TB_ajaxContent");
		pare.find('.loading_admin').height(pare.height() + 50).width(pare.width() + 50).css('opacity',0.6).show();
		var orgId = pare.find("input[name=orgna]:checked").val();
		var orgname = pare.find("td.title-"+orgId).text();
		var userId = pare.find("input.user_id").val();
		
		if(orgId == '' || typeof orgId == "undefined" || orgId == 0)
		{
			alert("Please select Organization");	
			return false;
		}else
		{
			thi.addClass('disabled');
			jQuery.ajax({
				url: ajaxurl,
				type:'POST',
				data: {
					'action':'assign_organization',
					'orgId' : orgId,
					'userid' : userId
				},
				success:function(data) {
					pare.find("div.organization-result").html(data);
					thi.removeClass('disabled');
					jQuery('table.wp-list-table').find("div.post_user_"+userId).text(orgname);
					jQuery('.tb-close-icon').click();
					jQuery('.loading_admin').hide();
				},
				error: function(errorThrown){
					alert('Please try again. something went wrong');
					thi.removeClass('disabled');
					jQuery('.loading_admin').hide();
				}
			}); 
		}
	})
}

function setButtonAjx(){

jQuery('.action-change-status').on('click',function(){
var button=jQuery(this);
var statuscol=button.parents('tr').find('.column-status');
jQuery('.loading_admin').height(jQuery(window).height()).width(jQuery(window).width()).css('opacity',0.6).show();
button.addClass('disabled');
	jQuery.ajax({
        url: ajaxurl,
		type:'POST',
        data: {
            'action':'admin_post_status_update',
            'id' : button.attr('data-id'),
			'status' : button.attr('data-status'),
			'user' : button.attr('data-user')
        },
        success:function(data) {
			if(data!=""){
			 statuscol.html(data.status);
			 button.parents('.action-result').html(data.actions);
			 setButtonAjx();	
			}
			jQuery('.loading_admin').hide();
        },
        error: function(errorThrown){
			alert('Please try again. something went wrong');
			jQuery('.loading_admin').hide();
        }
    });  


	
})

jQuery('.action-featured-project').on('click',function(){
var button=jQuery(this);
jQuery('.loading_admin').height(jQuery(window).height()).width(jQuery(window).width()).css('opacity',0.6).show();
button.addClass('disabled');
	jQuery.ajax({
        url: ajaxurl,
		type:'POST',
        data: {
            'action':'admin_feaured_proejct_update',
            'id' : button.attr('data-id'),
			'status' : button.attr('data-status'),
        },
        success:function(data) {
			if(button.attr('data-status') == "Yes") 
			{
				button.attr('data-status','No');
				button.text("Yes");
			}else{
				button.attr('data-status','Yes');
				button.text("No");
			}
			jQuery('.loading_admin').hide();
			button.removeClass('disabled');
        },
        error: function(errorThrown){
			alert('Please try again. something went wrong');
			jQuery('.loading_admin').hide();
        }
    });  


	
})
	
	
	
}