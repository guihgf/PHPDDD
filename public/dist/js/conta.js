if($('#form').length>0){

    var form1 = $('#form');
    var error1 = $('.alert-danger', form1);
    var success1 = $('.alert-success', form1);

    form1.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-block help-block-error', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "input[type='text']:hidden",  // validate all fields including form hidden input
        rules: {
            nome:{
                required: true,
                 minlength:5,
                 maxlength:100
            }
        },
        errorPlacement: function(error,element) {
            // element.parents('.form-group').append(error);

            if(element.is(":hidden"))
            {
                if(element.is("select"))
                {
                    //element.next().append(error);
                    //element.append(error);
                    //console.log(element)
                    element.parent(".form-control").append(error);
                }
                else
                {
                    //error.next().next().next().insertAfter(element);
                    error.insertAfter(element);
                }

            }
            else
            {
                error.insertAfter(element);
            }

        },

        invalidHandler: function (event, validator) { //display error alert on form submit
            success1.hide();
            error1.show();
        },

        highlight: function (element) { // hightlight error inputs
            $(element)
                .closest('.form-group').addClass('has-error'); // set error class to the control group
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element)
                .closest('.form-group').removeClass('has-error'); // set error class to the control group
        },

        success: function (label) {
            label
                .closest('.form-group').removeClass('has-error'); // set success class to the control group
        },

        submitHandler: function (form) {
            //success1.show();
            form.submit();
        }
    });
}

function removerConta(){
    alerta('Sucesso','TODO da conta removida com sucesso.');
}

