
        <form class="cmxform" id="inputForm" method="POST">
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="number" class="form-control" name="amount" id="amount" placeholder="input amount">
            </div>

            <div class="form-group">
                <label for="buyer">Buyer</label>
                <input type="text" class="form-control" name="buyer" id="buyer" placeholder="input buyer">
            </div>

            <div class="form-group">
                <label for="receipt_id">Receipt ID</label>
                <input type="text" class="form-control" id="receipt_id" name="receipt_id" placeholder="input receipt id">
            </div>

            <div class="form-group bs-example">
                <label for="items">Items <span><small>(items seperated by comma)</small></span></label>
                <input type="text" class="form-control" id="items" name="items">
            </div>

            <div class="form-group">
                <label for="buyer_email">Buyer Email</label>
                <input type="email" class="form-control" id="buyer_email" name="buyer_email" placeholder="buyer email">
            </div>

            <div class="form-group">
                <label for="note">Note <span><small>(maximum 30 words)</small></span></label>
                <textarea class="form-control" id="note" name="note" rows="3"></textarea>
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="city">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="phone_prefix">880</span>
                    </div>
                    <input type="text" id="phone" class="form-control" name="phone" placeholder="phone" aria-label="phone"
                        aria-describedby="phone_prefix">
                </div>
            </div>

            <div class="form-group">
                <label for="entry_by">Entry By</label>
                <input type="number" class="form-control" id="entry_by" name="entry_by" placeholder="entry by">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    <script>
        

        $(function () {
            //INITIATE TAGS INPUT FOR MULTIPLE ITEM INPUT
            $('#items').tagsInput({
                width:'auto',
                defaultText:'add items',
                delimiter: [','],
                onAddTag: function(tag) {
                    if(! /^[a-z]+$/i.test( tag ) ) 
                    {
                        alert("Letters only please");
                        $('#items').removeTag(tag);
                    }
		        }
            });

            //LETTERS, NUMBERS AND SPACES
            $.validator.addMethod("alphanum_and_space", function (value, element) {
                return this.optional(element) || /^[a-z0-9\s]+$/i.test(value);
            }, "Letter, Number and Spaces only");

            //LETTERS AND SPACES
            $.validator.addMethod("alpha_and_space", function (value, element) {
                return this.optional(element) || /^[a-z\s]+$/i.test(value);
            }, "Letter and Spaces only");

            //VALIDATE FORM
            $("#inputForm").validate({
                ignore: [],
                rules: {
                    amount: {
                        required: true,
                        digits: true
                    },
                    buyer: {
                        required: true,
                        alphanum_and_space: true,
                        maxlength: 20
                    },
                    receipt_id: {
                        required: true,
                        lettersonly: true
                    },
                    buyer_email: {
                        required: true,
                        email: true
                    },
                    note: {
                        required: true,
                        maxWords: 30
                    },
                    city: {
                        required: true,
                        alpha_and_space: true
                    },
                    phone: {
                        required: true,
                        digits: true
                    },
                    entry_by: {
                        required: true,
                        digits: true
                    },
                }
            });

        });



        //METHOD TO SUBMIT FORM VALIDATION
        $("#inputForm").submit(function (e) {
            //PREVENT DEFAULT SUBMISSION
            e.preventDefault();

            //VALID FORM
            if($("#inputForm").valid()){
                //SERIALIZE FORM DATA
                var formData = $("#inputForm").serializeArray();
                
                //WAIT POP UP 
                var waitPopup;

                //INSERT AJAX
                $.ajax({
                    url: "index.php?save",
                    method: "POST",
                    data: formData,
                    dataType: "JSON",
                    beforeSend:function(){
                        //SHOW WAIT POP UP BEFORE SENDING AJAX
                        waitPopUp = $.alert({
                            title: '',
                            content: `working......<i class="fa fa-spinner"/i>`
                        })
                    },
                    success: function(response){
                        console.log(response);
                        //SUCCESS
                        if(response.status == 1){
                            //CLOSE WAIT POP UP
                            waitPopUp.close();

                            //RESET INPUT FORM
                            $('#inputForm').trigger("reset");
                        }
                        //FAILURE
                        else{
                            //SHOW WARNING
                            waitPopUp.setTitle('Error');
                            waitPopUp.setContent('Something went wrong');
                        }
                    }
                })
            }
        });
    </script>
