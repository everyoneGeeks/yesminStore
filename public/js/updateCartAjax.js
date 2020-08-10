
    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('input[name="csrf-token"]').attr('content')

        }

    });

   

    $(".sendpersonalize-submit").click(function(e){

  

        e.preventDefault();

   

        var name = $("input[name=child_name]").val();

        var password = $("input[name=child_age]").val();

        var on = $("input[name=personalize]").val();

   

        $.ajax({

           type:'get',

           url:'/ajaxRequest',

           data:{name:name, password:password, email:email},

           success:function(data){

              alert(data.success);

           }

        });

  

	});



   