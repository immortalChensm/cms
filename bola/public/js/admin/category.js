$(function () {

    /**
     * {
    invalid         : 'inupt is not as expected',
    short           : 'input is too short',
    long            : 'input is too long',
    checked         : 'must be checked',
    empty           : 'please put something here',
    select          : 'Please select an option',
    number_min      : 'too low',
    number_max      : 'too high',
    url             : 'invalid URL',
    number          : 'not a number',
    email           : 'email address is invalid',
    email_repeat    : 'emails do not match',
    date            : 'invalid date',
    time            : 'invalid time',
    password_repeat : 'passwords do not match',
    no_match        : 'no match',
    complete        : 'input is not complete'
}
     This object can be extended easily. The idea is to extend it with new keys which represent the name of the field you want the message to be linked to, and that custom message appear as the general error one. Default messages can be over-ride. Example: for a given type ‘date’ field, lets set a custom (general error) message like so:

     // set custom text on initialization:
     var validator = new FormValidator({
    texts : {
        date:'not a real date'
    }
});

     // or post-initialization
     var validator = new FormValidator();
     validator.texts.date = 'not a real date';
     Error messages (per field) can be disabled:

     validator = new FormValidator({
    alerts:false
});

     // or by:
     var validator = new FormValidator();
     validator.settings.alerts = false;
     * **/
    var validator = new FormValidator({
        texts : {
            date:'not a real date'
        }
    });
    validator.texts.date = '日期不正确';
    validator.settings.alerts = false;


    $("input[name=title]").on("blur",function (e) {
        console.log(validator.checkField(e.target));
        //alert(e.target);
    })

    // document.forms[0].addEventListener('input', function(e){
    //     validator.checkField(e.target);
    // }, true);
    //
    // document.forms[0].addEventListener('change', function(e){
    //     validator.checkField(e.target)
    // }, true);


})

