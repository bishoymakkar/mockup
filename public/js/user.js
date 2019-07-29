function deleteUser(id)

{

	if(confirm("Are you sure you want to delete this User?"))

	{

	jQuery.ajax

	({

		type: "POST",

		url:base_url+"Admin/Users/delete_user/" + id,

		data: {'id':id},

		dataType: "text",



		success: function( data )

		{

			location.reload();

			

			alert("User succesfully deleted.");

		},

		error: function( data )

		{

			alert( 'error' );

		}

	});

	}

}

