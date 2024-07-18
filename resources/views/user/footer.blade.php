
<footer id="colorlib-footer" role="contentinfo">
    <div class="container">
        <div class="row row-pb-md">
            <div class="col footer-col colorlib-widget">
                <h4>Connect us</h4>
                <p>
                    <ul class="colorlib-social-icons">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-linkedin"></i></a></li>
                        <li><a href="#"><i class="icon-dribbble"></i></a></li>
                    </ul>
                </p>
            </div>
            <div class="col footer-col colorlib-widget">
                <p>
                    <ul class="colorlib-footer-links">
                        <li><a href="{{route('user.contact')}}">Contact</a></li>
                        <li><a href="{{route('user.about')}}">About</a></li>
                        <li><a href="{{route('user.mens')}}">Mens</a></li>
                        <li><a href="{{route('user.womens')}}">Womens</a></li>
                        <li><a href="#">Site maps</a></li>
                    </ul>
                </p>
            </div>

            <div class="col footer-col">
                <h4>Contact Information</h4>
                <ul class="colorlib-footer-links">
                    <li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
                    <li><a href="tel://1234567920">+ 1235 2355 98</a></li>
                    <li><a href="mailto:info@yoursite.com">info@yoursite.com</a></li>
                    <li><a href="#">yoursite.com</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="copy">
        <div class="row">
            <div class="col-sm-12 text-center">
                <p>
                    <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Ebad Uddin ahmed</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></span> 
                </p>
            </div>
        </div>
    </div>
</footer>
</div>



<div class="gototop js-top">
<a href="#" class="js-gotop"><i class="ion-ios-arrow-up"></i></a>
</div>

<!-- jQuery -->
<script src="{{asset('public/asset/js/jquery.min.js')}}"></script>
<!-- popper -->
<script src="{{asset('public/asset/js/popper.min.js')}}"></script>
<!-- bootstrap 4.1 -->
<script src="{{asset('public/asset/js/bootstrap.min.js')}}"></script>
<!-- jQuery easing -->
<script src="{{asset('public/asset/js/jquery.easing.1.3.js')}}"></script>
<!-- Waypoints -->
<script src="{{asset('public/asset/js/jquery.waypoints.min.js')}}"></script>
<!-- Flexslider -->
<script src="{{asset('public/asset/js/jquery.flexslider-min.js')}}"></script>
<!-- Owl carousel -->
<script src="{{asset('public/asset/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup -->
<script src="{{asset('public/asset/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/asset/js/magnific-popup-options.js')}}"></script>
<!-- Date Picker -->
<script src="{{asset('public/asset/js/bootstrap-datepicker.js')}}"></script>
<!-- Stellar Parallax -->
<script src="{{asset('public/asset/js/jquery.stellar.min.js')}}"></script>
<!-- Main -->
<script src="{{asset('public/asset/js/main.js')}}"></script>

<script>
   $(function () {
    var numButtons = 10;
    for (var i = 1; i <= numButtons; ++i) {
        $("#add" + i).click(function () {
            var currentVal = parseInt($("#qty" + i).val());
            if (!isNaN(currentVal)) {
                $("#qty" + i).val(currentVal + 1);
            }
        });

        $("#minus" + i).click(function () {
            var currentVal = parseInt($("qty" + i).val());
            if (!isNaN(currentVal) && currentVal > 0) {
                $("#qty" + i).val(currentVal - 1);
            }
        });
    }
});

function count_cart(){
    let count_cart = $('#count_cart')
    $.ajax({
        url : "{{route('user.count_cart')}}",
        method : "POST",
        data : {
            _token : "{{csrf_token()}}",
        },
        success : function(res){
            count_cart.text('Cart['+res.cart_count + ']');
        }
    })
}
count_cart()

function addTocart(id){
    let quantity = $('.quantity').val()
    let size = $("#size option").filter(":selected").text();

    $.ajax({
        url : "{{route('user.addToCart')}}",
        method : "POST",
        data : {
            id : id,
            quantity : quantity,
            size : size,
            _token : "{{csrf_token()}}"
        },
        success : function(res){
            setInterval(() => {
                count_cart()
            }, 1000);
            if(res.success){
                alert(res.success)
            }else{
                alert(res.error)
            }
        }
    })
}

// update quantity present in cart
function change_quantity(id){
    
    let quantity = $('#tentacles'+id).val();
    let total = $('#total_price'+id);
    let subtotal = 0;
    $.ajax({
        url : "{{route('user.change_quantity')}}",
        method : "POST",
        data : {
            quantity : quantity,
            product_id : id,
            _token : "{{csrf_token()}}"
        },
        success : function(res){
            res.cart.forEach(element => {
                subtotal += element.price * element.quantity;
            });
            console.log(subtotal)
            $('.subtotal').text(subtotal);
            $('.subtotal').val(subtotal);
            let total_price = res.cart_data[0].price * res.cart_data[0].quantity
            total.text('$'+total_price);
        }
    })
}

function profile(id){
console.log(id)

$.ajax({
    url : "{{route('user.account_details')}}",
    type : "POST",
    data : {
        user_id : id,
        _token : "{{csrf_token()}}"
    },
    success : function(res){
        console.log(res.view)
        $('#appnd_acc').html(res.view);
    }
})
}

function orders(id){
console.log(id)

$.ajax({
    url : "{{route('user.orders')}}",
    type : "POST",
    data : {
        user_id : id,
        _token : "{{csrf_token()}}"
    },
    success : function(res){
        console.log(res)
        $('#appnd_order').html(res.view);
    }
})
}


// Remove Cart function
function Remove_cart(id){
    let removebtn = $('remove_cart'+id);
    let cart = $('#appndCart');
    $.ajax({
        url : "{{route('user.remove_cart')}}",
        method : "POST",
        data : {
            product_id : id,
            _token : "{{csrf_token()}}"
        },
        success : function(res){
            count_cart()
            window.location.reload();
        }
    })
}


// filter brand

let brand = $('.brand');
let size = $('.size');

let brand_man = $('.brand_man');
let size_man = $('.size_man');

brand.on('click', function(){
        let brand_val = $(this).text()
        $.ajax({
            url : "{{route('user.filter_brand')}}",
            method : "POST",
            data : {
                brand : brand_val,
                category : 'women',
                _token : "{{csrf_token()}}"
            },
            success : function(res){
                $('#appndProd').html(res.view);
            }
        })
    })

    size.on('click', function(){
        let size_val = $(this).text()
        $.ajax({
            url : "{{route('user.filter_brand')}}",
            method : "POST",
            data : {
                size : size_val,
                category : 'women',
                _token : "{{csrf_token()}}"
            },
            success : function(res){
                $('#appndProd').html(res.view);
            }
        })
    })
    
    brand_man.on('click', function(){
        let brand_val = $(this).text()
        console.log(brand_man, size_man);
        $.ajax({
            url : "{{route('user.filter_brand')}}",
            method : "POST",
            data : {
                brand : brand_val,
                category : 'man',
                _token : "{{csrf_token()}}"
            },
            success : function(res){
                $('#appndProd').html(res.view);
            }
        })
    })

    size_man.on('click', function(){
        let size_val = $(this).text()
        $.ajax({
            url : "{{route('user.filter_brand')}}",
            method : "POST",
            data : {
                size : size_val,
                category : 'man',
                _token : "{{csrf_token()}}"
            },
            success : function(res){
                $('#appndProd').html(res.view);
            }
        })
    })



    
    let search_bar = $('#search_bar_btn');

    function search(event){
        if(search_bar && event.keyCode == 13){

            let search_input = $('#search_bar').val();
            $.ajax({
                url : "{{route('user.search_filter')}}",
                method : "POST",
                data : {
                    inputs : search_input,
                    _token : "{{csrf_token()}}"
                },
                success : function(res){
                    $('#appndProd').html(res.view);
                }
            })
        }
    }


</script>





</body>
</html>