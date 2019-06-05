$(function () {
	$("#sform").validate({
		rules: {
			username: {
				required: true,
				email: true
			},
			pass:{
				required:true,
				length:5
				},
			repass:{
				required:true,
				equalTo:'#passId'
				}
		},
		messages:{
			email:{
				required: 'please insert an Email Address',
			}
		}
	});
});