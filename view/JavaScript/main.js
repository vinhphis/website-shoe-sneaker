const itemsliderbar = document.querySelectorAll(".cartegory-left-li")
itemsliderbar.forEach(function (menu, index) {
    menu.addEventListener("click", function () {
        menu.classList.toggle("block")
    })

})

$(document).ready(function () {
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 20,
        autoplay: true,
        autoplayTimeout: 1500,

        // nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 4
            }
        },

    })

});



// xử lý hiện thị mật khẩu
function togglePassword() {
    var passwordInput = document.getElementById("password");
    var hien = document.getElementById("hien");
    var an = document.getElementById("an");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
        hien.style.display = "block";
        an.style.display = "none";
    } else {
        passwordInput.type = "password";
        an.style.display = "block";
        hien.style.display = "none";
    }
}
// xủ lý input số lượng phần chi tiết sản phẩm
let amountElement = document.getElementById('soluong_ctsp');
let soluong = 1;

function render(soluong) {
    amountElement.value = soluong;
}

function handlePlus() {
    soluong++;
    render(soluong);
}

function handleMinus() {
    if (soluong > 1)
        soluong--;
    console.log(soluong);
    render(soluong);
}

// xử lý input checkbox
function selectAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');

    // Đặt thuộc tính checked của tất cả các checkbox thành true
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = true;
    });
}

function deleteAll() {
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    // Đặt thuộc tính checked của tất cả các checkbox thành false
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = false;
    });
}

// xử lý ajax
$(document).ready(function () {
    // sắp xếp sản phẩm trang sp
    $('#sapxep').on("change", function () {
        var value = $(this).val();
        console.log(value);
        $.ajax({
            url: "ajax/sapxep_sanpham.php",
            type: "post",
            data: {
                giatien: value
            },
            beforeSend: function () {
                $("#products").html("<span>Loading..</span>");
            },
            success: function (data) {
                $("#products").html(data);
            }
        });
    });

    // $('.tt_sp').on("click", function () {
    //     var thanhtoan_sp = $(this).val();
    //     console.log(thanhtoan_sp);
    //     $.ajax({
    //         url: "ajax/tongtien_giohang.php",
    //         type: "post",
    //         data: {
    //             thanhtoan_sp: thanhtoan_sp,
    //         },
    //         success: function (data) {
    //             $("#tongthanhtoan").html(data);
               
    //         }
    //     });
    // });


    // xem sản phẩm tồn kho
    $('#chon_mau').on("change", function () {
        var chon_mau = $(this).val();
        var chon_size = $('#chon_size').val();
        var idsp = $('#id_sp').val();

        $.ajax({
            url: "ajax/tonkho_ctsp.php",
            type: "post",
            data: {
                chon_mau: chon_mau,
                id_sp: idsp,
                chon_size: chon_size
            },
          
            success: function (data) {
                $("#tonkho").html(data);
                console.log(data);
            }
        });
    });
    $('#chon_size').on("change", function () {
        var chon_size = $(this).val();
        var chon_mau = $('#chon_mau').val();
        var idsp = $('#id_sp').val();
        $.ajax({
            url: "ajax/tonkho_ctsp.php",
            type: "post",
            data: {
                chon_mau: chon_mau,
                id_sp: idsp,
                chon_size: chon_size
            },
         
            success: function (data) {
                $("#tonkho").html(data);
                console.log(data);
            }
        });
    });
});

