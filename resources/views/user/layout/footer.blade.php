<footer>
    <nav class="d-flex justify-content-around align-items-center">
        <a href="{{ route('User.Dashboard') }}" style="color: white;text-decoration: none;"><i class="bi bi-house"
                style="font-size: 20px;"></i><br><span style="font-size:13px;margin-left: -7px;">Home</span></a>
        <a href="{{ route('User.Start') }}" style="color: white;text-decoration: none;"><i class="bi bi-controller"
                style="font-size: 20px;"></i><br><span style="font-size:13px;margin-left: -7px;">Starting</span></a>
        <a href="{{ route('User.Record') }}" style="color: white;text-decoration: none;"><i
                class="bi bi-clipboard2-data" style="font-size: 20px;"></i><br><span
                style="font-size:13px;margin-left: -7px;">Record</span></a>
    </nav>

    {{-- models --}}

    <div class="modal fade" id="faq" tabindex="-1" role="dialog" aria-labelledby="faq" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">Faq's</h5>
                </div>
                <div class="modal-body">
                    <p class="text-dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, blanditiis distinctio? Amet est
                        quisquam nihil recusandae id cum, ex dolore! Voluptatem, quae, sint, est explicabo suscipit
                        veniam
                        quo quasi saepe iusto blanditiis ex commodi doloribus! Numquam eaque incidunt iure cupiditate
                        aperiam assumenda eveniet maxime corrupti. Temporibus corporis, laboriosam hic, culpa quis
                        dignissimos consequatur, ratione architecto accusamus suscipit expedita unde. Expedita numquam
                        voluptates ipsam unde similique delectus explicabo asperiores nostrum rerum architecto
                        blanditiis,
                        necessitatibus quod aspernatur distinctio quo reprehenderit illo exercitationem veritatis veniam
                        sed
                        officia recusandae fugiat nulla. Maiores iste dolores quidem beatae. Ea iusto natus maiores
                        doloremque veniam labore, earum dignissimos tempore, sunt eum alias porro, atque provident
                        tenetur
                        perferendis! Saepe quis eos inventore aspernatur, corporis architecto possimus pariatur corrupti
                        itaque nihil assumenda modi voluptate quam distinctio eum! Accusantium in beatae adipisci unde
                        qui
                        alias ex reprehenderit eveniet dolorem eum eos, fugit veniam voluptate nihil a molestias odio
                        praesentium culpa assumenda quas tempora? Dolorum provident a aliquam perferendis. Asperiores,
                        enim.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">okay</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Term and condition --}}

    <div class="modal fade" id="t&C" tabindex="-1" role="dialog" aria-labelledby="t&C" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">T&C</h5>
                </div>
                <div class="modal-body">
                    <p class="text-dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, blanditiis distinctio? Amet est
                        quisquam nihil recusandae id cum, ex dolore! Voluptatem, quae, sint, est explicabo suscipit
                        veniam
                        quo quasi saepe iusto blanditiis ex commodi doloribus! Numquam eaque incidunt iure cupiditate
                        aperiam assumenda eveniet maxime corrupti. Temporibus corporis, laboriosam hic, culpa quis
                        dignissimos consequatur, ratione architecto accusamus suscipit expedita unde. Expedita numquam
                        voluptates ipsam unde similique delectus explicabo asperiores nostrum rerum architecto
                        blanditiis,
                        necessitatibus quod aspernatur distinctio quo reprehenderit illo exercitationem veritatis veniam
                        sed
                        officia recusandae fugiat nulla. Maiores iste dolores quidem beatae. Ea iusto natus maiores
                        doloremque veniam labore, earum dignissimos tempore, sunt eum alias porro, atque provident
                        tenetur
                        perferendis! Saepe quis eos inventore aspernatur, corporis architecto possimus pariatur corrupti
                        itaque nihil assumenda modi voluptate quam distinctio eum! Accusantium in beatae adipisci unde
                        qui
                        alias ex reprehenderit eveniet dolorem eum eos, fugit veniam voluptate nihil a molestias odio
                        praesentium culpa assumenda quas tempora? Dolorum provident a aliquam perferendis. Asperiores,
                        enim.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">okay</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Event --}}

    <div class="modal fade" id="event" tabindex="-1" role="dialog" aria-labelledby="event" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">Events</h5>
                </div>
                <div class="modal-body">
                    <p class="text-dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, blanditiis distinctio? Amet est
                        quisquam nihil recusandae id cum, ex dolore! Voluptatem, quae, sint, est explicabo suscipit
                        veniam
                        quo quasi saepe iusto blanditiis ex commodi doloribus! Numquam eaque incidunt iure cupiditate
                        aperiam assumenda eveniet maxime corrupti. Temporibus corporis, laboriosam hic, culpa quis
                        dignissimos consequatur, ratione architecto accusamus suscipit expedita unde. Expedita numquam
                        voluptates ipsam unde similique delectus explicabo asperiores nostrum rerum architecto
                        blanditiis,
                        necessitatibus quod aspernatur distinctio quo reprehenderit illo exercitationem veritatis veniam
                        sed
                        officia recusandae fugiat nulla. Maiores iste dolores quidem beatae. Ea iusto natus maiores
                        doloremque veniam labore, earum dignissimos tempore, sunt eum alias porro, atque provident
                        tenetur
                        perferendis! Saepe quis eos inventore aspernatur, corporis architecto possimus pariatur corrupti
                        itaque nihil assumenda modi voluptate quam distinctio eum! Accusantium in beatae adipisci unde
                        qui
                        alias ex reprehenderit eveniet dolorem eum eos, fugit veniam voluptate nihil a molestias odio
                        praesentium culpa assumenda quas tempora? Dolorum provident a aliquam perferendis. Asperiores,
                        enim.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">okay</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="about" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">About</h5>
                </div>
                <div class="modal-body">
                    <p class="text-dark">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, blanditiis distinctio? Amet est
                        quisquam nihil recusandae id cum, ex dolore! Voluptatem, quae, sint, est explicabo suscipit
                        veniam
                        quo quasi saepe iusto blanditiis ex commodi doloribus! Numquam eaque incidunt iure cupiditate
                        aperiam assumenda eveniet maxime corrupti. Temporibus corporis, laboriosam hic, culpa quis
                        dignissimos consequatur, ratione architecto accusamus suscipit expedita unde. Expedita numquam
                        voluptates ipsam unde similique delectus explicabo asperiores nostrum rerum architecto
                        blanditiis,
                        necessitatibus quod aspernatur distinctio quo reprehenderit illo exercitationem veritatis veniam
                        sed
                        officia recusandae fugiat nulla. Maiores iste dolores quidem beatae. Ea iusto natus maiores
                        doloremque veniam labore, earum dignissimos tempore, sunt eum alias porro, atque provident
                        tenetur
                        perferendis! Saepe quis eos inventore aspernatur, corporis architecto possimus pariatur corrupti
                        itaque nihil assumenda modi voluptate quam distinctio eum! Accusantium in beatae adipisci unde
                        qui
                        alias ex reprehenderit eveniet dolorem eum eos, fugit veniam voluptate nihil a molestias odio
                        praesentium culpa assumenda quas tempora? Dolorum provident a aliquam perferendis. Asperiores,
                        enim.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">okay</button>
                </div>
            </div>
        </div>
    </div>

</footer>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <header>
        <span class="text-white">Profile</span>
        <!-- Close Icon -->
        <i class="fa-solid fa-arrow-left close-icon text-white" id="close-icon"></i>
    </header>
    <section>
        <h3>My Financial</h3>
        <ul>
            {{-- <li><a href="#"><i class="fa-solid fa-wallet"></i> Wallet</a><i class="fa-solid fa-chevron-right"></i>
            </li> --}}
            <li><a href="{{ route('User.Deposit') }}"><i class="fa-solid fa-dollar-sign"></i> Deposit</a><i
                    class="fa-solid fa-chevron-right"></i></li>
            <li><a href="{{ route('User.Withdraw') }}"><i class="fa-solid fa-money-bill"></i> Withdraw</a><i
                    class="fa-solid fa-chevron-right"></i></li>
            <li><a href="#"><i class="fa-solid fa-list"></i> Transaction</a><i
                    class="fa-solid fa-chevron-right"></i></li>
        </ul>
    </section>
    <section>
        <h3>My Detail</h3>
        <ul>
            <li><a href="{{ route('profile.edit') }}"><i class="fa-solid fa-user"></i> Personal Info</a><i
                    class="fa-solid fa-chevron-right"></i></li>
        </ul>
    </section>
    <section>
        <h3>Platform Detail</h3>
        <ul>
            <li><a href="#"><i class="fa-solid fa-headset"></i> Customer Service</a><i
                    class="fa-solid fa-chevron-right"></i></li>
        </ul>
    </section>
    <div class="logout">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</div>

<!-- JavaScript for Sidebar -->
<script>
    const profileIcon = document.getElementById('profile-icon');
    const sidebar = document.getElementById('sidebar');
    const closeIcon = document.getElementById('close-icon');

    // Toggle Sidebar
    profileIcon.addEventListener('click', () => {
        sidebar.classList.add('active');
    });

    // Hide Sidebar
    closeIcon.addEventListener('click', () => {
        sidebar.classList.remove('active');
    });
</script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
</script>
</body>

</html>
