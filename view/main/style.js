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



