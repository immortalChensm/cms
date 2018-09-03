<!-- jQuery -->

<script src="{{URL::asset('gentelella/vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{URL::asset('gentelella/vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('gentelella//vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{URL::asset('gentelella/vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{URL::asset('gentelella/vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{URL::asset('gentelella/vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{URL::asset('gentelella/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{URL::asset('gentelella/vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{URL::asset('gentelella/vendors/skycons/skycons.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{URL::asset('gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{URL::asset('gentelella/vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{URL::asset('gentelella/vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{URL::asset('gentelella/vendors/moment/min/moment.min.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{URL::asset('js/admin/status.js')}}"></script>
<script src="{{URL::asset('gentelella/build/js/custom.js')}}"></script>
<!-- validator -->
<script src="{{URL::asset('gentelella/vendors/validator/validator.js')}}"></script>
<script src="{{URL::asset('js/admin/category.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('layer/layer.js')}}"></script>
<script src="{{URL::asset('gentelella/vendors/google-code-prettify/src/prettify.js')}}"></script>
<script type="text/javascript">

    function showpic(obj){
        $(obj.element).on("change",function(){

            var objUrl = getObjectURL(this.files[0]);
            console.log(objUrl);
            if (objUrl) {
                //$(this).prev('img').attr("src",objUrl);
                obj.show(objUrl);
            }
        }) ;

        //建立一個可存取到該file的url
        function getObjectURL(file) {
            var url = null ;
            if (window.createObjectURL!=undefined) { // basic
                url = window.createObjectURL(file) ;
            } else if (window.URL!=undefined) { // mozilla(firefox)
                url = window.URL.createObjectURL(file) ;
            } else if (window.webkitURL!=undefined) { // webkit or chrome
                url = window.webkitURL.createObjectURL(file) ;
            }
            return url ;
        }
    }

    function uploadpic(obj)
    {
        $(obj.element).bind("change",function (e) {
            var files = this.files;
            var URL = window.URL || window.webkitURL;
            var blobURL;
            var file = '';
            var that = this;
            if (files && files.length) {
                file = files[0];

                if (/^image\/\w+$/.test(file.type)) {
                    blobURL = URL.createObjectURL(file);

                    //URL.revokeObjectURL(blobURL);
                    // $("#icon").parent().find("img").remove();
                    //
                    // $(this).parent().append("<img src='"+blobURL+"' style='width:100px;height:100px;'>");

                    obj.getbloburl(blobURL);

                    r = new FileReader();
                    r.readAsDataURL(file);
                    r.onload = function(e) {
                        var base64 = e.target.result;
                        // $(that).parent().find(":input[name=icon]").val(base64);
                        // console.log(base64);
                        obj.getbase64(base64);
                    }



                } else {
                    layer.msg('只能上传图片',{time:1000});
                }
            }
        })

    }


</script>



<!-- Ion.RangeSlider -->
<script src="{{URL::asset('gentelella/vendors/ion.rangeSlider/js/ion.rangeSlider.min.js')}}"></script>
<!-- Bootstrap Colorpicker -->
<script src="{{URL::asset('gentelella/vendors/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
<!-- jquery.inputmask -->
<script src="{{URL::asset('gentelella/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
<!-- jQuery Knob -->
<script src="{{URL::asset('gentelella/vendors/jquery-knob/dist/jquery.knob.min.js')}}"></script>
<!-- Cropper -->
<script src="{{URL::asset('gentelella/vendors/cropper/dist/cropper.min.js')}}"></script>


<!-- Initialize datetimepicker -->
<script>
   

    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>

<!---->
<script src="{{URL::asset('vendors/jquery/dist/jquery.min.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{URL::asset('vendors/moment/min/moment.min.js')}}"></script>
<script src="{{URL::asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap-datetimepicker -->
<script src="{{URL::asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js')}}"></script>

<script>
    $('#myDatepicker').datetimepicker();

</script>
<!-- Bootstrap -->
<script src="{{URL::asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{URL::asset('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{URL::asset('vendors/nprogress/nprogress.js')}}"></script>
<!-- iCheck -->
<script src="{{URL::asset('vendors/iCheck/icheck.min.js')}}"></script>

<script src="{{URL::asset('vendors/switchery/dist/switchery.min.js')}}"></script>
