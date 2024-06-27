{{-- edit users js --}}

<script>
  function Edit_user(id){

    $.ajax({
      url : "{{route('admin.edit_user')}}",
      type : "POST",
      data : {
        user_id: id,
        _token : "{{csrf_token()}}"
      },
      success : function(res){
        console.log(res.name);
        $('#user_id').val(res.id);
        $('#edit_name').val(res.name);
        $('#edit_email').val(res.email);
        $('#edit_address').val(res.address);
        $('#EditUserModal').modal('show');
        if(res.gender == 'male'){
          $("input[value = 'male']").attr('checked', true)
        }else if(res.gender == 'female'){
          $("input[value = 'female']").attr('checked', true)
        }
      }
    })

  }

  
  function Edit_product(id){
    console.log(id);
    $.ajax({
      url : "{{route('admin.edit_product')}}",
      method : "POST",
      data : {
        product_id : id,
        _token : "{{csrf_token()}}"
      },
      success : function(res){
        console.log(res);
        $('#edit_product').modal('show');
        $('#edit_product_appnd').append(res);
      }
    })
  }


  // user delete

  function Delete_user(id){
    console.log(id);
    $('#id').val(id)
    // $.ajax({
    //   url : "{{route('admin.delete_user')}}",
    //   type : "POST",
    //   data : {
    //     user_id: id,
    //     _token : "{{csrf_token()}}"
    //   },
    //   success : function(res){
    //     console.log(res);
    //   }
    // })
    $('#deleteModal').modal('show');
  }
  // Product delete

  function Delete_product(id){
    console.log(id);
    $('#prod_id').val(id)
    // $.ajax({
    //   url : "{{route('admin.delete_user')}}",
    //   type : "POST",
    //   data : {
    //     user_id: id,
    //     _token : "{{csrf_token()}}"
    //   },
    //   success : function(res){
    //     console.log(res);
    //   }
    // })
    $('#deleteProductModal').modal('show');
  }

  // function check_empty(){

  //   let isValid = true;
  //   if($('#name').val() == '' || $('#description').val() == '' ){
  //     $('#name_error').removeClass('d-none').text('This field is required');
  //     isValid = false;
  //   }else if($('#description').val() == ''){
  //     $('#description_error').removeClass('d-none').text('This field is required');
  //     isValid = false
  //   }else if($('#price').val() == ''){
  //     $('#price_error').removeClass('d-none').text('This field is required');
  //     isValid = false
  //   }else if($('#discount_price').val() == ''){
  //     $('#discount_price_error').removeClass('d-none').text('This field is required');
  //     isValid = false
  //   }else if($('#SKU').val() == ''){
  //     $('#SKU_error').removeClass('d-none').text('This field is required');
  //     isValid = false
  //   }else if($('#stock_quantity').val() == ''){
  //     $('#stock_quantity_error').removeClass('d-none').text('This field is required');
  //     isValid = false
  //   }else if($('#weight').val() == ''){
  //     $('#weight_error').removeClass('d-none').text('This field is required');
  //     isValid = false
  //   }else if($('#dimentions').val() == ''){
  //     $('#dimensions_error').removeClass('d-none').text('This field is required');
  //     isValid = false
  //   }else{
  //     isValid = true;
  //   }

  //   if(isValid == true){
  //     $('#product_form').submit();
  //   }

  // }

  // function check_empty() {
  //         let isValid = true;
  //           if ($('#name').val().trim() === '') {
  //               $('#name_error').removeClass('d-none');
  //               isValid = false;
  //           } else {
  //               $('#name_error').addClass('d-none');
  //               isValid = true
  //           }
  //           if ($('#description').val().trim() === '') {
  //               $('#description_error').removeClass('d-none');
  //               isValid = true;
  //           } else {
  //               $('#description_error').addClass('d-none');
  //               isValid = false;
  //           }

  //           if(isValid == true){
  //             $('product_form').submit();
  //           }

  //       }
  //       $('#name').on('input', check_empty);
  //       $('#description').on('input', check_empty);
</script>












<footer class="footer">
    <div class="container-fluid d-flex justify-content-between">
      <nav class="pull-left">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="http://www.themekita.com">
              ThemeKita
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> Help </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"> Licenses </a>
          </li>
        </ul>
      </nav>
      <div class="copyright">
        2024, made with <i class="fa fa-heart heart text-danger"></i> by
        <a href="http://www.themekita.com">ThemeKita</a>
      </div>
      <div>
        Distributed by
        <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
      </div>
    </div>
  </footer>
</div>

<!-- Custom template | don't include it in your project! -->
<div class="custom-template">
  <div class="title">Settings</div>
  <div class="custom-content">
    <div class="switcher">
      <div class="switch-block">
        <h4>Logo Header</h4>
        <div class="btnSwitch">
          <button
            type="button"
            class="selected changeLogoHeaderColor"
            data-color="dark"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="blue"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="purple"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="light-blue"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="green"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="orange"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="red"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="white"
          ></button>
          <br />
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="dark2"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="blue2"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="purple2"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="light-blue2"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="green2"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="orange2"
          ></button>
          <button
            type="button"
            class="changeLogoHeaderColor"
            data-color="red2"
          ></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Navbar Header</h4>
        <div class="btnSwitch">
          <button
            type="button"
            class="changeTopBarColor"
            data-color="dark"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="blue"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="purple"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="light-blue"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="green"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="orange"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="red"
          ></button>
          <button
            type="button"
            class="selected changeTopBarColor"
            data-color="white"
          ></button>
          <br />
          <button
            type="button"
            class="changeTopBarColor"
            data-color="dark2"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="blue2"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="purple2"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="light-blue2"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="green2"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="orange2"
          ></button>
          <button
            type="button"
            class="changeTopBarColor"
            data-color="red2"
          ></button>
        </div>
      </div>
      <div class="switch-block">
        <h4>Sidebar</h4>
        <div class="btnSwitch">
          <button
            type="button"
            class="changeSideBarColor"
            data-color="white"
          ></button>
          <button
            type="button"
            class="selected changeSideBarColor"
            data-color="dark"
          ></button>
          <button
            type="button"
            class="changeSideBarColor"
            data-color="dark2"
          ></button>
        </div>
      </div>
    </div>
  </div>
  <div class="custom-toggle">
    <i class="icon-settings"></i>
  </div>
</div>
<!-- End Custom template -->
</div>
<!--   Core JS Files   -->
<script src="{{asset('public/assets/js/core/jquery-3.7.1.min.js')}}"></script>
<script src="{{asset('public/assets/js/core/popper.min.js')}}"></script>
<script src="{{asset('public/assets/js/core/bootstrap.min.js')}}"></script>

<!-- jQuery Scrollbar -->
<script src="{{asset('public/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>

<!-- Chart JS -->
<script src="{{asset('public/assets/js/plugin/chart.js/chart.min.js')}}"></script>

<!-- jQuery Sparkline -->
<script src="{{asset('public/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

<!-- Chart Circle -->
<script src="{{asset('public/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

<!-- Datatables -->
<script src="{{asset('public/assets/js/plugin/datatables/datatables.min.js')}}"></script>

<!-- Bootstrap Notify -->
<script src="{{asset('public/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

<!-- jQuery Vector Maps -->
<script src="{{asset('public/assets/js/plugin/jsvectormap/jsvectormap.min.js')}}"></script>
<script src="{{asset('public/assets/js/plugin/jsvectormap/world.js')}}"></script>

<!-- Sweet Alert -->
<script src="{{asset('public/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

<!-- Kaiadmin JS -->
<script src="{{asset('public/assets/js/kaiadmin.min.js')}}"></script>

<!-- Kaiadmin DEMO methods, don't include it in your project! -->
<script src="{{asset('public/assets/js/setting-demo.js')}}"></script>
<script src="{{asset('public/assets/js/demo.js')}}"></script>
<script>
$("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
  type: "line",
  height: "70",
  width: "100%",
  lineWidth: "2",
  lineColor: "#177dff",
  fillColor: "rgba(23, 125, 255, 0.14)",
});

$("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
  type: "line",
  height: "70",
  width: "100%",
  lineWidth: "2",
  lineColor: "#f3545d",
  fillColor: "rgba(243, 84, 93, .14)",
});

$("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
  type: "line",
  height: "70", 
  width: "100%",
  lineWidth: "2",
  lineColor: "#ffa534",
  fillColor: "rgba(255, 165, 52, .14)",
});
</script>
</body>
</html>