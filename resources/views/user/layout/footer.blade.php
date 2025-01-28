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
                        Q: What is the minimum account balance required to start submitting products?
                        A: A minimum advance payment of 100 USDT is required to start submitting tasks. After completing
                        the daily task, users must apply for a full withdrawal and receive the withdrawal amount before
                        resetting tasks.
                        <br><br>
                        Q: Can users request an account reset?
                        A: Yes, users can request an account reset from customer service after completing the first set
                        of data.
                        <br><br>
                        Q: Can users request a withdrawal after completing both product sets?
                        A: Yes, users can request a withdrawal only after completing the entire data set.
                        <br><br>
                        Q: Can a withdrawal or refund be requested if a user withdraws or gives up in the middle of
                        product optimization?
                        A: No, withdrawals or refunds cannot be requested in such cases. Users must complete all product
                        submissions before requesting a withdrawal.
                        <br><br>
                        Q: How are funds held in the user’s account?
                        A: All funds are securely held in the user's account and can be withdrawn in full with no
                        processing fee once all data tasks are completed.
                        <br><br>
                        Q: What precautions should users take regarding account security?
                        A: Users should never disclose their login or withdrawal password to others. The platform is not
                        responsible for any loss in such cases. Avoid using personal information like birthdays or phone
                        numbers in passwords.
                        <br><br>
                        Q: What should users do if they forget their login or withdrawal password?
                        A: Users should contact Customer Service for a password reset.
                        <br><br>
                        Q: Can product data that has been assigned to the user’s account be canceled or edited?
                        A: No, once product data has been assigned to your account, it cannot be canceled or edited.
                        <br><br>
                        Q: What is a Combination Product?
                        A: A Combination Product consists of 1 to 3 merged products randomly allocated to the user's
                        account based on availability.
                        <br><br>
                        Q: What is the commission rate for combination products compared to regular products?
                        A: Users can earn 10-100 times the commission rate on combination products compared to regular
                        products.
                        <br><br>
                        Q: Can the combination product be canceled or edited after allocation?
                        A: No, due to contractual obligations with merchants/vendors, combination products cannot be
                        canceled or edited once allocated.
                        <br><br>
                        Q: Is the deposit amount determined by the platform?
                        A: No, the deposit amount is chosen by the user based on their preferences and experience with
                        the platform.
                        <br><br>
                        Q: How can users ensure the accuracy of deposit details?
                        A: Users should always confirm deposit details with Customer Service before making a deposit.
                        <br><br>
                        Q: What happens if a user makes a deposit to the wrong details?
                        A: The platform is not responsible for any deposits made to incorrect details.
                        <br><br>
                        Q: How does delaying product completion affect merchants/vendors?
                        A: Delays can harm vendor progress, product sales, and affect user credibility. Timely
                        completion is crucial for maintaining a positive reputation.
                        <br><br>
                        Q: Can users invite others to join their team?
                        A: Yes, users at VIP3 or higher can invite others using an invitation code and receive about 20%
                        of the recommended user’s daily income.
                        <br><br>
                        Q: How much funds are needed on this platform?
                        A: There is no specific amount required. Users are encouraged to manage their funds responsibly.
                        <br><br>
                        Notice: For more details, please click "Contact Us" on the platform to reach our online customer
                        service!
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
                        By accessing and using our services, you agree to comply with these terms and conditions.
                        <br><br>
                        Use of Services:
                        <br><br>
                        Our services are provided for informational and transactional purposes only. You agree to use
                        them in accordance with applicable laws and regulations.
                        <br><br>
                        Intellectual Property:
                        <br><br>
                        All intellectual property rights related to our services, including trademarks, copyrights, and
                        patents, are owned by our company. Unauthorized use or reproduction is strictly prohibited.
                        <br><br>
                        Privacy and Data Protection:
                        <br><br>
                        We prioritize your privacy and handle your personal information as outlined in our Privacy
                        Policy. By using our services, you consent to the collection, use, and disclosure of your data
                        as specified in the Privacy Policy.
                        <br><br>
                        Limitation of Liability:
                        <br><br>
                        While we aim to provide accurate and reliable information, we do not guarantee the completeness
                        or accuracy of the content on our platform. We are not liable for any direct or indirect damages
                        arising from your use of our services.
                        <br><br>
                        Third-Party Links:
                        <br><br>
                        Our platform may include links to third-party websites or resources. We do not endorse or assume
                        responsibility for the content, products, or services provided by third parties. Use of these
                        links is at your own risk.
                        <br><br>
                        Termination:
                        <br><br>
                        We reserve the right to suspend or terminate your access to our services at any time, without
                        notice, for any reason we deem necessary.
                        <br><br>
                        Modifications:
                        <br><br>
                        We may update these terms periodically. Any changes will take effect immediately upon posting.
                        It is your responsibility to review these terms regularly to stay informed of the most current
                        version.
                        <br><br>
                        Governing Law:
                        <br><br>
                        These terms are governed by the laws of the CA. Any disputes arising from your use of our
                        services will be resolved in the exclusive jurisdiction of CA courts.
                        <br><br>
                        Severability:
                        <br><br>
                        If any provision of these terms is deemed invalid or unenforceable, the remaining provisions
                        will remain valid and enforceable to the fullest extent allowed by law.
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
                        If your withdrawal amount exceeds your current membership level, you must deposit and upgrade to
                        the corresponding level for approval from the platform and financial department.
                        <br><br>
                        Upgrade Deposit: 5,000 USDT per membership level.
                        Any deposits made will be refunded to your binding address along with the withdrawal amount
                        after the upgrade.
                        Credit Score Policy:
                        <br><br>
                        To maintain a 100% credit score, users must complete all product submissions.
                        Failing to complete tasks on the same day will result in a reduction of your credit score.
                        Your credit score is based on the number of unfinished orders and the completion time.
                        A decreased credit score may affect your ability to process withdrawal requests.
                        Tax Regulations:
                        <br><br>
                        Users with personal funds exceeding 10,000 USDT are required to pay a 35% personal income tax
                        before withdrawing funds.
                        The personal income tax will be refunded 2 hours after the withdrawal is processed.
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
                        We transform complex business challenges into technology solutions to support the growth of your
                        eCommerce brand.
                        <br><br>
                        ASO (App Store Optimization) is the process of enhancing the visibility and ranking of mobile
                        applications in app store search results, such as the App Store for iOS and Google Play for
                        Android. By optimizing key elements of your app, the aim is to attract more users and increase
                        downloads. Think of ASO as SEO (Search Engine Optimization) for mobile apps.
                        <br><br>
                        ASO is an ongoing effort that involves continuously evaluating and adjusting strategies to keep
                        up with changes in app store algorithms and shifting user needs. A strong ASO strategy not only
                        boosts your app's visibility but also helps attract more users and drive revenue growth.
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">okay</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="walletAddress" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">Add Wallet Details</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('User.Add.Wallet') }}" method="POST">
                        @csrf
                        <div class="form-group" class="form-label">
                            <label for="address" class="form-label text-dark">Wallet Address</label>
                            <input type="text" class="form-control" name="address" id="address">
                        </div>
                        <div class="form-group">
                            <label for="name" class="form-label text-dark">Username</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        {{-- add wallet type where user can select either its btc,etherem or trc etc --}}
                        <div class="form-group">
                            <label for="wallet_type" class="form-label text-dark">Wallet Type</label>
                            <select class="form-control" name="wallet_type" id="wallet_type">
                                <option value="BTC">BTC</option>
                                <option value="ETH">ETH</option>
                                <option value="TRC">USDT</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Add Wallet</button>
                        </div>
                    </form>
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
            <li><a href="{{ route('User.Transactions') }}"><i class="fa-solid fa-list"></i> Transaction</a><i
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
            <li><a href="https://t.me/USVentures1"><i class="fa-solid fa-headset"></i> Customer Service</a><i
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

{{-- datatables --}}

<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>

<script>
    $(document).ready(function() {
        $('#transcations').DataTable({
            responsive: true
        });
    });
</script>

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

</body>

</html>
