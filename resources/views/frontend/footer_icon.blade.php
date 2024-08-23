<!-- <section class="footer_button">
    <div class="container m-0 p-0">
        <div class="row footer_button_background">
            <div class="col-12 w-100">
                <ul class="footer_button_icon d-flex">
                    <li><a class="active" href="{{url('/')}}"><i class="fa-solid fa-house"></i> <span>Home</span></a></li>
                    <li><a href="{{url('/')}}"><i class="fa-solid fa-list"></i><span>categories</span></a></li>
                    <li id="cart_items" class="footer_mid_icon"><a href="{{url('/')}}"><i class="fa-solid fa-cart-plus"></i><span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        9+
                        {{-- <span class="visually-hidden">unread messages</span> --}}
                      </span><span>Cart</span></a></li>
                    <li><a href="{{url('/')}}"><i class="fa-solid fa-bell"></i><span>Notifications</span></a></li>
                    <li class="d-none"><a href="{{url('/')}}"><i class="fa-solid fa-circle-user"></i><span>Account</span></a></li>
                    <li><a href="{{url('/')}}"><i class="fa-solid fa-circle-user"></i><span>Login</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</section> -->
<style>
  :root {
  --clr: #ffff;
  --c:#5e99c9;
}

.navigation {
  position: relative;
  width: 400px;
  height: 57px;
  background: #27AE60;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 10px;
}
.navigation ul {
  display: flex;
  width: 350px;
}
.navigation ul li {
  position: relative;
  list-style: none;
  width: 70px;
  height: 55px;
  z-index: 1;
}
.navigation ul li a {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  width: 100%;
  text-align: center;
  font-weight: 500;
}
.navigation ul li a .icon {
  position: relative;
  display: block;
  line-height: 75px;
  font-size: 1.5em;
  text-align: center;
  transition: 0.5s;
  color: var(--clr);
}

.navigation ul li:nth-child(1) a .icon{
 position: relative;
 top:-4px;
 left:-6px;
}
.navigation ul li:nth-child(3) a .icon{
 position: relative;
 top:-4px;
 left:2px;
}

.navigation ul li:nth-child(4) a .icon{
 position: relative;
 top:-4px;
 left:8px;
}
.navigation ul li.active a .icon {
  transform: translateY(-24px);
}
.navigation ul li a .text {
  position: absolute;
  color: var(--clr);
  font-weight: 400;
  font-size: 0.75em;
  letter-spacing: 0.05em;
  transition: 0.5s;
  opacity: 0;
  transform: translateY(20px);
}
.navigation ul li.active a .text {
  opacity: 1;
  transform: translateY(10px);
}
.indicator {
  position: absolute;
  top: -34%;
  width: 60px;
  height: 60px;
  background: #27ae60;
  border-radius: 50%;
  border: 6px solid var(--clr);
  transition: 0.5s;
}
.indicator::before {
  content: "";
  position: absolute;
  top: 35%;
  left: -22px;
  width: 20px;
  height: 20px;
  background: transparent;
  border-top-right-radius: 20px;
  box-shadow: 1px -10px 0 0 var(--clr);
}
.indicator::after {
  content: "";
  position: absolute;
  top: 35%;
  right: -22px;
  width: 20px;
  height: 20px;
  background: transparent;
  border-top-left-radius: 20px;
  box-shadow: -1px -10px 0 0 var(--clr);
}

/* Indicator Transitions */
.navigation ul li:nth-child(1).active ~ .indicator {
  transform: translateX(calc(75px * 0));
}
.navigation ul li:nth-child(2).active ~ .indicator {
  transform: translateX(calc(75px * 1));
}
.navigation ul li:nth-child(3).active ~ .indicator {
  transform: translateX(calc(75px * 2));
}
.navigation ul li:nth-child(4).active ~ .indicator {
  transform: translateX(calc(75px * 3));
}
.navigation ul li:nth-child(5).active ~ .indicator {
  transform: translateX(calc(75px * 4));
}

</style>
<section class="footer_button">
    <div class="container m-0 p-0">
        <div class="row footer_button_background">
            <div class="col-12 w-100">
            <div class="navigation">
        <ul>
          <li class="list active">
            <a href="#">
              <span class="icon">
                <ion-icon name="home-outline"></ion-icon>
              </span>
              <!-- <span class="text">Home</span> -->
            </a>
          </li>
          <li class="list">
            <a href="#">
              <span class="icon">
              <ion-icon name="heart-outline"></ion-icon> 
              </span>
            </a>
          </li>
          <li class="list">
            <a href="#">
              <span class="icon">
                <ion-icon name="cart-outline"></ion-icon>
              </span>
              <!-- <span class="text">Message</span> -->
            </a>
          </li>
          <li class="list">
            <a href="#">
              <span class="icon">
                <!-- <ion-icon name="camera-outline"></ion-icon> -->
                <ion-icon name="person-outline"></ion-icon>
              </span>
              <!-- <span class="text">Photos</span> -->
            </a>
          </li>
          <!-- <li class="list">
            <a href="#">
              <span class="icon">
                    <!-- <span class="text">Profile</span> -->
              </span>
            </a>
          </li>
          <div class="indicator"></div>
        </ul>
      </div>
            </div>
        </div>
    </div>
</section>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
      <script>
        const list = document.querySelectorAll(".list");
    
    function activeLink() {
      list.forEach((item) => item.classList.remove("active"));
      this.classList.add("active");
    }
    list.forEach((item) => item.addEventListener("click", activeLink));
    
      </script>



